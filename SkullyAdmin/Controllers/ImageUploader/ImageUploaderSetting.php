<?php


namespace SkullyAdmin\Controllers\ImageUploader;

use RedBeanPHP\Facade as R;
use Skully\App\Helpers\TextHelper;
use App\Models\Setting;

/**
 * Class ImageUploaderSetting
 * @package SkullyAdmin\Controllers\ImageUploader
 *
 * Image uploader Trait for Setting Model powered Controllers.
 */
Trait ImageUploaderSetting {
    use ImageUploader;
// IMPORTANT: Add the following to your Controller:
//    protected $imageMovePath = 'admin/controllerName/moveImage';
//    protected $imageNewRowPath = 'admin/controllerName/newRow';
//    protected $imageUploadPath = 'admin/controllerName/uploadImage';
//    protected $imageDeletePath = 'admin/controllerName/deleteImage';
//    protected $imageDestroyPath = 'admin/controllerName/destroyImage';

    protected function getImageSettings()
    {
        return array(
            'multiple_types_setting_name' => array(
                '_config' => array(
                    'multiple' => false,
                    'adminName' => 'Name in Admin'
                ),
                'types' => array(
                    'smartphone' => array(
                        'w' => 300,
                        'maxOnly' => true
                    ),
                    'desktop' => array(
                        'w' => 600,
                        'maxOnly' => true
                    )
                )
            ),
            'one_type_image_field' => array(
                '_config' => array(
                    'multiple' => true,
                    'adminName' => "Main Images"
                ),
                'options' => array(
                    'description' => 'max 768px x 273px',
                    'w' => 768,
                    'h' => 273,
                    'scale' => true,
                    'maxOnly' => true
                )
            )
        );
    }

    protected function model() {
        return 'setting';
    }

    protected function setupInstanceImageAssigns() {
        $images = array();
        $instances = array();
        $imageSettings = $this->getImageSettings();
        if (!empty($imageSettings)) {
            foreach($imageSettings as $key => $imageSetting) {
                $settingBean = R::findOne('setting', 'name = ?', array($key));
                if (TextHelper::isJson($settingBean->value)) {
                    $images[$key] = json_decode($settingBean->value, true);
                }
                else {
                    $images[$key] = $settingBean->value;
                }
                $instances[$key] = $settingBean->box()->export();
            }
        }
        $this->app->getTemplateEngine()->assign(array('instanceImages' => $images, 'instances' => $instances, 'isSettingModel' => true));
    }

    public function images()
    {
        if (!method_exists(new Setting(), 'imageBaseUrl')) {
            $this->app->getTemplateEngine()->assign(array('error' => 'WARNING: Model ' . ucfirst($this->model()) . ' needs HasImages trait, otherwise image won\'t upload!'));
        }
        $imageSettings = $this->getImageSettings();
        $this->setupInstanceImageAssigns();
        $this->setPaths();
        $this->render('images', array(
            '_imageSettings' => $imageSettings,
            'indexContent' => $this->fetch('/admin/widgets/imageUploader/_index', array('_imageSettings' => $imageSettings))
        ));
    }

    /**
     * 	When uploading images, use following parameters:
     *  $_FILES = array(
     *      array(
     *          file-(n): array(
     *              name: string,
     *              size: int
     *          ), . . .
     *      )
     *  )
     *
     *  Just upload the image to images/[instance_id] directory then pass back image url.
     *  You may also send "data" parameter which will be passed back (maybe needed for reference or anything).
     **/

    public function uploadImage()
    {
        $error = '';
        $uploadedImages = array();

        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            // Find instance
            /** @var \RedBeanPHP\SimpleModel $instanceBean */
            $instanceBean = R::findOne('setting', 'name = ?', array($this->getParam('settingName')));
            /** @var \Skully\App\Models\Setting $instance */
            $instance = $instanceBean->box();

            try {
                $uploadedImages = $this->processUploadedImage($instance, 'value');
            }
            catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        if (!empty($error)) {
            echo json_encode(array('error' => $error));
        }
        else{
            echo json_encode($uploadedImages);
        }
    }

    public function deleteImage()
    {
        // Find instance
        /** @var \RedBeanPHP\SimpleModel $instanceBean */
        $instanceBean = R::findOne('setting', 'name = ?', array($this->getParam('setting')));
        /** @var \Skully\App\Models\Setting $instance */
        $instance = $instanceBean->box();

        $this->app->getTemplateEngine()->assign(array('instanceName' => 'setting', 'setting' => $instance->export(true), 'isSettingModel' => true));
        $this->processDeleteImage($instance);
    }

    public function destroyImage()
    {
        // Find instance
        /** @var \RedBeanPHP\SimpleModel $instanceBean */
        $instanceBean = R::findOne('setting', 'name = ?', array($this->getParam('setting')));
        /** @var \Skully\App\Models\Setting $instance */
        $instance = $instanceBean->box();

        $this->app->getTemplateEngine()->assign(array('instanceName' => 'setting', 'setting' => $instance->export(true), 'isSettingModel' => true));
        $this->processDestroyImage($instance, $this->getParam('setting'), $this->getParam('field'), $this->getParam('position'));
    }

    protected function getImagesValue($instance, $settingName){
        return $instance->get("value");
    }
} 