<?php

namespace SkullyAwsS3;
/**
 * Class S3ConfigTrait
 * @package SkullyAwsS3
 * Trait to be used at Config class.
 */
trait S3ConfigTrait {
    public function isAmazonS3Enabled()
    {
        /** @var \Skully\Core\Config $this */
        $amazonS3Config = $this->getProtected('amazonS3');
        return (!empty($amazonS3Config) && $amazonS3Config['enabled']);
    }
}