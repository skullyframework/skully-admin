<?php

namespace SkullyAdmin\Controllers;

use RedBeanPHP\Facade as R;

/**
 * Class CRUDController
 * Description: Base controller for controllers that has create (add), read (index), update (edit), and destroy (delete).
 *              Feel free to override any methods here. Public ones, especially, are meant to be overridden depending on controller needs.
 * @package App\Controllers\Admin
 */
class CRUDController extends BaseController
{

    // These variables MUST be overridden in inherited class!
    // --START-- //
    protected $instanceName = 'instance'; // Instance name used in parameter prefix i.e. 'instance' of $this->params['instance']['attributeName']

    // Form tpl files
    protected $addFormTpl = '_addForm';
    protected $editFormTpl = '_editForm';
    protected $deleteFormTpl = '/admin/widgets/crud/delete/_deleteForm';
    protected $indexTpl = '/admin/widgets/crud/_index';

    // For redirect when success / error happens
    protected $indexPath = 'instances/index';
    protected $addPath = 'instances/add';
    protected $editPath = 'instances/edit';
    protected $deletePath = 'instances/delete';

    protected $successTarget = 'edit'; // index or edit, where to redirect after success

    // If you don't want to create deleteForm.tpl. define this instead.
    // Sample value: instances/destroy
    protected $destroyPath = 'instances/destroy';

    // -- SORTABLE -- //
    // If dataTable items are sortable, set this to field name in database corresponds with dragging
    protected $dragField = null;
    // Path to do reorder after dragging (e.g. instances/reorder)
    protected $reorderPath = null;
    // Id column's index number.
    protected $sortableIdColumnIndex = 0;
    // -- END - SORTABLE -- //

    public $columns = array('column', 'names');
    public $thAttributes = array(); // Class sort_asc or sort_desc can be used to set default sorting.
    public $columnDefs = '[]'; // Use this to handle columns' behaviours, doc: http://www.datatables.net/usage/columns

    // --END-- //
    // Form wrapper tpl files. You do not always need to update this, but when you do, override these vars.
    protected $addAjaxTpl = '/admin/widgets/crud/add/_addAjax';
    protected $addNoAjaxTpl = '/admin/widgets/crud/add/_addNoAjax';
    protected $editAjaxTpl = '/admin/widgets/crud/edit/_editAjax';
    protected $editNoAjaxTpl = '/admin/widgets/crud/edit/_editNoAjax';
    protected $deleteAjaxTpl = '/admin/widgets/crud/delete/_deleteAjax';
    protected $deleteNoAjaxTpl = '/admin/widgets/crud/delete/_deleteNoAjax';

    // Minimum overriding requirements //
    /**
     * Override this with model linked with this controller.
     */
    protected function model() {
        return 'model';
    }

    /**
     * Data used in index listing.
     * @return array
     */
    protected function listData() {
        $sql = "SELECT * FROM {$this->model()} ORDER BY position";
        $instances = R::getAll($sql);
        $instanceRows = array();
        if (!empty($instances)) {
            foreach ($instances as $instanceArray) {
                $instanceRow = array(
                    // List your field names here
                    $instanceArray['field_name'],

                    $this->listActions($instanceArray)
                );
                $instanceRows[] = $instanceRow;
            }
        }
        return $instanceRows;
    }

    /**
     * Override as needed
     * @param $instance
     */
    protected function afterCreateSuccess($instance)
    {

    }

    /**
     * Override as needed
     * @param $instance
     */
    protected function afterUpdateSuccess($instance)
    {

    }

    // END - Minimum overriding requirements //

    /**
     * Convenience method to get actions usable in listData().
     * @var array $instanceArray
     * @return array
     */
    protected function listActions($instanceArray)
    {
        $actions = array('data' => '<a title="View" href="'.$this->app->getRouter()->getUrl($this->editPath, array('id' => $instanceArray['id'])).'"><span class="icon-pencil"></span></a>
					<a title="Delete" href="'.$this->app->getRouter()->getUrl($this->deletePath, array('id' => $instanceArray['id'])).'" data-toggle="dialog"><span class="icon-trash"></span></a>', 'class' => 'TAC');
        if (!is_null($this->dragField)) {
            $actions['data'] .='<input type="hidden" class="id" value="'.$instanceArray['id'].'"/>
					<input type="hidden" class="'.$this->dragField.'" value="'.$instanceArray[$this->dragField].'"/>';
        }
        return $actions;
    }

    /**
     * Convenience method to setup sortable related assigns.
     * Used in index().
     */
    protected function setupSortableAssigns()
    {
        if (!is_null($this->dragField)) {
            $this->app->getTemplateEngine()->assign('dragField', $this->dragField);
        }
        if (!is_null($this->reorderPath)) {
            $this->app->getTemplateEngine()->assign('reorderPath', $this->reorderPath);
        }
        if (!is_null($this->sortableIdColumnIndex)) {
            $this->app->getTemplateEngine()->assign('sortableIdColumnIndex', $this->sortableIdColumnIndex);
        }
    }
    /**
     * Method to be overridden when you need to add additional attributes for saving purpose in create, update, destroy,
     * and to be displayed in add, edit, delete, create, update, destroy
     * e.g. use to setup protected attributes on create and update.
     * @param $instance \Skully\App\Models\BaseModel
     * @return mixed
     */
    protected function setInstanceAttributes($instance) {
        if (!empty($this->params[$this->instanceName])) {
            $instance->import($this->params[$this->instanceName]);
        }
        return $instance;
    }

    /**
     * Override this method when you need to display additional attributes in add, edit, delete, create, update, and destroy pages.
     * NOTE: Attributes set up here will NOT make it to save() method (i.e. use setInstanceAttributes() method for that).
     * @param $instance \Skully\App\Models\BaseModel
     * @return mixed
     */
    protected function setupInstanceAssigns($instance) {
        if (empty($instance)) {
            $this->app->redirect('admin/home/notFound');
        }

        $currentAction = $this->getCurrentAction();
        if ($currentAction == 'edit') {
            $action = 'update';
        }
        elseif ($currentAction == 'add') {
            $action = 'create';
        }
        else {
            $action = $currentAction;
        }

        $this->app->getTemplateEngine()->assign(array(
            $this->instanceName => $instance->export(true),
            'instanceName' => $this->instanceName,
            'isAjax' => $this->app->isAjax(),
            'action' => $action
        ));
        return $instance;
    }


    /**
     * Method to be overridden when you need to set how to find an instance on new, edit and delete (post = false) or create, update and destroy (post = true).
     * For example if you wish to allow only certain group of users access to the model.
     * @param bool $post
     * @return null|\Skully\App\Models\BaseModel
     */
    protected function findInstance($post = false) {
        $id = $this->decideIdSource($post);

        $instance = null;
        if (!empty($id)) {
            /** @var \Skully\App\Models\BaseModel $instanceBean */
            $instanceBean = R::findOne($this->model(), "where id = ?", array($id));
            if (!empty($instanceBean)) {
                $instance = $instanceBean->box();
            }
            else {
                return null;
            }
        }
        else {
            if (!in_array($this->getCurrentAction(), array('edit', 'update', 'delete', 'destroy'))) {
                $instance = $this->app->createModel($this->model());
            }
        }
        return $instance;
    }
    // Override this in inherited class to assign additional variables.
    /**
     * @param $instance \Skully\App\Models\BaseModel
     */
    protected function setupAdditionalAssigns($instance) {
    }

    public function reorder() {
        // Reorder positions first to fix broken data
        R::exec("SET @ordering = 0;");
        R::exec("UPDATE {$this->model()} SET
		    position = (@ordering := @ordering + 1)
		    ORDER BY {$this->dragField}, id ASC");

        $toPosition = $this->params['toPosition'];
        $fromPosition = $this->params['fromPosition'];
        $direction = $this->params['direction'];
        $id = $this->params['id'];
        /** @var \RedBeanPHP\SimpleModel $instanceBean */
        $instanceBean = R::findOne($this->model(), 'id = ?', array($id));
        if (!empty($instanceBean)) {
            /** @var \Skully\App\Models\BaseModel $instance */
            $instance = $instanceBean->box();
            if ($direction == 'back') {
                // Adds all rows after this one's final position by 1
                $sql =  "UPDATE `{$this->model()}`
              			 SET `{$this->dragField}` = `{$this->dragField}` + 1
              			 WHERE `{$this->dragField}` >= '".$toPosition."'
              			 AND `{$this->dragField}` < '{$fromPosition}'";
            }
            else {
                // Reduce all rows before this one's final position by 1
                $sql =  "UPDATE `{$this->model()}`
              			 SET `{$this->dragField}` = `{$this->dragField}` - 1
              			 WHERE `{$this->dragField}` > '".$fromPosition."'
              			 AND `{$this->dragField}` <= '{$toPosition}'";
            }
            R::exec($sql);
            $instance->set($this->dragField, $toPosition);
            try {
                R::store($instance);
            }
            catch (\Exception $e) {
                $message = $e->getMessage();
                if (!empty($message)) {
                    $instance->addError($message);
                }
                $this->app->getLogger()->log("error happened when updating from CRUDController (model ".$this->model()."): " . $message);
                $this->app->getLogger()->debugBacktrace();
                $this->app->getLogger()->log("params are: " . print_r($this->getParams(), true));
            }
        }
    }

    protected function decideIdSource($post) {
        $id = '';
        if ($post) {
            if (!empty($this->params[$this->instanceName]) && !empty($this->params[$this->instanceName]['id'])) {
                $id = $this->params[$this->instanceName]['id'];
            }
        }
        else {
            if (!empty($this->params['id'])) {
                $id = $this->params['id'];
            }
        }
        return $id;
    }


    protected function beforeAction() {
        $action = $this->getCurrentAction();
        parent::beforeAction();
        if ($action == 'create') {
            // For when user go to create page directly
            if (empty($this->params[$this->instanceName])) {
                $this->app->redirect($this->addPath);
            }
        }
        elseif ($action == 'update') {
            // For when user go to edit page directly
            if (empty($this->params[$this->instanceName]) && !empty($this->params['id'])) {
                $this->app->redirect($this->editPath, array('id' => $this->params['id']));
            }
        }
    }

    public function index() {
        if ($this->app->isAjax()) {
            echo json_encode(array('aaData' => $this->listData()));
        }
        else {
            $this->setupSortableAssigns();
            $this->render($this->indexTpl, array(
                'indexPath' => $this->indexPath,
                'addPath' => $this->addPath,
                'columns' => $this->columns,
                'thAttributes' => $this->thAttributes,
                'columnDefs' => $this->columnDefs,
                'instanceName' => $this->instanceName
            ));
        }
    }

    public function add() {
        $this->breadcrumbs[] = array('url' => $this->app->getRouter()->getUrl($this->indexPath), 'name' => ucfirst($this->instanceName) . ' List');
        $this->breadcrumbs[] = array('url' => '', 'name' => 'New '.$this->instanceName);
        $instance = $this->findInstance(false);
        $instance = $this->setInstanceAttributes($instance);
        $this->setupAssigns($instance);
        $form = $this->fetch($this->addFormTpl);
        if ($this->app->isAjax()) {
            $this->render($this->addAjaxTpl, array('form' => $form));
        }
        else {
            $this->render($this->addNoAjaxTpl, array('form' => $form));
        }
    }

    public function edit() {
        $this->breadcrumbs[] = array('url' => $this->app->getRouter()->getUrl($this->indexPath), 'name' => ucfirst($this->instanceName) . ' List');
        $this->breadcrumbs[] = array('url' => '', 'name' => 'Edit '.$this->instanceName);
        $instance = $this->findInstance(false);
        if (is_null($instance)) {
            $this->app->getTemplateEngine()->assign(array(
                'error' => $this->app->getTranslator()->translate('instanceNotFound', array('model' => $this->model())),
                'errorAttributes' => array(),
                'instance' => $this->model()
            ));
        }
        else {
            $instance = $this->setInstanceAttributes($instance);
            $this->setupAssigns($instance);
        }
        $form = $this->fetch($this->editFormTpl);
        if ($this->app->isAjax()) {
            $this->render($this->editAjaxTpl, array('form' => $form));
        }
        else {
            $this->render($this->editNoAjaxTpl, array('form' => $form));
        }
    }

    public function delete() {
        $instance = $this->findInstance(false);
        if (is_null($instance)) {
            $this->app->getTemplateEngine()->assign(array(
                'error' => $this->app->getTranslator()->translate('instanceNotFound', array('model' => $this->model())),
                'errorAttributes' => array(),
                'instance' => $this->model()
            ));
        }
        else {
//            $instance = $this->setInstanceAttributes($instance);
            $this->setupAssigns($instance);
            if ($this->destroyPath != null) {
                $this->app->getTemplateEngine()->assign(array('destroyPath' => $this->destroyPath));
            }
        }
        $form = $this->fetch($this->deleteFormTpl);
        if ($this->app->isAjax()) {
            $this->render($this->deleteAjaxTpl, array('form' => $form));
        }
        else {
            $this->render($this->deleteNoAjaxTpl, array('form' => $form));
        }
    }

    // Most of the times you will need to override this method because some variables will be protected.
    // In that scenario, if behaviours in instance creation is similar with update, override $this->setInstanceAttributes() instead.
    // Only override this and update() method when instance creations have different behaviours.
    public function create() {
        $this->breadcrumbs[] = array('url' => $this->app->getRouter()->getUrl($this->indexPath), 'name' => ucfirst($this->instanceName) . ' List');
        $this->breadcrumbs[] = array('url' => '', 'name' => 'New '.$this->instanceName);

        if (!empty($this->params[$this->instanceName]) && !empty($this->params[$this->instanceName]['id'])) {
            // For upload images, where image upload will return id to form.
            $instance = $this->findInstance(true);
        }
        else {
            $instance = $this->findInstance(false);
        }

        $instance = $this->setInstanceAttributes($instance);
        if (!$instance->hasError()) {
            try {
                R::store($instance);
            }
            catch (\Exception $e) {
                $message = $e->getMessage();
                // When message is unrelated to instance validation, instance
                // has no error, but error message is not empty.
                if (!empty($message) && !$instance->hasError()) {
                    $instance->addError($message);
                }
                $this->app->getLogger()->log("error happened when updating from CRUDController (model ".$this->model()."): " . $message);
                $this->app->getLogger()->debugBacktrace();
                $this->app->getLogger()->log("params are: " . print_r($this->getParams(), true));
            }
        }

        $instance = $this->setupAssigns($instance);
        if (!$instance->hasError()) {
            $this->afterCreateSuccess($instance);
            if ($this->successTarget == 'edit') {
                $this->successAction($this->app->getTranslator()->translate('created'), $this->app->getRouter()->getUrl($this->editPath, array('id' => $instance->id)), 'create', $instance);
            }
            else {
                $this->successAction($this->app->getTranslator()->translate('created'), $this->app->getRouter()->getUrl($this->indexPath), 'create', $instance);
            }
        }
        else {
            $this->displayInstanceErrors($instance, $this->instanceName, 'add');
        }
    }

    // See comments in create() method.
    public function update() {
        $this->breadcrumbs[] = array('url' => $this->app->getRouter()->getUrl($this->indexPath), 'name' => ucfirst($this->instanceName) . ' List');
        $this->breadcrumbs[] = array('url' => '', 'name' => 'Edit '.$this->instanceName);
        $instance = $this->findInstance(true);
        $error = true;

        if (is_null($instance)) {
//            $this->app->getTemplateEngine()->assign(array(
//                'error' => $this->app->getTranslator()->translate('instanceNotFound', array('model' => $this->model())),
//                'errorAttributes' => array(),
//                'instance' => $this->model()
//            ));
            $errorMessage = $this->app->getTranslator()->translate('instanceNotFound', array('model' => $this->model()));
            $this->displayErrors($errorMessage, 'edit', $this->model());
        }
        else {
            $instance = $this->setInstanceAttributes($instance);

            if (!$instance->hasError()) {
                try {
                    $this->afterUpdateSuccess($instance);
                    R::store($instance);
                    $instance = $this->setupAssigns($instance);
                    if ($this->successTarget == 'edit') {
                        $this->successAction($this->app->getTranslator()->translate('updated'), $this->app->getRouter()->getUrl($this->editPath, array('id' => $instance->id)), 'update', $instance);
                    }
                    else {
                        $this->successAction($this->app->getTranslator()->translate('updated'), $this->app->getRouter()->getUrl($this->indexPath), 'update', $instance);
                    }
                    $error = false;
                }
                catch (\Exception $e) {
                    $message = $e->getMessage();
                    // When message is unrelated to instance validation, instance
                    // has no error, but error message is not empty.
                    if (!empty($message) && !$instance->hasError()) {
                        $instance->addError($message);
                    }
                    $this->app->getLogger()->log("error happened when updating from CRUDController (model ".$this->model()."): " . $message);
                    $this->app->getLogger()->debugBacktrace();
                    $this->app->getLogger()->log("params are: " . print_r($this->getParams(), true));
                }
            }
            if ($error) {
                $instance = $this->setupAssigns($instance);
                $this->displayInstanceErrors($instance, $this->instanceName, 'edit');
            }
        }
    }

    public function destroy() {
        $instance = $this->findInstance(true);
//        $instance = $this->setInstanceAttributes($instance);
        $error = true;
        if (!$instance->hasError()) {
            try {
                $this->app->getLogger()->log("trying to delete data..");
                R::trash($instance);
                $error = false;
                $this->successAction($this->app->getTranslator()->translate('deleted'), $this->app->getRouter()->getUrl($this->indexPath), 'destroy', $instance);
            }
            catch (\Exception $e) {
                $this->app->getLogger()->log("Cannot delete data : " . $e->getMessage());
            }
        }
        if ($error) {
            $instance = $this->setupAssigns($instance);
            if ($this->destroyPath != null) {
                $this->app->getTemplateEngine()->assign(array('destroyPath' => $this->destroyPath));
            }
            $this->displayInstanceErrors($instance, $this->instanceName, 'delete');
        }
    }

    /**
     * Inheritable method to setup smarty assigns before rendering CRUD pages.
     * @param $instance \Skully\App\Models\BaseModel
     * @return \Skully\App\Models\BaseModel
     */
    protected function setupAssigns($instance) {
        $this->setupInstanceAssigns($instance);
        $this->setupAdditionalAssigns($instance);
        return $instance;
    }

    /**
     * Display errors with model's instance, instance name, and template name.
     * @param $modelInstance \Skully\App\Models\BaseModel
     * @param $instanceName
     * @param $template
     * @return bool
     */
    protected function displayInstanceErrors($modelInstance, $instanceName, $template) {
        $this->displayErrors($modelInstance->errorMessage(), $template, $instanceName, $modelInstance, $modelInstance->getErrors());
        return true;
    }

    protected function displayErrors($message, $template = '', $instanceName = '', $modelInstance = null, $errorObjects = array())
    {
        if ($this->app->isAjax()) {
            echo json_encode(array(
                'error' => $message,
                'errorAttributes' => $errorObjects,
                'instance' => $instanceName
            ));
        }
        else {
            $this->app->getTemplateEngine()->assign(array(
                'error' => $message,
                'errorAttributes' => $errorObjects,
                'instance' => $instanceName
            ));
            if (!empty($modelInstance)) {
                $this->setupAssigns($modelInstance);
            }
            $this->render($template);
        }
    }
}
