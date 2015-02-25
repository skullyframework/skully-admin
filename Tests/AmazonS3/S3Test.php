<?php
require_once(realpath(__DIR__.'/../AdminTestCase.php'));
use RedBeanPHP\Facade as R;

class S3Test extends \Tests\AdminTestCase {
    public function getAppWithS3()
    {
        $config = new \TestApp\Config\Config();
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
                    'profile'=> 'skully.boss.default',
                    'key'    => 'AKIAJK5NJYOZJNFRABJQ',
                    'secret' => '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',
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

        // preparation: Create an image entry
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
        $this->app->runControllerFromRawUrl('admin/cRUDImages/uploadImage', $params);

        // see if file uploaded successfully
        echo "\nFind image with id " . $image->getID();
        $imageBean = R::findOne('image', 'id = ?', array($image->getID()));
        $this->assertNotEmpty($imageBean);
        echo "\n...Found!";
        $data = json_decode($imageBean['multiple_many_types']);
        echo "\nUploaded image as follows:\n";
        print_r($data);
        $this->assertEquals(1, count($data));
    }
}
