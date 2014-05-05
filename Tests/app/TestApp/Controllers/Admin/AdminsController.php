<?php
/**
 * Created by Trio Design Team (jay@tgitriodesign.com).
 * Date: 5/20/13
 * Time: 3:57 PM
 * Description: For admins management
 */
namespace TestApp\Controllers\Admin;

use RedBeanPHP\Facade as R;
use Skully\App\Helpers\TimeHelper;
use SkullyAdmin\Controllers\CRUDController;

class AdminsController extends CRUDController
{
    // These variables MUST be overridden in inherited class!
    protected $instanceName = 'admin'; // Instance name used in parameter prefix i.e. 'instance' of $this->params['instance']['attributeName']
    protected $addFormTpl = '_form';

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
                $actions = array('data' => '<a title="View" href="'.$this->app->getRouter()->getUrl('admin/admins/edit', array('id' => $instance->id)).'" data-toggle="dialog"><span class="icon-eye-open"></span></a>
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
        if (!in_array($action, array('login', 'loginProcess'))) {
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
}
