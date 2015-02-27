<?php
/**
 * Created by Trio Digital Agency.
 * Date: 2/27/15
 * Time: 1:08 AM
 */

namespace SkullyAwsS3\Controllers\ImageUploader;


use Aws\S3\S3Client;
use Skully\App\Helpers\FileHelper;
use SkullyAwsS3\Helpers\S3Helpers;

Trait ImageUploader {
    function S3ProcessTempImage($tmp, $options, $oldFile = '')
    {
        $path = $this->parentProcessTempImage($tmp, $options, $oldFile);
        $key = S3Helpers::key($this->app->config('publicDir'), $path);
        $amazonS3Config = $this->app->config('amazonS3');
        $client = S3Client::factory($amazonS3Config['settings']);
        $abspath = FileHelper::replaceSeparators($this->app->getTheme()->getBasePath().$path);
        $client->putObject(array(
            'Bucket'     => $amazonS3Config['bucket'],
            'Key'        => $key,
            'SourceFile' => $abspath
        ));

        $client->waitUntil('ObjectExists', array(
            'Bucket' => $amazonS3Config['bucket'],
            'Key'    => $key
        ));

        unlink($abspath);
        return $path;
    }
} 