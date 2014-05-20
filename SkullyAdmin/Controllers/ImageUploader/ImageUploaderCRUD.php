<?php


namespace App\Controllers\Admin\ImageUploader;

use RedBeanPHP\Facade as R;

/**
 * Class ImageUploaderCRUD
 * @package App\Controllers\Admin\ImageUploader
 *
 * Image uploader Trait for use with CRUDController.
 */
Trait ImageUploaderCRUD {
    use ImageUploader;
// Add the following to your Controller:
//    protected $imageUploadPath = 'admin/rooms/uploadImage';
//    protected $imageDeletePath = 'admin/rooms/deleteImage';
//    protected $imageDeletePath = 'admin/rooms/destroyImage';

    protected function getImageSettings()
    {
        return array(
            'many_types_image_field' => array(
                '_config' => array(
                    'multiple' => false,
                    'adminName' => "Name Displayed in Admin"
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
                    'multiple' => false,
                    'adminName' => "Main Image"
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

    /**
     * @param \App\Models\BaseModel $instance
     */
    protected function setupInstanceImageAssigns($instance) {
        $images = array();
        $imageSettings = $this->getImageSettings();
        if (!empty($imageSettings)) {
            foreach($imageSettings as $key => $imageSetting) {
                $images[$key] = $instance->get($key);
            }
        }
        $this->app->getTemplateEngine()->assign(array('instanceImages' => $images, 'isSettingModel' => false));
    }

    public function images()
    {
        $instance = $this->findInstance(false);
        $imageSettings = $this->getImageSettings();
        $this->setupInstanceImageAssigns($instance);
        $this->setupInstanceAssigns($instance);
        $this->setPaths();
        $this->render('images', array(
            'imageSettings' => $imageSettings
        ));
    }

    public function uploadImage()
    {

        $error = '';
        $uploadedImages = array();

        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            // Find instance
            $id = $this->getParam($this->instanceName.'_id');
            if (!empty($id)) {
                /** @var \RedBean_SimpleModel $instanceBean */
                $instanceBean = R::findOne($this->model(), 'id = ?', array($id));
                /** @var \App\Models\Setting $instance */
                $instance = $instanceBean->box();
            }
            else {
                $instance = null;
            }

            try {
                $uploadedImages = $this->processUploadedImage($instance, $this->getParam('settingName'));
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
        $instance = $this->findInstance(false);
        $this->setupAssigns($instance);
        $this->processDeleteImage($instance);
    }
    public function destroyImage()
    {
        $instance = $this->findInstance(true);

        try {
            $this->processDestroyImage($instance, $this->getParam('setting'), $this->getParam('field'), $this->getParam('position'));
        }
        catch (\Exception $e) {
            $instance = $this->setupAssigns($instance);
            if ($this->destroyPath != null) {
                $this->app->getTemplateEngine()->assign(array('destroyPath' => $this->destroyPath));
            }
            $this->displayInstanceErrors($instance, $this->instanceName, 'delete');
        }
    }
} 