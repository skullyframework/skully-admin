<?php
namespace SkullyAdmin;

use RedBeanPHP\Facade as R;

/**
 * Class DataTablesServerSideTrait
 * @package App
 * Trait to be used at App\Application
 */
trait DataTablesServerSideTrait {
    /*
     * 1. Use this trait.
     * 2. override index!
     * 3. ex:
     * public function index() {
            $this->setTableName( $this->model() );
            $this->setPositionFieldName( $this->dragField );
            $this->setShowActionButtons( true );
            $this->setHrefActionButton('view', $this->app->getRouter()->getUrl($this->editPath));
            $this->setHrefActionButton('delete', $this->app->getRouter()->getUrl($this->deletePath));
            $this->setSortable( true );
            $this->setColumnsDef( '' );
            $this->setThAttributes( array() );
            $this->setFields(array(
                'name',
                'email'
            ));
            $this->setColumns(array(
                'Name',
                'Email'
            ));

            if ($this->app->isAjax()) {
                echo json_encode($this->listDataServerSide());
            }
            else {
                $this->render($this->indexTpl, array(
                    'dataTableServerSide' => true,
                    'indexPath' => $this->indexPath,
                    'addPath' => $this->addPath,
                    'instanceName' => $this->instanceName,
                    'thAttributes' => $this->getThAttributes(),
                    'columns' => $this->getColumns(),
                    'columnDefs' => $this->getColumnsDefs(),
                    'isSortable' => $this->getSortable(),
                ));
            }
        }
     */

    //region Attributes
    private $dtsPrimaryKey = 'id';
    private $dtsTable = 'test';
    private $dtsPositionFieldName = 'position';
    private $dtsIsSortable = false;
    private $dtsFields = array();
    private $dtsColumns = array();
    private $dtsThAttributes = array();
    private $dtsColumnsDef = '[]';
    private $dtsShowActionButtons = true;
    private $dtsListActions = array(
        'view' => array(
            'title' => 'View',
            'href' => null,
            'icon' => 'icon-pencil',
            'data-toggle' => null
        ),
        'delete' => array(
            'title' => 'Delete',
            'href' => null,
            'icon' => 'icon-trash',
            'data-toggle' => 'dialog'
        ),
        'imageManeger' => array(
            'title' => 'Image Manager',
            'href' => null,
            'icon' => 'icon-picture',
            'data-toggle' => null
        ),
    );
    //endregion

    //region Get Set Attributes
    public function setTableName ( $value ) {
        $this->dtsTable = $value;
    }

    public function setPositionFieldName ( $value ) {
        $this->dtsPositionFieldName = $value;
    }

    public function setSortable ( $value ) {
        $this->dtsIsSortable = $value;
    }

    public function setFields ( $array ) {
        $this->dtsFields = $this->dtsIsSortable ? array(array('db' => $this->dtsPositionFieldName, 'dt' => 0)) : array();
        $this->dtsFields[] = array(
            'db' => 'id',
            'dt' => $this->dtsIsSortable ? 1 : 0
        );
        foreach($array as $key => $value) {
            $this->dtsFields[]['db'] = $value;
            $this->dtsFields[count( $this->dtsFields ) - 1]['dt'] = $this->dtsIsSortable ? $key + 2 : $key + 1;
        }
    }

    public function setColumns ( $array ) {
        $this->dtsColumns = $this->dtsIsSortable ? array($this->dtsPositionFieldName) : array();
        $this->dtsColumns[] = 'Id';
        foreach($array as $key => $value) {
            $this->dtsColumns[] = $value;
        }
        if ( $this->dtsShowActionButtons ) {
            $this->dtsColumns[] = 'Actions';
        }
    }

    public function setColumnsDef ( $value ) {
        $this->dtsColumnsDef = '[';
        if ( $this->dtsIsSortable ) {
            $this->dtsColumnsDef .= '{"targets": [0], "visible": false, "searchable": false},{"targets": [1], "visible": false, "searchable": false},';
        }
        else {
            $this->dtsColumnsDef .= '{"targets": [0], "visible": false, "searchable": false},';
        }

        if ( $this->dtsShowActionButtons ) {
            $this->dtsColumnsDef .= '{"targets": [-1], "searchable": false, "sortable": false},';
        }

        $this->dtsColumnsDef .= $value;

        $this->dtsColumnsDef .= ']';
    }

    public function setThAttributes ( $array ) {
        $this->dtsThAttributes = $array;
    }

    public function setShowActionButtons ( $value ) {
        $this->dtsShowActionButtons = $value;
    }

    public function setTitleActionButton ( $key, $value ) {
        $this->dtsListActions[$key]['title'] = $value;
    }

    public function setHrefActionButton ( $key, $value ) {
        $this->dtsListActions[$key]['href'] = $value;
    }

    public function setIconActionButton ( $key, $value ) {
        $this->dtsListActions[$key]['icon'] = $value;
    }

    public function setDataToggleActionButton ( $key, $value ) {
        $this->dtsListActions[$key]['data-toggle'] = $value;
    }

    public function getSortable () {
        return $this->dtsIsSortable;
    }

    public function getColumns () {
        return $this->dtsColumns;
    }

    public function getColumnsDefs () {
        return $this->dtsColumnsDef;
    }

    public function getThAttributes () {
        return $this->dtsThAttributes;
    }
    //endregion

    //region Core
    private function limit ( $request, $columns ) {
        $limit = '';

        if ( isset( $request['start'] ) && $request['length'] != -1 ) {
            $limit = "LIMIT " . intval( $request['start'] ) . ", " . intval( $request['length'] );
        }

        return $limit;
    }

    private function order ( $request, $columns ) {
        $order = '';

        if ( isset( $request['order'] ) && count( $request['order'] ) ) {
            $orderBy = array();
            $dtColumns = $this->pluck( $columns, 'dt' );

            for ( $i = 0, $ien = count( $request['order'] ); $i < $ien; $i++ ) {
                // Convert the column index into the column data property
                $columnIdx = intval( $request['order'][$i]['column'] );
                $requestColumn = $request['columns'][$columnIdx];

                $columnIdx = array_search( $requestColumn['data'], $dtColumns );
                $column = $columns[$columnIdx];

                if ( $requestColumn['orderable'] == 'true' ) {
                    $dir = $request['order'][$i]['dir'] === 'asc' ?
                        'ASC' :
                        'DESC';

                    $orderBy[] = '`' . $column['db'] . '` ' . $dir;
                }
            }

            $order = 'ORDER BY ' . implode( ', ', $orderBy );
        }

        return $order;
    }

    private function pluck ( $a, $prop ) {
        $out = array();

        for ( $i = 0, $len = count($a); $i < $len; $i++ ) {
            $out[] = $a[$i][$prop];
        }

        return $out;
    }

    private function filter ( $request, $columns ) {
        $globalSearch = array();
        $columnSearch = array();
        $dtColumns = $this->pluck( $columns, 'dt' );

        if ( isset($request['search']) && $request['search']['value'] != '' ) {
            $str = $request['search']['value'];

            for ( $i = 0, $ien = count($request['columns']); $i < $ien; $i++ ) {
                $requestColumn = $request['columns'][$i];
                $columnIdx = array_search( $requestColumn['data'], $dtColumns );
                $column = $columns[$columnIdx];

                if ( $requestColumn['searchable'] == 'true' ) {
                    $globalSearch[] = "`" . $column['db'] . "` LIKE " . '\'%' . $str . '%\'';
                }
            }
        }

        // Individual column filtering
        for ( $i = 0, $ien = count( $request['columns'] ); $i < $ien; $i++ ) {
            $requestColumn = $request['columns'][$i];
            $columnIdx = array_search( $requestColumn['data'], $dtColumns );
            $column = $columns[$columnIdx];

            $str = $requestColumn['search']['value'];

            if ( $requestColumn['searchable'] == 'true' &&
                $str != '' ) {
                $columnSearch[] = "`" . $column['db'] . "` LIKE " . '\'%' . $str . '%\'';
            }
        }

        // Combine the filters into a single string
        $where = '';

        if ( count( $globalSearch ) ) {
            $where = '(' . implode( ' OR ', $globalSearch ) . ')';
        }

        if ( count( $columnSearch ) ) {
            $where = $where === '' ?
                implode( ' AND ', $columnSearch ) :
                $where .' AND '. implode( ' AND ', $columnSearch );
        }

        if ( $where !== '' ) {
            $where = 'WHERE ' . $where;
        }

        return $where;
    }

    private function dataOutput ( $columns, $data ) {
        $out = array();

        for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
            $row = array();

            $max_row = -1;
            for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
                $column = $columns[$j];

                // Is there a formatter?
                if ( isset( $column['formatter'] ) ) {
                    $row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
                }
                else {
                    $row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
                }

                if ( $max_row < $column['dt'] ) { $max_row = $column['dt']; }
            }

            if ( $this->dtsShowActionButtons ) {
                $defaultContent = '';
                foreach ( $this->dtsListActions as $key => $value ) {
                    if ( isset( $value['href'] ) && !empty( $value['href'] ) ) {
                        $defaultContent .= '<a title="' . $value['title'] . '" href="' . $value['href'] . '?id=' . $data[$i]['id'] . '" ' . ( isset($value['data-toggle']) ? 'data-toggle="' . $value['data-toggle'] . '"' : '' ) . '><span class="' . $value['icon'] . '"></span></a>';
                    }
                }
                $row[$max_row + 1] = $defaultContent;
            }

            $row['DT_RowAttr']['data-id'] = $data[$i]['id'];
            if ( isset( $data[$i][$this->dtsPositionFieldName] ) ) {
                $row['DT_RowAttr']['data-position'] = $data[$i][$this->dtsPositionFieldName];
            }

            $out[] = $row;
        }

        return $out;
    }

    protected function listDataServerSide () {
        $request = $_GET;
        $primaryKey = $this->dtsPrimaryKey;

        $table = $this->dtsTable;
        $columns = $this->dtsFields;

        // Build the SQL query string from the request
        $limit = $this->limit( $request, $columns );
        $order = $this->order( $request, $columns );
        $where = $this->filter( $request, $columns );

        $data = R::getAll("SELECT SQL_CALC_FOUND_ROWS `".implode( "`, `", $this->pluck( $columns, 'db' ) )."`
			 FROM `$table`
			 $where
			 $order
			 $limit");

        $resFilterLength = R::getAll(
            "SELECT FOUND_ROWS() AS foundRows"
        );

        $recordsFiltered = $resFilterLength[0]['foundRows'];

        $resTotalLength = R::getAll(
            "SELECT COUNT(`{$primaryKey}`) AS count
			 FROM   `$table`"
        );
        $recordsTotal = $resTotalLength[0]['count'];

        /*
         * Output
         */
        return array(
            "draw"            => intval( $request['draw'] ),
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $this->dataOutput( $columns, $data )
        );
    }

    public function reorderServerSide() {
        if ($this->app->isAjax()) {
            $oldPosition = $_POST['oldPosition'];
            $newPosition = $_POST['newPosition'];
            $id = $_POST['id'];

            if ($oldPosition > $newPosition) {
                R::exec("UPDATE {$this->dtsTable} SET {$this->dtsPositionFieldName} = ({$this->dtsPositionFieldName} + 1) WHERE {$this->dtsPositionFieldName} < {$oldPosition} AND {$this->dtsPositionFieldName} >= {$newPosition}");
            } else if ($oldPosition < $newPosition) {
                R::exec("UPDATE {$this->dtsTable} SET {$this->dtsPositionFieldName} = ({$this->dtsPositionFieldName} - 1) WHERE {$this->dtsPositionFieldName} > {$oldPosition} AND {$this->dtsPositionFieldName} <= {$newPosition}");
            }

            R::exec("UPDATE {$this->dtsTable} SET {$this->dtsPositionFieldName} = {$newPosition} WHERE id = {$id}");
        }
    }
    //endregion
} 