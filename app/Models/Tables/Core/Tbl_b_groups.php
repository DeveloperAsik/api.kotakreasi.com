<?php

namespace App\Models\Tables\Core;

use App\Models\Tables\AppTable;

class Tbl_b_groups extends AppTable {

    //put your code here  
    public static $table_name;

    public function __construct() {
        parent::__construct();
        $this->table_name = "tbl_b_groups";
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
                'name' => 'title',
                'type' => 'varchar',
                'length' => 255
            ],
            [
                'name' => 'description',
                'type' => 'text',
                'length' => ''
            ],
            [
                'name' => 'icon',
                'type' => 'varchar',
                'length' => 255
            ],
            [
                'name' => 'rank ',
                'type' => 'int',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'level',
                'type' => 'int',
                'length' => 11
            ],
            [
                'name' => 'parent_id',
                'type' => 'int',
                'length' => 32
            ],
            [
                'name' => 'is_menu',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0
            ],
            [
                'name' => 'is_group_project',
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
