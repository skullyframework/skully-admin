<?php
require_once(realpath(__DIR__.'/../AdminTestCase.php'));
use RedBeanPHP\Facade as R;

class S3Test extends \Tests\AdminTestCase {
    public function getAppWithS3()
    {
        $config = new \TestApp\Config\Config();
        // Copy credentials.csv from AmazonS3 website into directory "config/AmazonS3/"
        $csv = file_get_contents(realpath(__DIR__.'/../app/config/AmazonS3/credentials.csv'));
        $csv_r = explode("\n", $csv);
        $s3Config = explode(',', trim($csv_r[1]));
        $s3Config[0] = str_replace('"', '', $s3Config[0]);
        $this->assertCount(3, $s3Config);

        $config->setProtectedFromArray(array(
            'basePath' => '/',
            'urlRules' => array(
                '' => 'home/index'
            ),
            'baseUrl' => 'http://somesite.com/',
            'publicDir' => 'public/',
            'amazonS3' => array(
                'enabled' => true,
                'bucket' => 'skully-admin',
                'region' => 's3-ap-southeast-1',
                'settings' => array(
                    'profile'=> $s3Config[0],
                    'key'    => $s3Config[1],
                    'secret' => $s3Config[2],
                )
            ),
            'timezone' => 'Asia/Jakarta'
        ));

        $app = new \TestApp\Application($config);
        return $app;
    }

    public function testReadFile()
    {
        $app = $this->getAppWithS3();
        // Try getting url of a certain image
        $url = $app->getTheme()->getUrl('test.txt');

        // Url must be pointing at aws s3 repository
        $this->assertEquals("http://s3-ap-southeast-1.amazonaws.com/skully-admin/public/default/test.txt", $url);
    }

    public function testUploadFile()
    {
        $this->migrate();
        $this->login();

        // Preparation: Create an image entry.
        $image = $this->app->createModel('image', array(
            'position' => 0
        ));
        R::store($image);

        $this->assertNotEmpty($image->getID());

        // upload to aws s3
        $filename = 'original.jpg';
        $filepath = realpath(__DIR__.'/'.$filename);
        $_SERVER['REQUEST_METHOD'] = "POST";
        $params = array(
            'image_id' => $image->getID(),
            'data' => '{ "id": '.$image->getID().', "type": "uploadOnce", "settingName": "multiple_many_types" }',
            'settingName' => 'multiple_many_types',
            'uploadOnce' => 1
        );

        $size = filesize($filepath);

        $_FILES = array(
            'file-0' => array(
                'name' => $filename,
                'type' => 'image/jpeg',
                'tmp_name' => $filepath,
                'error' => 0,
                'size' => $size
            )
        );
        ob_start();
        $this->app->runControllerFromRawUrl('admin/cRUDImages/uploadImage', $params);
        $output = ob_get_clean();
        echo "\nOutput of uploadImage:\n";
        echo $output;
        $output_r = json_decode($output);
        print_r($output_r);
        $this->assertFalse(property_exists($output_r[0], 'error'));

        // See if file uploaded successfully.
        echo "\nFind image with id " . $image->getID();
        $imageBean = R::findOne('image', 'id = ?', array($image->getID()));
        $this->assertNotEmpty($imageBean);
        echo "\n...Found!";
        $data = json_decode($imageBean['multiple_many_types']);
        echo "\nUploaded images:\n";
        print_r($data);
        $this->assertEquals(1, count($data));
        // Uploaded data must contain 'images/Image/1/original-smartphone'
        $this->assertNotEquals(-1, strpos(SkullyAwsS3\Helpers\S3Helpers::key($this->app->config('publicDir'), $data[0]->smartphone), 'public/images/Image/'.$image->getID().'/original-smartphone'));

        // Now see if file does exist in Amazon S3 repository.
        $amazonS3Config = $this->app->config('amazonS3');
        $client = \Aws\S3\S3Client::factory($amazonS3Config['settings']);
        $result = $client->getObject(array(
            'Bucket' => $amazonS3Config['bucket'],
            'Key'    => SkullyAwsS3\Helpers\S3Helpers::key($this->app->config('publicDir'), $data[0]->smartphone)
        ));

        $this->assertNotEmpty($result['Body']);

        // Local file must have been deleted.
        $filepath = \Skully\App\Helpers\FileHelper::replaceSeparators($this->app->getTheme()->getBasePath().$data[0]->smartphone);
        echo "\nChecking if file $filepath is deleted...";
        $this->assertFalse(file_exists($filepath));
        echo "\nYep";

        // Cleanup by removing files in bucket.
        $client->deleteObject(array(
            'Bucket' => $amazonS3Config['bucket'],
            'Key' => SkullyAwsS3\Helpers\S3Helpers::key($this->app->config('publicDir'), $data[0]->smartphone))
        );

        $client->deleteObject(array(
            'Bucket' => $amazonS3Config['bucket'],
            'Key' => SkullyAwsS3\Helpers\S3Helpers::key($this->app->config('publicDir'), $data[0]->desktop))
        );

    }
}
