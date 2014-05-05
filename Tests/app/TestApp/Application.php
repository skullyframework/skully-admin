<?php
namespace TestApp;


use SkullyAdmin\AdminTrait;

class Application extends \Skully\Application {
    use AdminTrait;

    public function getTemplateEngine()
    {
        parent::getTemplateEngine();
        $this->addAdminTemplateDir();
        return $this->templateEngine;
    }
} 