<?php

namespace App\Models\Tables\Core;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use App\Models\Tables\AppTable;

/**
 * Description of Tbl_join_user_permissions
 *
 * @author 64146
 */
class Tbl_join_user_permissions extends AppTable {

    //put your code here  
    public static $table_name;

    public function __construct() {
        parent::__construct();
        $this->table_name = "tbl_join_user_permissions";
        $this->field = [
            [
                'name' => 'id',
                'type' => 'int',
                'length' => 32,
                'primary' => true,
                'auto_increment' => true
            ],
            [
                'name' => 'code',
                'type' => 'varchar',
                'length' => 32
            ],
            [
                'name' => 'user_id ',
                'type' => 'int',
                'length' => 32
            ],
            [
                'name' => 'permission_id ',
                'type' => 'int',
                'length' => 32
            ],
            [
                'name' => 'is_create',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'is_read',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'is_update',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'is_delete',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'is_active',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'created_date',
                'type' => 'timestamp',
                'length' => ''
            ],
            [
                'name' => 'created_by',
                'type' => 'int',
                'length' => 32
            ],
            [
                'name' => 'updated_date',
                'type' => 'timestamp',
                'length' => ''
            ],
            [
                'name' => 'updated_by',
                'type' => 'int',
                'length' => 32
            ]
        ];
    }
}
