<?php
namespace SkullyAdmin\Controllers;

use RedBeanPHP\Facade as R;
use Skully\Library\EncryptionClass\EncryptionClass;

class SettingsController extends CRUDController {
    // These variables MUST be overridden in inherited class!
    protected $instanceName = 'setting'; // Instance name used in parameter prefix i.e. 'instance' of $this->params['instance']['attributeName']

    protected $editFormTpl = '_editForm';

    // For redirect when success / error happens
    protected $indexPath = 'admin/settings/index';
    protected $addPath = 'admin/settings/add';
    protected $editPath = 'admin/settings/edit';
    protected $deletePath = 'admin/settings/delete';
    protected $indexTpl = 'index';

    protected $successTarget = 'edit'; // index or edit, where to redirect after success

    // If you don't want to create deleteForm.tpl. define this instead.
    // Sample value: instances/destroy
    protected $destroyPath = null;

    public $columns = array('Name', 'Value', '', 'position');
    public $thAttributes = array('', '', '', 'class="sort_asc"'); // Class sort_asc or sort_dsc can be used to set default sorting.
    public $columnDefs = "[{'bVisible': false, aTargets:[3]}]"; // Use this to handle columns' behaviours, doc: http://www.datatables.net/usage/columns

    protected function model() {
        return 'setting';
    }

    protected function setInstanceAttributes($instance) {
        if (!empty($this->params[$this->instanceName])) {
            if ($instance->get('input_type') == 'password') {
                // If nothing changed and "save" is pressed, don't re-encrypt the encrypted value.
                if ($this->params[$this->instanceName]['value'] == $instance->get('value')) {
                    $crypt = new EncryptionClass();
                    $this->params[$this->instanceName]['value'] = $crypt->decrypt($this->app->config('globalSalt'), $this->params[$this->instanceName]['value']);
                }
            }
            $instance->import($this->params[$this->instanceName]);
        }
        return $instance;
    }

    /**
     * Data used in index listing.
     * @return array
     */
    protected function listData() {
        $sql = "is_visible = ? ORDER BY position";
        /** @var \RedBean_SimpleModel[] $instanceBeans */
        $instanceBeans = R::findAll('setting', $sql, array(true));
        $instanceRows = array();
        if (!empty($instanceBeans)) {
            $this->app->getTemplateEngine()->loadPlugin('smarty_modifier_truncate', true);
            foreach ($instanceBeans as $instanceBean) {
                /** @var \TestApp\Models\Setting $instance */
                $instance = $instanceBean->box();
                $actions = array('data' => '<a title="View" href="'.$this->app->getRouter()->getUrl('admin/settings/edit', array('id' => $instance->get('id'))).'" data-toggle="dialog"><span class="icon-pencil"></span></a>', 'class' => 'TAC');
                if ($instance->get('input_type') == 'password') {
                    $value = '********';
                }
                else {
                    $value = smarty_modifier_truncate($instance->getDisplayValue(), 40, '...', true);
                }
                $instanceRow = array(
                    $instance->get('name'),
                    $value,
                    $actions,
                    $instance->get('position')
                );
                $instanceRows[] = $instanceRow;
            }
        }
        return $instanceRows;
    }
}