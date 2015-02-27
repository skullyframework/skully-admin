<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 7/5/14
 * Time: 4:18 PM
 */

namespace TestApp\Controllers\Admin;


use Skully\App\Helpers\UtilitiesHelper;
use SkullyAdmin\Controllers\CRUDController;
use RedBeanPHP\Facade as R;
use SkullyAwsS3\Controllers\ImageUploader\ImageUploaderCRUD;

class CRUDImagesController extends CRUDController {
    use ImageUploaderCRUD;
    protected $imageMovePath = 'admin/cRUDImages/moveImage';
    protected $imageNewRowPath = 'admin/cRUDImages/newRow';
    protected $imageUploadPath = 'admin/cRUDImages/uploadImage';
    protected $imageDeletePath = 'admin/cRUDImages/deleteImage';
    protected $imageDestroyPath = 'admin/cRUDImages/destroyImage';

    protected function getImageSettings()
    {
        return array(
            'multiple_many_types' => array(
                '_config' => array(
                    'multiple' => true,
                    'adminName' => "Multiple Many Types"
                ),
                'types' => array(
                    'smartphone' => array(
                        'w' => 300,
                        'maxOnly' => true
                    ),
                    'desktop' => array(
                        'w' => 600,
                        'maxOnly' => true
                    )
                )
            ),
            'multiple_one_type' => array(
                '_config' => array(
                    'multiple' => true,
                    'adminName' => "Multiple One Type"
                ),
                'options' => array(
                    'description' => 'max 768px x 273px',
                    'w' => 768,
                    'h' => 273,
                    'scale' => true,
                    'maxOnly' => true
                )
            ),
            'single_many_types' => array(
                '_config' => array(
                    'multiple' => false,
                    'adminName' => 'Single Many Types'
                ),
                'types' => array(
                    'smartphone' => array(
                        'w' => 300,
                        'maxOnly' => true
                    ),
                    'desktop' => array(
                        'w' => 600,
                        'maxOnly' => true
                    )
                )
            ),
            'single_one_type' => array(
                '_config' => array(
                    'multiple' => false,
                    'adminName' => 'Single One Type'
                ),
                'options' => array(
                    'description' => 'max 768px x 273px',
                    'w' => 768,
                    'h' => 273,
                    'scale' => true,
                    'maxOnly' => true
                )
            )
        );
    }

    // These variables MUST be overridden in inherited class!
    // --START-- //
    protected $instanceName = 'image'; // Instance name used in parameter prefix i.e. 'instance' of $this->params['instance']['attributeName']

    // Form tpl files
    protected $addFormTpl = '_addForm';
    protected $editFormTpl = '_editForm';
    protected $deleteFormTpl = '/admin/widgets/crud/delete/_deleteForm';
    protected $indexTpl = '/admin/widgets/crud/_index';

    // For redirect when success / error happens
    protected $indexPath = 'admin/cRUDImages/index';
    protected $addPath = 'admin/cRUDImages/add';
    protected $editPath = 'admin/cRUDImages/edit';
    protected $deletePath = 'admin/cRUDImages/delete';

    protected $successTarget = 'edit'; // index or edit, where to redirect after success

    // If you don't want to create deleteForm.tpl. define this instead.
    // Sample value: instances/destroy
    protected $destroyPath = 'admin/cRUDImages/destroy';

    // -- SORTABLE -- //
    // If you need sortable feature to be set up automatically, set $setupSortable variable to 'true'.
    // This will basically run method setupSortability() in __construct() AND some additions to listData().
    // Inherit & modify these methods when required.
    protected $setupSortable = true;
    // If dataTable items are sortable, set this to field name in database corresponds with dragging
    protected $dragField = 'position';
    // Path to do reorder after dragging (e.g. instances/reorder)
    protected $reorderPath = 'admin/cRUDImages/reorder';
    // Id column's index number (no need to set this unless you require to setup sortable manually
    // (i.e. not by simply setting $setupSortable to true. Usually for older projects).
    // protected $sortableIdColumnIndex = 0;
    // -- END - SORTABLE -- //

    public $columns = array('multiple many types', 'multiple one type', 'single many types', 'single one type', '');
    public $thAttributes = array('', '', '', '', ''); // Class sort_asc or sort_desc can be used to set default sorting.
    public $columnDefs = '[]'; // Use this to handle columns' behaviours, doc: http://www.datatables.net/usage/columns

    // --END-- //
    // Form wrapper tpl files. You do not always need to update this, but when you do, override these vars.
    protected $addAjaxTpl = '/admin/widgets/crud/add/_addAjax';
    protected $addNoAjaxTpl = '/admin/widgets/crud/add/_addNoAjax';
    protected $editAjaxTpl = '/admin/widgets/crud/edit/_editAjax';
    protected $editNoAjaxTpl = '/admin/widgets/crud/edit/_editNoAjax';
    protected $deleteAjaxTpl = '/admin/widgets/crud/delete/_deleteAjax';
    protected $deleteNoAjaxTpl = '/admin/widgets/crud/delete/_deleteNoAjax';

    /**
     * Override this with model linked with this controller.
     */
    protected function model() {
        return 'image';
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
                $instance = $this->app->createModel($this->model(), $instanceArray);
                $image1 = $instance->get('multiple_many_types');
                if (empty($image1)) {
                    $image1 = 'no image';
                }
                else {
                    $image1 = $image1[0]['smartphone'];
                }
                $image2 = $instance->get('multiple_one_type');
                if (empty($image2)) {
                    $image2 = 'no image';
                }
                else {
                    $image2 = $image2[0];
                }
                $image3 = $instance->get('single_many_types');
                if (empty($image3)) {
                    $image3 = 'no image';
                }
                else {
                    $image3 = $image3['smartphone'];
                }
                $image4 = $instance->get('single_one_type');
                if (empty($image4)) {
                    $image4 = 'no image';
                }
                $instanceRow = array(
                    // List your field names here
                    $image1,
                    $image2,
                    $image3,
                    $image4,
                    $this->listActions($instanceArray)
                );

                if ($this->setupSortable) {
                    $instanceRow[] = $instanceArray['id'];
                    array_unshift($instanceRow, $instanceArray[$this->dragField]);
                }
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

    protected function listActions($instanceArray)
    {
        $actions = array('data' => '<a title="View" href="'.$this->app->getRouter()->getUrl($this->editPath, array('id' => $instanceArray['id'])).'"><span class="icon-pencil"></span></a>
        <a title="Images Manager" href="'.$this->app->getRouter()->getUrl("admin/cRUDImages/images", array('id' => $instanceArray['id'])).'"><span class="icon-picture"></span></a>
					<a title="Delete" href="'.$this->app->getRouter()->getUrl($this->deletePath, array('id' => $instanceArray['id'])).'" data-toggle="dialog"><span class="icon-trash"></span></a>', 'class' => 'TAC');
        if (!is_null($this->dragField)) {
            $actions['data'] .='<input type="hidden" class="id" value="'.$instanceArray['id'].'"/>
					<input type="hidden" class="'.$this->dragField.'" value="'.$instanceArray[$this->dragField].'"/>';
        }
        return $actions;
    }
} 