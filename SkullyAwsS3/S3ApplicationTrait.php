<?php
namespace SkullyAwsS3;
use SkullyAwsS3\Core\S3Theme;
use Skully\Exceptions\InvalidConfigException;

/**
 * Class S3ApplicationTrait
 * @package SkullyAwsS3
 * For use at Application class
 */
trait S3ApplicationTrait {
    public function prepareS3Theme()
    {
        /** @var \Skully\Application $this */
        $basePath = $this->config('basePath');
        if (empty($basePath)) {
            throw new InvalidConfigException('Config must have option "basePath"');
        }
        $theme = $this->config('theme');
        if (empty($theme)) {
            $this->getConfigObject()->setProtected('theme', 'default');
            $theme = 'default';
        }
        $s3Config = $this->config('amazonS3');
        $s3Url = "http://".$s3Config['region'].'.amazonaws.com/'.$s3Config['bucket'].'/';
        $this->setTheme(new S3Theme($basePath, $s3Url, $this->config('publicDir'), $theme, $this->getAppName(), $this));
    }
}