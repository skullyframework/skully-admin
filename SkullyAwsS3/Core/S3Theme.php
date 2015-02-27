<?php

namespace SkullyAwsS3\Core;
use Skully\Core\Theme\Theme;
use Skully\Core\Theme\ThemeInterface;
use Skully\Exceptions\ThemeFileNotFoundException;

class S3Theme extends Theme implements ThemeInterface {
    protected $publicDirectory;

    /**
     * @param string $basePath Base path of the main app.
     * @param string $baseUrl path to base url of the main app.
     * @param string $publicDirectory name of public directory.
     * @param string $themeName Selected theme name.
     * @param string $appName App's name, used as directory name storing languages and views.
     * @param \Skully\ApplicationInterface $app Optional Skully App
     */
    public function __construct($basePath, $baseUrl, $publicDirectory, $themeName, $appName, $app = null)
    {
        $basePath = str_replace('/', DIRECTORY_SEPARATOR, $basePath);
        if (substr($basePath, -1, 1) != DIRECTORY_SEPARATOR) {
            $basePath .= DIRECTORY_SEPARATOR;
        }
        $this->publicBaseUrl = $baseUrl;
        if (!empty($publicDirectory)) {
            $publicDirectory = trim($publicDirectory, '/');
            $this->publicBaseUrl .= $publicDirectory.'/';
        }
        $this->basePath = $basePath . $publicDirectory . DIRECTORY_SEPARATOR;
        $this->themeName = $themeName;

        $this->app = $app;
        $this->appName = $appName;
    }

    /**
     * @param string $path
     * @param array $params
     * @param boolean $hideErrors True to hide errors from file not found. todo: do we really need this?
     * @param boolean $ssl When true or false force to change security mode (http or https).
     * @return string
     * Must direct to repository
     */
    public function getUrl($path = '', $params = array(), $hideErrors = true, $ssl = null)
    {
        $fullUrl = $this->getPublicBaseUrl($ssl) . $this->themeName . '/' . $path;

        if (empty($params)) {
            return $fullUrl;
        }
        else {
            return $fullUrl . '?' . http_build_query($params);
        }
    }

    /**
     * @param boolean $ssl When true or false force to change security mode (http or https).
     * @return string
     */
    public function getPublicBaseUrl($ssl = null)
    {
        $url = $this->publicBaseUrl;
        if ($ssl === true) {
            $url = str_replace('http://', 'https://', $url);
        }
        elseif ($ssl === false) {
            $url = str_replace('https://', 'http://', $url);
        }
        return $url;
    }
}