<?php

namespace App\Models\Tables\Core;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use App\Models\Tables\AppTable;

/**
 * Description of Tbl_join_user_tokens
 *
 * @author 64146
 */
class Tbl_join_user_tokens extends AppTable {

    //put your code here  
    public static $table_name;

    public function __construct() {
        parent::__construct();
        $this->table_name = "tbl_join_user_tokens";
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
                'name' => 'user_id',
                'type' => 'int',
                'length' => 32
            ],
            [
                'name' => 'uuid',
                'type' => 'varchar',
                'length' => 32
            ],
            [
                'name' => 'token',
                'type' => 'text',
                'length' => 0
            ],
            [
                'name' => 'expiry',
                'type' => 'timestamp',
                'length' => ''
            ],
            [
                'name' => 'is_token_access',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'is_token_auth',
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
