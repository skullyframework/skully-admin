<?php
namespace SkullyAdmin\Controllers;

use App\Mailer;
use RedBeanPHP\Facade as R;
use Skully\App\Helpers\TimeHelper;

class AdminsController extends CRUDController
{
    // These variables MUST be overridden in inherited class!
    protected $instanceName = 'admin'; // Instance name used in parameter prefix i.e. 'instance' of $this->params['instance']['attributeName']
    protected $addFormTpl = '_form';
    protected $editFormTpl = '_form';

    // For redirect when success / error happens
    protected $indexPath = 'admin/admins/index';
    protected $addPath = 'admin/admins/add';
    protected $editPath = 'admin/admins/edit';
    protected $deletePath = 'admin/admins/delete';

    // If you don't want to create deleteForm.tpl. define this instead.
    // Sample value: instances/destroy
    protected $destroyPath = 'admin/admins/destroy';

    public $columns = array('Email', 'Name', 'Status', 'Created At', '');
    public $thAttributes = array('', '', '', '', '', 'class="sort_desc"', ''); // Class sort_asc or sort_dsc can be used to set default sorting.
    public $columnDefs = "[
	]"; // Use this to handle columns' behaviours, doc: http://www.datatables.net/usage/columns

    // Override this with model linked with this controller.
    protected function model() {
        return 'admin';
    }

    protected function setInstanceAttributes($instance) {
        $instance = parent::setInstanceAttributes($instance);
        if (!empty($this->params[$this->instanceName])) {
            if(!empty($this->params[$this->instanceName]['email']))
                $instance->email = $this->params[$this->instanceName]['email'];
            $instance->setPassword($this->params[$this->instanceName]['password']);
            $instance->setPasswordConfirmation($this->params[$this->instanceName]['password_confirmation']);
        }
        else {
            $instance->password = '';
            $instance->password_confirmation = '';
        }
        return $instance;
    }

    // Data used in index listing
    protected function listData() {
        $instances = R::findAll($this->model());
        $instanceList = array();
        if (!empty($instances)) {
            foreach($instances as $instance) {
                $actions = array('data' => '<a title="View" href="'.$this->app->getRouter()->getUrl('admin/admins/edit', array('id' => $instance->id)).'" data-toggle="dialog"><span class="icon-pencil"></span></a>
					<a title="Delete" href="'.$this->app->getRouter()->getUrl('admin/admins/delete', array('id' => $instance->id)).'" data-toggle="dialog"><span class="icon-trash"></span></a>', 'class' => 'TAC');
                $instanceList[] = array(
                    $instance->email,
                    $instance->name,
                    $instance->status,
                    TimeHelper::date($this->app->config('adminLongDateTimeFormat'), $instance->created_at),
                    $actions
                );
            }
        }
        return $instanceList;
    }

    protected function beforeAction() {
        $action = $this->currentAction;
        // If given action is not one of given array, run parent's beforeAction.
        if (!in_array($action, array('login', 'loginProcess', 'forgetPassword', 'forgetConfirm'))) {
            parent::beforeAction($action);
        }
    }

    public function logout() {
        $adminRepository = $this->app->getRepository('admin');
        $adminRepository->logout();
        $this->app->redirect('admin/admins/login');
    }

    public function login() {
        $user = $this->getUser();
        if (!empty($user)) {
            $this->app->redirect('admin/home/index');
        }
        else {
            $this->render('login');
        }
    }

    public function loginProcess() {
        if (!empty($this->params['email'])) {
            /** @var \TestApp\Models\Repositories\AdminRepository $adminRepository */
            $adminRepository = $this->app->getRepository('admin');
            $admin = $adminRepository->login($this->params['email'], $this->params['password']);
            if (empty($admin)) {
                $this->showMessage($this->app->getTranslator()->translate('invalidUser'), 'error');
                $this->app->getTemplateEngine()->assign(array(
                    'email' => $this->params['email']
                ));
                $this->render('login');
            }
            else {
                $this->app->redirect('admin/home/index');
            }
        }
        else {
            $this->showMessage($this->app->getTranslator()->translate('invalidUser'), 'error');
            $this->app->getTemplateEngine()->assign(array(
                'email' => ""
            ));
            $this->render('login');
        }
    }

    public function forgetPassword(){
        if (!empty($this->params['email'])) {
            /** @var \Redbean_SimpleModel $userBean */
            $userBean = R::findOne('user', "email=?", array($this->params['email']));
            if(empty($userBean)){
                echo json_encode(array(
                    "errors" => $this->app->getTranslator()->translate('invalidUser')
                ));
            }
            else{
                /** @var \SkullyAdmin\Models\Admin $user */
                $user = $userBean->box();
                $user->generateActivationKey();

                try{
                    R::store($user);

                    if( $this->SendNewPasswordConfirmation($user) ){
                        echo json_encode(array(
                            "success" => 1
                        ));
                    }
                    else{
                        echo json_encode(array(
                            "errors" => $this->app->getTranslator()->translate('unknownError')
                        ));
                    }
                }
                catch(\Exception $e){
                    echo json_encode(array(
                        "errors" => $e->getMessage()
                    ));
                }
            }
        }
        else {
            echo json_encode(array(
                "errors" => $this->app->getTranslator()->translate('invalidUser')
            ));
        }
    }

    public function forgetPasswordConfirm(){
        $result = array();

//        $this->app->getLogger()->log('confirm new password after reset..');
//        $this->app->getLogger()->log("referer : " . (empty($_SERVER["HTTP_REFERER"]) ? " empty referer " : $_SERVER["HTTP_REFERER"]));
        $params = $this->getParams();
        /** @var \Redbean_SimpleModel $userBean */
        $userBean = R::findOne('user', "id = ? and activation_key = ?", array($params["id"], $params["activation_key"]));
        if (!empty($params['activation_key']) && !empty($userBean)) {
            /** @var \SkullyAdmin\Models\Admin $user */
            $user = $userBean->box();
            $user->activationKey = '';

            $newPassword = $user->resetPassword();

            try{
                R::store($user);

                if($this->SendNewPassword($user, $newPassword)){
                    $this->showMessage($this->app->getTranslator()->translate('emailNewPasswordSent'), 'success');
                }
                else{
                    $this->showMessage($this->app->getTranslator()->translate("unknownError"), 'error');
                }
            }
            catch(\Exception $e){
                $this->showMessage($user->errorMessage(), 'error');
            }
        }
        else {
            $this->showMessage($this->app->getTranslator()->translate("userNotFoundOrInvalidActivationKey"), 'error');
        }
        $this->render('login');
    }

    /**
     * @param \SkullyAdmin\Models\Admin $user
     * @return bool
     */
    protected function SendNewPasswordConfirmation($user){
        $mailer = new Mailer($this->app);
        $userAttributes = $user->export();
        $result = true;

        $websiteName = $this->app->getTranslator()->translate('websiteName');

        $this->app->getTemplateEngine()->assign(array(
            "user" => $userAttributes,
            "activationUrl" => $this->app->getRouter()->getUrl('admin/forgot/confirm', array('id' => $user->getID(), 'activation_key' => $user->activationKey)),
            "websiteName" => $websiteName == "" ? "Skully Admin" : $websiteName
        ));

        $content = $this->fetch("new.password.confirmation.tpl");
        $altContent = new \HtmlPlainText($content);
        $res = $mailer->send(array(
            'to' => array($user->email),
            'message' => $content,
            'altMessage' => $altContent->plainText,
            'subject' => $this->app->getTranslator()->translate("adminEmailNewPasswordConfirmationSubject", array("websiteName" => $websiteName)),
            'isHtml' => true
        ));

        if(!$res) {
            $this->app->getLogger()->log("Failed to send new password confirmation to user");
        }

        return $res;
    }

    /**
     * @param \SkullyAdmin\Models\Admin $user
     * @param string $newPassword
     * @return bool
     */
    public function SendNewPassword($user, $newPassword){
        $mailer = new Mailer($this->app);
        $userAttributes = $user->export();

        $websiteName = $this->app->getTranslator()->translate('websiteName');

        $this->app->getTemplateEngine()->assign(array(
            "user" => $userAttributes,
            "newPassword" => $newPassword,
            "websiteName" => $websiteName == "" ? "Skully Admin" : $websiteName
        ));
        $content = $this->app->getTemplateEngine()->fetch("new.password.tpl");
        $altContent = new \HtmlPlainText($content);
        $res = $mailer->send(array(
            'to' => array($userAttributes["email"]),
            'message' => $content,
            'altMessage' => $altContent->plainText,
            'subject' => $this->app->getTranslator()->translate("adminEmailNewPasswordSubject", array("websiteName" => $websiteName)),
            'isHtml' => true
        ));

        if(!$res){
            $this->app->getLogger()->log("Failed to send new password to user");
        }
        return $res;
    }
}