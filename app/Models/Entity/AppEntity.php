<?php

namespace App\Models\Entity;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use App\Models\Tables\AppTable;
use App\Helpers\Oreno\General;
use App\Helpers\Oreno\Converter;
use App\Helpers\Oreno\Date;

/**
 * Description of Services
 *
 * @author User
 */
class AppEntity extends AppTable {

    protected $AppTable;
    protected $General;
    protected $Converter;
    protected $Date;

    public function __construct() {
        $this->AppTable = new AppTable;
        $this->General = new General();
        $this->Converter = new Converter();
        $this->Date = new Date();
    }

    //put your code here
    public function find($request, $type = '', $params = [], $connection = 'mysql', $test = null) {
        if (!isset($params['table_name']) || empty($params['table_name'])) {
            $params['table_name'] = $this->table_name;
        }
        if (!isset($type) || empty($type) || $type == '' || $type == null) {
            $type = 'all';
        }
        $data = [];
        if (isset($request) && !empty($request)) {
            $data = $this->AppTable->__find($request, $type, $params, $connection, $test);
        }
        return $data;
    }

    public function insert($request, $params = [], $connection = 'mysql') {
        if (!isset($params['table_name']) || empty($params['table_name'])) {
            $params['table_name'] = $this->table_name;
        }
        $data = [];
        if (isset($request) && !empty($request)) {
            $data = $this->AppTable->__insert($request, $params, $connection);
        }
        return $data;
    }

    public function insert_get_id($request, $params = [], $connection = 'mysql') {
        if (!isset($params['table_name']) || empty($params['table_name'])) {
            $params['table_name'] = $this->table_name;
        }
        $data = [];
        if (isset($request) && !empty($request)) {
            $data = $this->AppTable->__insert_get_id($request, $params, $connection);
        }
        return $data;
    }

    public function do_update($request, $data = [], $params = [], $connection = 'mysql') {
        if (!isset($params['table_name']) || empty($params['table_name'])) {
            $params['table_name'] = $this->table_name;
        }
        if (isset($request) && !empty($request)) {
            $data = $this->AppTable->__update($request, $data, $params, $connection);
        }
        return $data;
    }
    
    public function do_delete($request, $params = [], $connection = 'mysql') {
        if (!isset($params['table_name']) || empty($params['table_name'])) {
            $params['table_name'] = $this->table_name;
        }
        if (isset($request) && !empty($request)) {
            $data = $this->AppTable->__delete($request, $params, $connection);
        }
        return $data;
    }

    public function do_remove($request, $params = [], $connection = 'mysql') {
        $this->AppTable = new AppTable;
        if (!isset($params['table_name']) || empty($params['table_name'])) {
            $params['table_name'] = $this->table_name;
        }
        if (isset($request) && !empty($request)) {
            $data = $this->AppTable->__remove($request, $params, $connection);
        }
        return $data;
    }
}
