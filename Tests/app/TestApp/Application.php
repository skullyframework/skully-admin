<?php
namespace TestApp;


use Skully\Exceptions\InvalidConfigException;
use SkullyAdmin\AdminTrait;
use SkullyAwsS3\Core\S3Theme;
use SkullyAwsS3\S3ApplicationTrait;

class Application extends \Skully\Application {
    use AdminTrait;
    protected function setupTheme() {
        parent::setupTheme();
        $this->addAdminTemplateDir();
    }

    use S3ApplicationTrait;
    /**
     * @return \Skully\Core\Theme\ThemeInterface
     * @throw \Skully\Exceptions\InvalidConfigException
     */
    public function getTheme()
    {
        /** @var \SkullyAwsS3\S3ConfigTrait $config */
        $config = $this->getConfigObject();
        if ($config->isAmazonS3Enabled()) {
            if (empty($this->theme)) {
                /** @var \SkullyAwsS3\S3ApplicationTrait $this */
                $this->prepareS3Theme();
            }
            return $this->theme;
        }
        else {
            return parent::getTheme();
        }
    }
}