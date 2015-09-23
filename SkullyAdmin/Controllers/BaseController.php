<?php
/**
 * Created by Trio Design Team (jay@tgitriodesign.com).
 * Date: 12/20/13
 * Time: 5:16 PM
 */

namespace SkullyAdmin\Controllers;


class BaseController extends \Skully\App\Controllers\BaseController {
    protected $breadcrumbs = array();

    /**
     * @return null|\SkullyAdmin\Models\Admin
     */
    protected function getUser() {
        /** Put in app because we need to call it from ckeditor as well. */
        return $this->app->getAdmin();
    }

    protected function beforeAction($action = '') {
        parent::beforeAction();
        $this->mustBeLoggedIn();
    }

    private function mustBeLoggedIn() {
        if (!in_array($this->getRoute(), array('admin/admins/login','admin/admins/loginProcess'))) {
            $user = $this->getUser();
            if (empty($user)) {
                $this->app->redirect('admin/admins/login');
                return false;
            }
        }
        return true;
    }
    protected function setDefaultAssign(){
        $this->user = $this->getUser();
        parent::setDefaultAssign();
        if (!empty($this->user)) {
            $this->app->getTemplateEngine()->assign(array(
                'adminUsername' => $this->user->get('name'),
                'user' => $this->user->export()
            ));
        }

        if (!empty($this->breadcrumbs)) {
            $this->app->getTemplateEngine()->assign(array(
                'breadcrumbs' => $this->breadcrumbs
            ));
        }

        $name_r = explode("\\",get_class($this));
        $name = $name_r[ count($name_r) - 1 ];
        $this->app->getTemplateEngine()->assign(array(
            "activeMainMenu" => lcfirst(str_replace("Controller", "", $name)),
            "numDisplayedRows" => $this->getNumDisplayedRows(),
            "languages" => $this->app->config('languages')
        ));
    }

    // $instance is the completed object.
    protected function successAction($message, $url) {
        if ($this->app->isAjax()) {
            echo json_encode(array('message' => $message));
        }
        else {
            $this->setMessage($message);
            $this->app->aRedirect($url);
        }
        return true;
    }

    protected function setNumDisplayedRows($numRows){
        setcookie("numDisplayedRows", $numRows, time() + $this->app->config("cookieExpire"), "/");
    }

    protected function getNumDisplayedRows(){
        return !empty($_COOKIE["numDisplayedRows"]) ? $_COOKIE["numDisplayedRows"] : 10;
    }
}