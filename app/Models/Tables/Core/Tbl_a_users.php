<?php

namespace App\Models\Tables\Core;

use App\Models\Tables\AppTable;

class Tbl_a_groups extends AppTable {

    //put your code here  
    public static $table_name;

    public function __construct() {
        parent::__construct();
        $this->table_name = "tbl_a_users";
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
                'name' => 'user_name',
                'type' => 'varchar',
                'length' => 255
            ],
            [
                'name' => 'first_name',
                'type' => 'varchar',
                'length' => 100
            ],
            [
                'name' => 'last_name',
                'type' => 'varchar',
                'length' => 155
            ],
            [
                'name' => 'email',
                'type' => 'varchar',
                'length' => 255
            ],
            [
                'name' => 'ldap_id',
                'type' => 'int',
                'length' => 32
            ],
            [
                'name' => 'password',
                'type' => 'text'
            ],
            [
                'name' => 'is_active',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'created_date',
                'type' => 'timestamp'
            ],
            [
                'name' => 'created_by',
                'type' => 'int',
                'length' => 32
            ],
            [
                'name' => 'updated_date',
                'type' => 'timestamp'
            ],
            [
                'name' => 'updated_by',
                'type' => 'int',
                'length' => 32
            ],
        ];
    }
}