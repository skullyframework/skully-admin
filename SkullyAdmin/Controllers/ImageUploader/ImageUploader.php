<?php


namespace App\Controllers\Admin\ImageUploader;

use App\Helpers\FileHelper;
use Skully\App\Helpers\UtilitiesHelper;
use Skully\Library\ImageProcessor\ImageProcessor;
use RedBeanPHP\Facade as R;

trait ImageUploader {
// Add the following to your Controller:
//    protected $imageUploadPath = 'admin/instanceName/uploadImage';
//    protected $imageDeletePath = 'admin/instanceName/deleteImage';
//    protected $imageDeletePath = 'admin/instanceName/destroyImage';

    protected function getImageSettings()
    {
        return array(
            ''
        );
    }

    protected function processTempImage($tmp, $options, $oldFile = '')
    {
        $tmp = str_replace('/', DIRECTORY_SEPARATOR, $tmp);
        try {
            $options = array_merge(array(
                'onlyCreateWhenNew' => false,
                'overwrite' => false
            ), $options);
            /** delete previous images */
            $path = ImageProcessor::resize($tmp, $options);
            if (!empty($oldFile) && file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
        catch (\Exception $e) {
            $this->app->getLogger()->log("error with message " . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
        return $path;
    }
    /**
     * @param $instance
     * @param string $imageFieldName Name of image field to lookup for. In
     *        setting this is 'value', but in CRUD this should be name of
     *        image field.
     * @throws \Exception
     * @return null|string
     */
    protected function processUploadedImage($instance, $imageFieldName = 'value')
    {
        $uploadOnce = UtilitiesHelper::toBoolean($this->getParam('uploadOnce'));
        $uploadedImages = array();
        $error = null;
        $type = $this->getParam('type');
        $settingName = $this->getParam('settingName');
        $validFormats = array("jpg", "png", "gif", "bmp","jpeg");
        $imageSettings = $this->getImageSettings();
        $imageSetting = $imageSettings[$settingName];

        if (empty($error) && !empty($instance) && !empty($imageSetting)) {
            $nFiles = count($_FILES);
            for($i=0; $i<$nFiles; $i++) {
                $name = $_FILES['file-'.$i]['name'];
                $size = $_FILES['file-'.$i]['size'];
                if(strlen($name))
                {
                    $filename_r = explode(".", $name);
                    $ext = strtolower($filename_r[count($filename_r)-1]);
                    unset($filename_r[count($filename_r)-1]);
                    $imageName = implode($filename_r);
                    if(in_array($ext,$validFormats))
                    {
                        $maxFilesize = (int)($this->app->iniGet('upload_max_filesize')) * 1024 * 1024;
                        if($size<($maxFilesize))
                        {
                            $tmp = $_FILES['file-'.$i]['tmp_name'];

                            $filePath = $instance->imageBaseUrl();
                            $fullPath = $this->app->getTheme()->getPublicBasePath().$filePath;

                            if (!file_exists($fullPath)) {
                                mkdir($fullPath,0775, true);
                            }

                            // Create the file

                            $options = array(
                                'resultDir' => $fullPath,
                                'noImagick' => $this->app->config('noImagick'),
                                'outputFilename' => $name
                            );
                            $instanceImages = $instance->get($imageFieldName);
                            if (is_string($instanceImages) && $imageSetting["types"]) {
                                $instanceImages = json_decode($instanceImages, true);
                            }

                            if ($uploadOnce) {
                                // Upload once can only be used by multiple images.
                                if ($imageSetting['types']) {
                                    // Many types
                                    $newInstanceImage = array();
                                    foreach($imageSetting['types'] as $key => $typeOptions) {
                                        $options = array_merge($options, $imageSetting['types'][$key]);
                                        $options['outputFilename'] = $imageName.'-'.$key.'.'.$ext;
                                        try {
                                            $path = $this->processTempImage($tmp, $options);
                                            $newInstanceImage[$key] = str_replace(array($this->app->getTheme()->getPublicBasePath(),DIRECTORY_SEPARATOR), array('', '/'), $path);
                                            $uploadedImages[] = array(
                                                'data' => $this->getParam('data'),
                                                'path' => $newInstanceImage[$key],
                                                'message' => $this->app->getTranslator()->translate("imageUploaded")
                                            );
                                        }
                                        catch (\Exception $e) {
                                            $uploadedImages[] = array(
                                                'data' => $this->getParam('data'),
                                                'path' => $filePath.$imageName.'.'.$ext,
                                                'message' => $e->getMessage(),
                                                'error' => true
                                            );
                                        }
                                    }
                                    $instanceImages[] = $newInstanceImage;
                                    $instance->set($imageFieldName, json_encode($instanceImages));
                                }
                                else {
                                    // Single type
                                }
                            }
                            else {
                                // Upload single image.
                                if ($imageSetting['types']) {
                                    // Many types
                                    if ($imageSetting['_config']['multiple']) {
                                        // multiple images
                                        $position = $this->getParam("position");
                                        $options = array_merge($options, $imageSetting['types'][$type]);

                                        $oldFile = $this->app->getTheme()->getPublicBasePath().$instanceImages[$position][$type];
                                        try {
                                            $path = $this->processTempImage($tmp, $options, $oldFile);
                                            $instanceImages[$position][$type] = str_replace(array($this->app->getTheme()->getPublicBasePath(),DIRECTORY_SEPARATOR), array('', '/'), $path);
                                            $instance->set($imageFieldName, json_encode($instanceImages));
                                            $uploadedImages[] = array(
                                                'data' => $this->getParam('data'),
                                                'path' => $instanceImages[$position][$type],
                                                'message' => $this->app->getTranslator()->translate("imageUploaded")
                                            );
                                        }
                                        catch (\Exception $e) {
                                            $uploadedImages[] = array(
                                                'data' => $this->getParam('data'),
                                                'path' => $filePath.$imageName.'.'.$ext,
                                                'message' => $e->getMessage(),
                                                'error' => true
                                            );
                                        }
                                    }
                                    else {

                                        // single image
                                        if (empty($imageSetting['types'][$type])) {
                                            throw new \Exception("Type $type not found");
                                        }
                                        if (empty($instanceImages)) {
                                            $instanceImages = array();
                                        }
                                        $options = array_merge($options, $imageSetting['types'][$type]);
                                        $oldFile = $this->app->getTheme()->getPublicBasePath().$instanceImages[$type];
                                        try {
                                            $path = $this->processTempImage($tmp, $options, $oldFile);
                                            $instanceImages[$type] = str_replace(array($this->app->getTheme()->getPublicBasePath(),DIRECTORY_SEPARATOR), array('', '/'), $path);
                                            $instance->set($imageFieldName, json_encode($instanceImages));
                                            $uploadedImages[] = array(
                                                'data' => $this->getParam('data'),
                                                'path' => $instanceImages[$type],
                                                'message' => $this->app->getTranslator()->translate("imageUploaded")
                                            );
                                        }
                                        catch (\Exception $e) {
                                            throw new \Exception($e->getMessage());
                                        }
                                    }
                                }
                                else {
                                    // One type
                                    $options = array_merge($options, $imageSetting['options']);
                                    $oldFile = $this->app->getTheme()->getPublicBasePath().$instanceImages;
                                    try {
                                        $path = $this->processTempImage($tmp, $options, $oldFile);
                                        $instanceImages = str_replace(array($this->app->getTheme()->getPublicBasePath(),DIRECTORY_SEPARATOR), array('', '/'), $path);
                                        $instance->set($imageFieldName, $instanceImages);
                                        $uploadedImages[] = array(
                                            'data' => $this->getParam('data'),
                                            'path' => $instanceImages,
                                            'message' => $this->app->getTranslator()->translate("imageUploaded")
                                        );
                                    }
                                    catch (\Exception $e) {
                                        throw new \Exception($e->getMessage());
                                    }
                                }
                            }

                            R::store($instance);
                        }
                        else {
                            throw new \Exception($this->app->getTranslator()->translate('errorFilesizeTooBig', array(FileHelper::parseBytes($maxFilesize))));
                        }
                    }
                    else {
                        throw new \Exception($this->app->getTranslator()->translate("errorInvalidFormat", array($ext)));
                    }
                }
                else {
                    throw new \Exception($this->app->getTranslator()->translate("errorFileEmpty"));
                }
            }
        }
        return $uploadedImages;
    }

    protected function setPaths()
    {
        $this->app->getTemplateEngine()->assign(array(
            'imageDestroyPath' => $this->imageDestroyPath,
            'imageDeletePath' => $this->imageDeletePath,
            'imageNewRowPath' => $this->imageNewRowPath,
            'imageUploadPath' => $this->imageUploadPath,
            'imageMovePath' => $this->imageMovePath
        ));
    }
    public function processDeleteImage($instance) {
        if (is_null($instance)) {
            $this->app->getTemplateEngine()->assign(array(
                'error' => $this->app->getTranslator()->translate('instanceNotFound', array('model' => $this->model())),
                'errorAttributes' => array(),
                'instance' => $this->model()
            ));
        }
        else {
            if ($this->imageDestroyPath != null) {
                $imagesField = $instance->get($this->getParam('field'));
                if (!is_array($imagesField)) {
                    $imagesField = UtilitiesHelper::decodeJson($imagesField, true);
                }
                $imageField = $imagesField[$this->getParam('position')];
                if (is_array($imageField)) {
                    $values = array_values($imageField);
                    $image = $values[0];
                }
                else {
                    $image = $imageField;
                }
                $this->setPaths();
                $this->app->getTemplateEngine()->assign(array(
                    'position' => $this->getParam('position'),
                    'imageSettingName' => $this->getParam('setting'),
                    'image' => $image
                ));
            }
            else {
                $this->app->getTemplateEngine()->assign(array(
                    'error' => "Please set destroyPath",
                    'errorAttributes' => array(),
                    'instance' => $this->model()
                ));
            }
        }
        $this->render('/admin/widgets/imageUploader/multiple/_delete');
    }

    public function processDestroyImage($instance, $imageSetting, $imageField, $position) {
        if (!$instance->hasError()) {
            try {
                $imageValue = $instance->get($imageField);
                if (!is_array($imageValue)) {
                    $imageValue = UtilitiesHelper::decodeJson($imageValue, true);
                }
                $imagesAtPosition = $imageValue[$position];
                if (!empty($imagesAtPosition)) {
                    foreach($imagesAtPosition as $key => $image) {
                        unlink(str_replace('/', DIRECTORY_SEPARATOR, $this->app->getTheme()->getPublicBasePath() . $image));
                    }
                }
                unset($imageValue[$position]);
                $imageValue = array_values($imageValue);
                $instance->set($imageField, json_encode($imageValue));
                R::store($instance);
                echo json_encode(array(
                    'message' => $this->app->getTranslator()->translate('deleted'),
                    'setting' => $imageSetting,
                    'field' => $imageField,
                    'position' => $position
                ));
            }
            catch (\Exception $e) {
                $this->app->getLogger()->log("Cannot delete data : " . $e->getMessage());
            }
        }
    }

    /**
     * If pos is empty, means it creates a new row
     */
    public function newRow()
    {
        $isNew = UtilitiesHelper::toBoolean($this->getParam('new'));
        $instanceId = $this->getParam('id');
        $instance = R::findOne($this->model(), 'id = ?', array($instanceId));
        $imageField = $this->getParam('field');
        $imagePosition = (int)$this->getParam('pos');
        $imageSettings = $this->getImageSettings();
        $settingName = $this->getParam('setting');
        $imageSetting = $imageSettings[$settingName];
        $images = $instance->get($settingName);
        if (empty($images)) {
            $images = array();
        }
        else {
            if (!is_array($images)) {
                $images = UtilitiesHelper::decodeJson($images, true);
            }
        }
        $this->setPaths();
        $this->setupInstanceImageAssigns($instance);
        $this->app->getTemplateEngine()->assign(array(
            'instanceName' => $this->instanceName,
            'imageSetting' => $imageSetting,
            'imagePos' => $imagePosition,
            'imageSettingName' => $settingName

        ));
        if (count($imageSetting['types']) > 0) {
            $newImageRow = array();
            foreach($imageSetting['types'] as $type => $setting) {
                $newImageRow[$type] = '';
            }
            if ($isNew) {
                array_unshift($images, $newImageRow);
                $json_encoded = json_encode($images);
                $instance->set($imageField, $json_encoded);
                R::store($instance);
            }
            else {
                $image = $images[$imagePosition];
                $this->app->getTemplateEngine()->assign(array(
                    'image' => $image
                ));
            }
            $this->app->getTemplateEngine()->assign(array(
                $this->instanceName => $instance->export()
            ));
            $this->render('/admin/widgets/imageUploader/multiple/_manyTypes');
        }
        else {
            $newImageRow = '';
            array_unshift($images, $newImageRow);
            $instance->set($imageField, $images);
            R::store($instance);
            $this->app->getTemplateEngine()->assign(array(
                $this->instanceName => $instance->export()
            ));
            $this->render('/admin/widgets/imageUploader/multiple/_oneType');
        }
    }

    public function moveImage()
    {
        $id = $this->getParam('id');
        $from = (int)$this->getParam('position');
        $direction = $this->getParam('direction');
        $settingName = $this->getParam('setting');
        $fieldName = $this->getParam('field');
        if ($direction == 'up') {
            $to = $from -1;
        }
        else {
            $to = $from +1;
        }
        $instanceBean = R::findOne($this->model(), 'id = ?', array($id));
        $instance = $instanceBean->box();
        $images = $instance->get($fieldName);
        if (!is_array($images)) {
            $images = UtilitiesHelper::decodeJson($images, true);
        }
        $imageFrom = $images[$from];
        $images[$from] = $images[$to];
        $images[$to] = $imageFrom;
        $instance->set($fieldName, json_encode($images));
        R::store($instance);
        echo json_encode(array('settingName' => $settingName, 'from' => $from, 'to' => $to));
    }

} 