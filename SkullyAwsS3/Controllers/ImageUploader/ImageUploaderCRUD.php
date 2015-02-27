<?php
/**
 * Created by Trio Digital Agency.
 * Date: 2/26/15
 * Time: 3:12 PM
 */

namespace SkullyAwsS3\Controllers\ImageUploader;
use Aws\S3\S3Client;
use Skully\App\Helpers\FileHelper;
use SkullyAwsS3\Helpers\S3Helpers;

/**
 * Class ImageUploaderCRUD
 * @package SkullyAwsS3\Controllers\ImageUploader
 * Use this instead of SkullyAdmin\Controllers\ImageUploaderCRUD to allow for uploading to Amazon S3.
 */
Trait ImageUploaderCRUD {
    use \SkullyAdmin\Controllers\ImageUploader\ImageUploaderCRUD {
        processTempImage as parentProcessTempImage;
    }
    use ImageUploader;
    function processTempImage($tmp, $options, $oldFile = '') {
        return $this->S3ProcessTempImage($tmp, $options, $oldFile);
    }
}