<?php
/**
 * Created by Trio Digital Agency.
 * Date: 2/26/15
 * Time: 2:01 PM
 */

namespace SkullyAwsS3\Helpers;


class S3Helpers {
    /**
     * @param $publicDir string
     * @param $path string
     * @return string
     * Get key you can use to find objects within Amazon S3.
     * Basically we just add public directory in front of given path.
     * Not added to Core\S3Theme instead because there is nowhere else in Skully Framework that we would use this
     * other than with Amazon S3 module
     */
    public static function key($publicDir, $path)
    {
        $publicDir = str_replace(DIRECTORY_SEPARATOR, '/', $publicDir);
        $path = str_replace(DIRECTORY_SEPARATOR, '/', $path);
        return trim($publicDir, '/') . '/' . ltrim($path, '/');
    }
} 