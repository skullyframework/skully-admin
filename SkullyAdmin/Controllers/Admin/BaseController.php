<?php
/**
 * Created by Trio Design Team (jay@tgitriodesign.com).
 * Date: 12/20/13
 * Time: 5:16 PM
 */

namespace SkullyAdmin\Controllers\Admin;


class BaseController extends \Skully\App\Controllers\BaseController {
    protected $breadcrumbs = array();

    /**
     * @return null|\App\Models\Admin
     */
    protected function getUser() {
        /** Put in admin because we need to call it from ckeditor as well. */
        return $this->app->getAdmin();
    }

    protected function beforeAction($action = '') {
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
                'adminUsername' => $this->user->get('name')
            ));
        }

        if (!empty($this->breadcrumbs)) {
            $this->app->getTemplateEngine()->assign(array(
                'breadcrumbs' => $this->breadcrumbs
            ));
        }

        $this->app->getTemplateEngine()->assign(array(
            "numDisplayedRows" => $this->getNumDisplayedRows(),
            "languages" => $this->app->config('languages')
        ));
    }

    // $instance is the completed object.
    protected function successAction($message, $url) {
        $this->app->getLogger()->log("success action is ajax? " . $this->app->isAjax());
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