<?php
namespace TestApp;


use SkullyAdmin\AdminTrait;

class Application extends \Skully\Application {
    use AdminTrait;
    protected function setupTheme() {
        parent::setupTheme();
        $this->addAdminTemplateDir();
    }
}