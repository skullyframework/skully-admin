<?php
namespace SkullyAdmin;

use RedBeanPHP\Facade as R;

/**
 * Class DataTablesServerSideTrait
 * @package App
 * Trait to be used at App\Application
 */
trait DataTablesTrait {
    //region Attributes

    //region Override
    /*protected $dtsPrimaryKey        = 'id';
    protected $dtsTableName         = 'test';
    protected $dtsPositionFieldName = 'position';
    protected $dtsIsSortable        = false;*/
    //endregion

    private $dtsFields          = array();
    private $dtsColumns         = array();
    private $dtsThAttributes    = array();
    private $dtsColumnsDef      = '[]';
    //endregion

    //region Get Set Attributes
    public function setFields( $array ) {
        //set columns
        $this->dtsColumns   = $this->dtsIsSortable ? array($this->dtsPositionFieldName) : array();
        $this->dtsColumns[] = 'Id';

        //set fields
        $this->dtsFields    = $this->dtsIsSortable ? array(array('db' => $this->dtsPositionFieldName, 'dt' => 0, 'prefix' => 't')) : array();
        $this->dtsFields[]  = array(
            'db'        => $this->dtsPrimaryKey,
            'dt'        => $this->dtsIsSortable ? 1 : 0,
            'prefix'    => 't'
        );
        foreach($array as $key => $value) {
            //set columns
            $this->dtsColumns[] = isset( $value['column'] ) ? $value['column'] : $value['field'];

            //set fields
            $this->dtsFields[]['db']                                        = $value['field'];
            $this->dtsFields[count( $this->dtsFields ) - 1]['dt']           = $this->dtsIsSortable ? $key + 2 : $key + 1;
            $this->dtsFields[count( $this->dtsFields ) - 1]['prefix']       = isset( $value['prefix'] ) ? $value['prefix'] : 't';
            $this->dtsFields[count( $this->dtsFields ) - 1]['rawSql']       = isset( $value['rawSql'] ) ? $value['rawSql'] : null;
            $this->dtsFields[count( $this->dtsFields ) - 1]['formatter']    = isset( $value['formatter'] ) ? $value['formatter'] : null;
        }
    }

    public function setColumnsDef( $value ) {
        $this->dtsColumnsDef = '[';
        if( $this->dtsIsSortable ) {
            $this->dtsColumnsDef .= '{"targets": [0], "visible": false, "searchable": false},{"targets": [1], "visible": false, "searchable": false},';
        }
        else {
            $this->dtsColumnsDef .= '{"targets": [0], "visible": false, "searchable": false},';
        }

        $this->dtsColumnsDef .= $value;

        $this->dtsColumnsDef .= ']';
    }

    public function setThAttributes( $array ) {
        $this->dtsThAttributes = $array;
    }

    public function getFields() {
        return $this->dtsFields;
    }

    public function getColumns() {
        return $this->dtsColumns;
    }

    public function getColumnsDefs() {
        return $this->dtsColumnsDef;
    }

    public function getThAttributes() {
        return $this->dtsThAttributes;
    }
    //endregion

    //region Core
    private function limit( $request, $columns ) {
        $limit = '';

        if( isset( $request['start'] ) && $request['length'] != -1 ) {
            $limit = "LIMIT " . intval( $request['start'] ) . ", " . intval( $request['length'] );
        }

        return $limit;
    }

    private function order( $request, $columns ) {
        $order = '';

        if( isset( $request['order'] ) && count( $request['order'] ) ) {
            $orderBy    = array();
            $dtColumns  = $this->pluck( $columns, 'dt' );

            for( $i = 0, $ien = count( $request['order'] ); $i < $ien; $i++ ) {
                // Convert the column index into the column data property
                $columnIdx      = intval( $request['order'][$i]['column'] );
                $requestColumn  = $request['columns'][$columnIdx];

                $columnIdx      = array_search( $requestColumn['data'], $dtColumns );
                $column         = $columns[$columnIdx];

                if( $requestColumn['orderable'] == 'true' ) {
                    $dir = $request['order'][$i]['dir'] === 'asc' ?
                        'ASC' :
                        'DESC';

                    if( $this->checkUnionSqlForHaving( $this->getFields() ) ) {
                        $orderBy[] = $column['db'] . ' ' . $dir;
                    }
                    else {
                        $orderBy[] = $column['prefix'] . '.`' . $column['db'] . '` ' . $dir;
                    }
                }
            }

            if(!empty($orderBy)) {
                $order = 'ORDER BY ' . implode( ', ', $orderBy );
            }
        }

        return $order;
    }

    private function pluck( $a, $prop ) {
        $out = array();

        for( $i = 0, $len = count($a); $i < $len; $i++ ) {
            $out[] = $a[$i][$prop];
        }

        return $out;
    }

    private function pluckString( $a, $prop ) {
        $out = array();

        for( $i = 0, $len = count($a); $i < $len; $i++ ) {
            if( isset( $a[$i]['rawSql'] ) && !empty($a[$i]['rawSql']) ) {
                $out[] = $a[$i]['rawSql'] . ' AS ' . $a[$i][$prop];
            }
            else {
                $out[] = $a[$i]['prefix'] . '.`' . $a[$i][$prop] . '`';
            }
        }

        return implode( ',', $out );
    }

    private function filter( $request, $columns ) {
        $globalSearch   = array();
        $columnSearch   = array();
        $dtColumns      = $this->pluck( $columns, 'dt' );

        if( isset($request['search']) && $request['search']['value'] != '' ) {
            $str = $request['search']['value'];

            for( $i = 0, $ien = count($request['columns']); $i < $ien; $i++ ) {
                $requestColumn  = $request['columns'][$i];
                $columnIdx      = array_search( $requestColumn['data'], $dtColumns );
                $column         = $columns[$columnIdx];

                if( $requestColumn['searchable'] == 'true' &&  empty( $column['rawSql'] ) ) {
                    $globalSearch[] = $column['prefix'] . ".`" . $column['db'] . "` LIKE " . '\'%' . $str . '%\'';
                }
            }
        }

        // Individual column filtering
        for( $i = 0, $ien = count( $request['columns'] ); $i < $ien; $i++ ) {
            $requestColumn  = $request['columns'][$i];
            $columnIdx      = array_search( $requestColumn['data'], $dtColumns );
            $column         = $columns[$columnIdx];

            $str            = $requestColumn['search']['value'];

            if( $requestColumn['searchable'] == 'true' && $str != '' &&  empty( $column['rawSql'] ) ) {
                $columnSearch[] = $column['prefix'] . ".`" . $column['db'] . "` LIKE " . '\'%' . $str . '%\'';
            }
        }

        // Combine the filters into a single string
        $where = '';

        if( count( $globalSearch ) ) {
            $where = '(' . implode( ' OR ', $globalSearch ) . ')';
        }

        if( count( $columnSearch ) ) {
            $where = $where === '' ?
                implode( ' AND ', $columnSearch ) :
                $where .' AND '. implode( ' AND ', $columnSearch );
        }

        if( $where !== '' ) {
            $where = 'WHERE ' . $where;
        }

        return $where;
    }

    private function filterHaving( $request, $columns ) {
        $globalSearch   = array();
        $columnSearch   = array();
        $dtColumns      = $this->pluck( $columns, 'dt' );

        if( isset($request['search']) && $request['search']['value'] != '' ) {
            $str = $request['search']['value'];

            for( $i = 0, $ien = count($request['columns']); $i < $ien; $i++ ) {
                $requestColumn  = $request['columns'][$i];
                $columnIdx      = array_search( $requestColumn['data'], $dtColumns );
                $column         = $columns[$columnIdx];

                if( $requestColumn['searchable'] == 'true' &&  !empty( $column['rawSql'] ) ) {
                    $globalSearch[] = $column['db'] . " LIKE " . '\'%' . $str . '%\'';
                }
            }
        }

        // Individual column filtering
        for( $i = 0, $ien = count( $request['columns'] ); $i < $ien; $i++ ) {
            $requestColumn  = $request['columns'][$i];
            $columnIdx      = array_search( $requestColumn['data'], $dtColumns );
            $column         = $columns[$columnIdx];

            $str            = $requestColumn['search']['value'];

            if( $requestColumn['searchable'] == 'true' && $str != '' &&  !empty( $column['rawSql'] ) ) {
                $columnSearch[] = $column['db'] . " LIKE " . '\'%' . $str . '%\'';
            }
        }

        $having = '';

        if( count( $globalSearch ) ) {
            $having = '(' . implode( ' OR ', $globalSearch ) . ')';
        }

        if( count( $columnSearch ) ) {
            $having = $having === '' ?
                implode( ' AND ', $columnSearch ) :
                $having .' AND '. implode( ' AND ', $columnSearch );
        }

        if( $having !== '' ) {
            $having = 'HAVING ' . $having;
        }

        return $having;
    }

    private function dataOutput( $columns, $data ) {
        $out = array();

        for( $i = 0, $ien = count($data) ; $i < $ien ; $i++ ) {
            $row        = array();

            $max_row    = -1;
            for( $j = 0, $jen = count($columns) ; $j < $jen ; $j++ ) {
                $column = $columns[$j];

                // Is there a formatter?
                if( isset( $column['formatter'] ) ) {
                    $row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
                }
                else {
                    $row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
                }

                if( $max_row < $column['dt'] ) { $max_row = $column['dt']; }
            }

            $row['DT_RowAttr']['data-id'] = $data[$i][$this->dtsPrimaryKey];
            if( isset( $data[$i][$this->dtsPositionFieldName] ) ) {
                $row['DT_RowAttr']['data-position'] = $data[$i][$this->dtsPositionFieldName];
            }

            $out[] = $row;
        }

        return $out;
    }

    private function checkUnionSqlForHaving( $a ) {
        $flag = false;

        for( $i = 0, $len = count($a); $i < $len; $i++ ) {
            if( isset( $a[$i]['rawSql'] ) ) {
                $flag = true;
                break;
            }
        }

        return $flag;
    }

    protected function listDataServerSide() {
        $request = $_GET;

        $fields = $this->getFields();

        // Build the SQL query string from the request
        $limit  = $this->limit( $request, $fields );
        $where  = $this->filter( $request, $fields );
        $order  = $this->order( $request, $fields );

        $data   = null;

        if( $this->checkUnionSqlForHaving( $fields ) ) {
            $having = $this->filterHaving( $request, $fields );
            $data   = R::getAll("(SELECT " . $this->pluckString($fields, 'db') . "
                 FROM `{$this->dtsTableName}` t
                 $where)

                 UNION

                 (SELECT " . $this->pluckString($fields, 'db') . "
                 FROM `{$this->dtsTableName}` t
                 $having)

                 $order
                 $limit"
            );
        }
        else {
            $data = R::getAll("SELECT SQL_CALC_FOUND_ROWS " . $this->pluckString($fields, 'db') . "
                 FROM `{$this->dtsTableName}` t
                 $where
                 $order
                 $limit"
            );
        }

        $resFilterLength    = R::getAll(
            "SELECT FOUND_ROWS() AS foundRows"
        );
        $recordsFiltered    = $resFilterLength[0]['foundRows'];
        $resTotalLength     = R::getAll(
            "SELECT COUNT(t.`{$this->dtsPrimaryKey}`) AS count
			 FROM   `{$this->dtsTableName}` t"
        );
        $recordsTotal = $resTotalLength[0]['count'];

        return array(
            "draw"            => intval( $request['draw'] ),
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $this->dataOutput( $fields, $data )
        );
    }

    public function reorderServerSide() {
        if($this->app->isAjax()) {
            $oldPosition    = $_POST['oldPosition'];
            $newPosition    = $_POST['newPosition'];
            $id             = $_POST['id'];

            if($oldPosition > $newPosition) {
                R::exec("UPDATE {$this->dtsTableName} SET {$this->dtsPositionFieldName} = ({$this->dtsPositionFieldName} + 1) WHERE {$this->dtsPositionFieldName} < {$oldPosition} AND {$this->dtsPositionFieldName} >= {$newPosition}");
            } else if ($oldPosition < $newPosition) {
                R::exec("UPDATE {$this->dtsTableName} SET {$this->dtsPositionFieldName} = ({$this->dtsPositionFieldName} - 1) WHERE {$this->dtsPositionFieldName} > {$oldPosition} AND {$this->dtsPositionFieldName} <= {$newPosition}");
            }

            R::exec("UPDATE {$this->dtsTableName} SET {$this->dtsPositionFieldName} = {$newPosition} WHERE id = {$id}");
        }
    }
    //endregion
} 