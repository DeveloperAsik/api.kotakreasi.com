<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Helpers\MyHelper;
use App\Helpers\Oreno\Date;
use App\Models\MY_Model;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GenerateDummy
 *
 * @author User
 * 
  TRUNCATE `tbl_a_groups`;
  TRUNCATE `tbl_a_menus`;
  TRUNCATE `tbl_a_permissions`;
  TRUNCATE `tbl_a_users`;
  TRUNCATE `tbl_a_user_profiles`;
  TRUNCATE `tbl_a_user_tokens`;
  TRUNCATE `tbl_b_group_permissions`;
  TRUNCATE `tbl_b_menu_permission`;
  TRUNCATE `tbl_b_user_groups`;
  TRUNCATE `tbl_b_user_permissions`;
 */
class GenerateDummy {

    //put your code here

    public function __construct() {
        $this->MY_Model = new MY_Model;
        $this->Date = new Date;
    }

    public function generate_user(Request $request) {
        //insert tbl_a_users
        //$param_insert_user = [
        //    [
        //        'user_name' => 'systemweb',
        //        'user_ldap' => '-',
        //        'first_name' => 'system',
        //        'last_name' => 'web',
        //        'password' => '$argon2id$v=19$m=65536,t=4,p=1$dEhTMDU3Sk1IUVJDTnZ0aQ$g7L/Px3Fr8LU0Dy0wQ/KtaI/ql07hKXqnmxrxvqyGV0',
        //        'salt' => '-',
        //        'email' => 'system.web@mail.com',
        //        'description' => '-',
        //        'profile_id' => 0,
        //        'registered_type_id' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_name' => 'superuser',
        //        'user_ldap' => '-',
        //        'first_name' => 'super',
        //        'last_name' => 'user',
        //        'password' => '$argon2id$v=19$m=65536,t=4,p=1$dEhTMDU3Sk1IUVJDTnZ0aQ$g7L/Px3Fr8LU0Dy0wQ/KtaI/ql07hKXqnmxrxvqyGV0',
        //        'salt' => '-',
        //        'email' => 'super.user@mail.com',
        //        'description' => '-',
        //        'profile_id' => 0,
        //        'registered_type_id' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_name' => 'administrator-isu',
        //        'user_ldap' => '-',
        //        'first_name' => 'admin',
        //        'last_name' => 'isu',
        //        'password' => '$argon2id$v=19$m=65536,t=4,p=1$dEhTMDU3Sk1IUVJDTnZ0aQ$g7L/Px3Fr8LU0Dy0wQ/KtaI/ql07hKXqnmxrxvqyGV0',
        //        'salt' => '-',
        //        'email' => 'admin.isu@bni.co.id',
        //        'description' => '-',
        //        'profile_id' => 0,
        //        'registered_type_id' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_name' => 'arif.firmansyah',
        //        'user_ldap' => 'hq\821937',
        //        'first_name' => 'arif',
        //        'last_name' => 'firmansyah',
        //        'password' => '$argon2id$v=19$m=65536,t=4,p=1$dEhTMDU3Sk1IUVJDTnZ0aQ$g7L/Px3Fr8LU0Dy0wQ/KtaI/ql07hKXqnmxrxvqyGV0',
        //        'salt' => '-',
        //        'email' => 'arif.firmansyah@bni.co.id',
        //        'description' => '-',
        //        'profile_id' => 0,
        //        'registered_type_id' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_name' => 'elang.saputro',
        //        'user_ldap' => 'hq\62882',
        //        'first_name' => 'elang',
        //        'last_name' => 'saputro',
        //        'password' => '$argon2id$v=19$m=65536,t=4,p=1$dEhTMDU3Sk1IUVJDTnZ0aQ$g7L/Px3Fr8LU0Dy0wQ/KtaI/ql07hKXqnmxrxvqyGV0',
        //        'salt' => '-',
        //        'email' => 'elang.saputro@bni.co.id',
        //        'description' => '-',
        //        'profile_id' => 0,
        //        'registered_type_id' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ]
        //];
        //DB::table('tbl_a_users')->insert($param_insert_user);
        //insert tbl_a_groups
        //$param_insert_groups = [
        //    [
        //        'name' => 'system',
        //        'description' => '-',
        //        'parent_id' => 0,
        //        'rank' => 1,
        //        'level' => 1500,
        //        'is_menu' => 0,
        //        'is_group_project' => 0,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'superuser',
        //        'description' => '-',
        //        'parent_id' => 0,
        //        'rank' => 2,
        //        'level' => 1000,
        //        'is_menu' => 1,
        //        'is_group_project' => 0,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'staff',
        //        'description' => '-',
        //        'parent_id' => 0,
        //        'rank' => 3,
        //        'level' => 800,
        //        'is_menu' => 1,
        //        'is_group_project' => 0,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'vendor',
        //        'description' => '-',
        //        'parent_id' => 0,
        //        'rank' => 4,
        //        'level' => 300,
        //        'is_menu' => 0,
        //        'is_group_project' => 0,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-isu',
        //        'description' => '-',
        //        'parent_id' => 3,
        //        'rank' => 1,
        //        'level' => 600,
        //        'is_menu' => 0,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-isu-isb1',
        //        'description' => '-',
        //        'parent_id' => 5,
        //        'rank' => 1,
        //        'level' => 500,
        //        'is_menu' => 1,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-isu-isb2',
        //        'description' => '-',
        //        'parent_id' => 5,
        //        'rank' => 1,
        //        'level' => 500,
        //        'is_menu' => 1,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-isu-isb3',
        //        'description' => '-',
        //        'parent_id' => 5,
        //        'rank' => 2,
        //        'level' => 500,
        //        'is_menu' => 1,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-developer',
        //        'description' => '-',
        //        'parent_id' => 3,
        //        'rank' => 1,
        //        'level' => 600,
        //        'is_menu' => 0,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-project-manager',
        //        'description' => '-',
        //        'parent_id' => 3,
        //        'rank' => 2,
        //        'level' => 200,
        //        'is_menu' => 0,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-vendor-sat',
        //        'description' => '-',
        //        'parent_id' => 4,
        //        'rank' => 1,
        //        'level' => 200,
        //        'is_menu' => 0,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'name' => 'tim-vendor-pentest',
        //        'description' => '-',
        //        'parent_id' => 4,
        //        'rank' => 2,
        //        'level' => 200,
        //        'is_menu' => 0,
        //        'is_group_project' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ]
        //];
        //DB::table('tbl_a_groups')->insert($param_insert_groups);
        //tbl_b_user_groups
        //$param_insert_group_user = [
        //    [
        //        'user_id' => 1,
        //        'group_id' => 1,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_id' => 2,
        //        'group_id' => 2,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_id' => 3,
        //        'group_id' => 3,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_id' => 4,
        //        'group_id' => 6,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_id' => 5,
        //        'group_id' => 6,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ],
        //    [
        //        'user_id' => 6,
        //        'group_id' => 6,
        //        'is_active' => 1,
        //        'created_by' => 1,
        //        'created_date' => $this->Date->now(),
        //        'updated_by' => 1,
        //        'updated_date' => $this->Date->now()
        //    ]
        //];
        //DB::table('tbl_b_user_groups')->insert($param_insert_group_user);
        //insert permission
        //$sql_insert_permission = "
        //INSERT INTO `tbl_a_permissions` (`name`, `path`, `controller`, `method`, `description`, `is_basic`, `is_public`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
        //('extraweb/login', 'extraweb/login', 'Auth', 'login', '-', 1, 1, 1, 1, '2022-06-20 08:20:22', 3, '2022-09-12 09:49:58'),
        //('validate-user', 'extraweb/validate-user', 'Authenticate', 'validate_user', '-', 1, 1, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('save-token', 'extraweb/save-token', 'Authenticate', 'save_token', '-', 1, 1, 1, 1, '2022-06-20 08:20:22', 3, '2022-09-15 10:09:11'),
        //('extraweb/dashboard', 'extraweb/dashboard', 'Auth', 'dashboard', '-', 1, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/ajax/get', 'extraweb/ajax/get/{method}', 'Ajax', 'fn_ajax_get', '-', 1, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/ajax/post', 'extraweb/ajax/post/{method}', 'Ajax', 'fn_ajax_post', '-', 1, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/ajax/var/{method}', 'extraweb/ajax/var/{method}', 'Ajax', 'fn_ajax_var', '-', 1, 0, 1, 1, '2022-06-20 08:20:22', 3, '2022-07-01 09:28:55'),
        //('extraweb/logs', 'extraweb/logs', 'AuthController', 'logs', '-', 1, 0, 1, 2, '2022-08-10 09:57:47', 2, '2022-08-10 09:57:47'),
        //('extraweb/logout', 'extraweb/logout', 'Auth', 'logout', '-', 1, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/profile', 'extraweb/profile', 'Auth', 'profile', '-', 1, 0, 1, 3, '2022-07-04 01:23:51', 3, '2022-09-07 13:17:44'),
        //('extraweb/profile/update', 'extraweb/profile/update', 'Auth', 'update_profile', '', 1, 0, 1, 3, '2022-07-04 01:23:51', 3, '2022-07-04 01:23:51'),
        //('extraweb/profile/get-group-permission-list', 'extraweb/profile/get-group-permission-list', 'Auth', 'get_group_permission_list', '', 1, 0, 1, 3, '2022-07-04 01:23:51', 3, '2022-07-04 01:23:51'),
        //('extraweb/profile/fnUploadPhoto', 'extraweb/profile/fnUploadPhoto', 'Auth', 'fnUploadPhoto', '', 1, 0, 1, 3, '2022-07-04 01:23:51', 3, '2022-07-04 01:23:51'),
        //
        //('extraweb/generator/data/dummy/create', 'extraweb/generator/data/dummy/create', 'Dummy', 'create', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/dummy/delete/{id}', 'extraweb/generator/data/dummy/delete/{id}', 'Dummy', 'delete', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/dummy/edit/{id}', 'extraweb/generator/data/dummy/edit/{id}', 'Dummy', 'edit', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/dummy/get_list', 'extraweb/generator/data/dummy/get_list', 'Dummy', 'get_list', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/dummy/insert', 'extraweb/generator/data/dummy/insert', 'Dummy', 'insert', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/dummy/remove/{id}', 'extraweb/generator/data/dummy/remove/{id}', 'Dummy', 'remove', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/dummy/update/{id}', 'extraweb/generator/data/dummy/update/{id}', 'Dummy', 'update', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/dummy/view', 'extraweb/generator/data/dummy/view', 'Dummy', 'view', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //
        //('extraweb/generator/data/subject/create', 'extraweb/generator/data/subject/create', 'Subject', 'create', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/subject/delete/{id}', 'extraweb/generator/data/subject/delete/{id}', 'Subject', 'delete', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/subject/edit/{id}', 'extraweb/generator/data/subject/edit/{id}', 'Subject', 'edit', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/subject/get_list', 'extraweb/generator/data/subject/get_list', 'Subject', 'get_list', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/subject/insert', 'extraweb/generator/data/subject/insert', 'Subject', 'insert', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/subject/remove/{id}', 'extraweb/generator/data/subject/remove/{id}', 'Subject', 'remove', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/subject/update/{id}', 'extraweb/generator/data/subject/update/{id}', 'Subject', 'update', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/generator/data/subject/view', 'extraweb/generator/data/subject/view', 'Subject', 'view', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //
        //('extraweb/master/group/view', 'extraweb/master/group/view', 'Group', 'view', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/group/create', 'extraweb/master/group/create', 'Group', 'create', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/group/get_list', 'extraweb/master/group/get_list', 'Group', 'get_list', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/group/edit/{id}', 'extraweb/master/group/edit/{id}', 'Group', 'edit', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/group/update/{id}', 'extraweb/master/group/update/{id}', 'Group', 'update', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/group/insert', 'extraweb/master/group/insert', 'Group', 'insert', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/group/remove/{id}', 'extraweb/master/group/remove/{id}', 'Group', 'remove', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/group/delete/{id}', 'extraweb/master/group/delete/{id}', 'Group', 'delete', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //
        //('extraweb/master/permission/view', 'extraweb/master/permission/view', 'Permission', 'view', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/permission/create', 'extraweb/master/permission/create', 'Permission', 'create', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/permission/get_list', 'extraweb/master/permission/get_list', 'Permission', 'get_list', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/permission/edit/{id}', 'extraweb/master/permission/edit/{id}', 'Permission', 'edit', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/permission/update/{id}', 'extraweb/master/permission/update/{id}', 'Permission', 'update', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/permission/insert', 'extraweb/master/permission/insert', 'Permission', 'insert', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/permission/remove/{id}', 'extraweb/master/permission/remove/{id}', 'Permission', 'remove', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/permission/delete/{id}', 'extraweb/master/permission/delete/{id}', 'Permission', 'delete', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //
        //('extraweb/master/module/view', 'extraweb/master/module/view', 'Module', 'view', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/module/create', 'extraweb/master/module/create', 'Module', 'create', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/module/get_list', 'extraweb/master/module/get_list', 'Module', 'get_list', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/module/edit/{id}', 'extraweb/master/module/edit/{id}', 'Module', 'edit', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/module/update/{id}', 'extraweb/master/module/update/{id}', 'Module', 'update', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/module/insert', 'extraweb/master/module/insert', 'Module', 'insert', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/module/remove/{id}', 'extraweb/master/module/remove/{id}', 'Module', 'remove', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //('extraweb/master/module/delete/{id}', 'extraweb/master/module/delete/{id}', 'Module', 'delete', '-', 0, 0, 1, 1, '2022-06-20 08:20:22', 1, '2022-06-20 08:20:22'),
        //
        //('extraweb/master/menu/create', 'extraweb/master/menu/create', 'Menu', 'create', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //('extraweb/master/menu/delete/{id}', 'extraweb/master/menu/delete/{id}', 'Menu', 'delete', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //('extraweb/master/menu/edit/{id}', 'extraweb/master/menu/edit/{id}', 'Menu', 'edit', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //('extraweb/master/menu/get_list', 'extraweb/master/menu/get_list', 'Menu', 'get_list', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //('extraweb/master/menu/insert', 'extraweb/master/menu/insert', 'Menu', 'insert', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //('extraweb/master/menu/remove/{id}', 'extraweb/master/menu/remove/{id}', 'Menu', 'remove', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //('extraweb/master/menu/update/{id}', 'extraweb/master/menu/update/{id}', 'Menu', 'update', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //('extraweb/master/menu/view', 'extraweb/master/menu/view', 'Menu', 'view', '-', 0, 0, 1, 2, '2022-07-13 11:10:38', 2, '2022-07-13 11:10:38'),
        //
        //('extraweb/master/user/create', 'extraweb/master/user/create', 'User', 'create', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/user/delete/{id}', 'extraweb/master/user/delete/{id}', 'User', 'delete', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/user/edit/{id}', 'extraweb/master/user/edit/{id}', 'User', 'edit', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/user/get_list', 'extraweb/master/user/get_list', 'User', 'get_list', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/user/insert', 'extraweb/master/user/insert', 'User', 'insert', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/user/remove/{id}', 'extraweb/master/user/remove/{id}', 'User', 'remove', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/user/update/{id}', 'extraweb/master/user/update/{id}', 'User', 'update', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/user/view', 'extraweb/master/user/view', 'User', 'view', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //
        //('extraweb/master/method/create', 'extraweb/master/method/create', 'Method', 'create', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/method/delete/{id}', 'extraweb/master/method/delete/{id}', 'Method', 'delete', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/method/edit/{id}', 'extraweb/master/method/edit/{id}', 'Method', 'edit', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/method/get_list', 'extraweb/master/method/get_list', 'Method', 'get_list', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/method/insert', 'extraweb/master/method/insert', 'Method', 'insert', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/method/remove/{id}', 'extraweb/master/method/remove/{id}', 'Method', 'remove', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/method/update/{id}', 'extraweb/master/method/update/{id}', 'Method', 'update', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //('extraweb/master/method/view', 'extraweb/master/method/view', 'Method', 'view', '-', 0, 0, 1, 2, '2022-07-15 15:15:52', 2, '2022-07-15 15:15:52'),
        //
        //('extraweb/master/controller/create', 'extraweb/master/controller/create', 'Contr', 'create', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //('extraweb/master/controller/delete/{id}', 'extraweb/master/controller/delete/{id}', 'Contr', 'delete', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //('extraweb/master/controller/edit/{id}', 'extraweb/master/controller/edit/{id}', 'Contr', 'edit', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //('extraweb/master/controller/get_list', 'extraweb/master/controller/get_list', 'Contr', 'get_list', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //('extraweb/master/controller/insert', 'extraweb/master/controller/insert', 'Contr', 'insert', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //('extraweb/master/controller/remove/{id}', 'extraweb/master/controller/remove/{id}', 'Contr', 'remove', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //('extraweb/master/controller/update/{id}', 'extraweb/master/controller/update/{id}', 'Contr', 'update', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //('extraweb/master/controller/view', 'extraweb/master/controller/view', 'Contr', 'view', '-', 0, 0, 1, 2, '2022-07-18 16:24:10', 2, '2022-07-18 16:24:10'),
        //
        //('extraweb/prefferences/user/groups/view', 'extraweb/prefferences/user/groups/view', 'UserGroup', 'view', '-', 0, 0, 1, 2, '2022-07-18 11:46:21', 2, '2022-07-18 11:53:46'),
        //('extraweb/prefferences/user/groups/get_list', 'extraweb/prefferences/user/groups/get_list', 'UserGroup', 'get_list', '-', 0, 0, 1, 2, '2022-07-18 12:41:59', 2, '2022-07-18 12:41:59'),
        //('extraweb/prefferences/user/groups/create', 'extraweb/prefferences/user/groups/create', 'UserGroup', 'create', '-', 0, 0, 1, 2, '2022-07-18 20:31:43', 2, '2022-07-18 20:31:43'),
        //('extraweb/prefferences/user/groups/delete/{id}', 'extraweb/prefferences/user/groups/delete/{id}', 'UserGroup', 'delete', '-', 0, 0, 1, 2, '2022-07-18 20:31:43', 2, '2022-07-18 20:31:43'),
        //('extraweb/prefferences/user/groups/edit/{id}', 'extraweb/prefferences/user/groups/edit/{id}', 'UserGroup', 'edit', '-', 0, 0, 1, 2, '2022-07-18 20:31:43', 2, '2022-07-18 20:31:43'),
        //('extraweb/prefferences/user/groups/insert', 'extraweb/prefferences/user/groups/insert', 'UserGroup', 'insert', '-', 0, 0, 1, 2, '2022-07-18 20:31:43', 2, '2022-07-18 20:31:43'),
        //('extraweb/prefferences/user/groups/remove/{id}', 'extraweb/prefferences/user/groups/remove/{id}', 'UserGroup', 'remove', '-', 0, 0, 1, 2, '2022-07-18 20:31:43', 2, '2022-07-18 20:31:43'),
        //('extraweb/prefferences/user/groups/update/{id}', 'extraweb/prefferences/user/groups/update/{id}', 'UserGroup', 'update', '-', 0, 0, 1, 2, '2022-07-18 20:31:43', 2, '2022-07-18 20:31:43'),
        //
        //('extraweb/prefferences/group/permissions/create', 'extraweb/prefferences/group/permissions/create', 'GroupPermission', 'create', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 07:36:28'),
        //('extraweb/prefferences/group/permissions/delete/{id}', 'extraweb/prefferences/group/permissions/delete/{id}', 'GroupPermission', 'delete', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 07:36:28'),
        //('extraweb/prefferences/group/permissions/edit/{id}', 'extraweb/prefferences/group/permissions/edit/{id}', 'GroupPermission', 'edit', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 10:24:01'),
        //('extraweb/prefferences/group/permissions/get_list', 'extraweb/prefferences/group/permissions/get_list', 'GroupPermission', 'get_list', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 07:36:28'),
        //('extraweb/prefferences/group/permissions/insert', 'extraweb/prefferences/group/permissions/insert', 'GroupPermission', 'insert', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 07:36:28'),
        //('extraweb/prefferences/group/permissions/remove/{id}', 'extraweb/prefferences/group/permissions/remove/{id}', 'GroupPermission', 'remove', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 07:36:28'),
        //('extraweb/prefferences/group/permissions/update/{id}', 'extraweb/prefferences/group/permissions/update/{id}', 'GroupPermission', 'update', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 07:36:28'),
        //('extraweb/prefferences/group/permissions/view', 'extraweb/prefferences/group/permissions/view', 'GroupPermission', 'view', '-', 0, 0, 1, 2, '2022-07-19 07:36:28', 2, '2022-07-19 07:36:28'),
        //
        //('extraweb/prefferences/user/permissions/create', 'extraweb/prefferences/user/permissions/create', 'UserPermissions', 'create', '-', 0, 0, 1, 3, '2022-09-16 11:14:17', 3, '2022-09-16 11:14:17'),
        //('extraweb/prefferences/user/permissions/delete/{id}', 'extraweb/prefferences/user/permissions/delete/{id}', 'UserPermissions', 'delete', '-', 0, 0, 1, 3, '2022-09-16 11:14:17', 3, '2022-09-16 11:14:17'),
        //('extraweb/prefferences/user/permissions/edit/{id}', 'extraweb/prefferences/user/permissions/edit/{id}', 'UserPermissions', 'edit', '-', 0, 0, 1, 3, '2022-09-16 11:14:17', 3, '2022-09-16 11:14:17'),
        //('extraweb/prefferences/user/permissions/get_list', 'extraweb/prefferences/user/permissions/get_list', 'UserPermissions', 'get_list', '-', 0, 0, 1, 3, '2022-09-16 11:14:17', 3, '2022-09-16 11:14:17'),
        //('extraweb/prefferences/user/permissions/insert', 'extraweb/prefferences/user/permissions/insert', 'UserPermissions', 'insert', '-', 0, 0, 1, 3, '2022-09-16 11:14:17', 3, '2022-09-16 11:14:17'),
        //('extraweb/prefferences/user/permissions/update/{id}', 'extraweb/prefferences/user/permissions/update/{id}', 'UserPermissions', 'update', '-', 0, 0, 1, 3, '2022-09-16 11:14:17', 3, '2022-09-16 11:14:17'),
        //('extraweb/prefferences/user/permissions/view', 'extraweb/prefferences/user/permissions/view', 'UserPermissions', 'view', '-', 0, 0, 1, 3, '2022-09-16 11:14:17', 3, '2022-09-16 11:14:17'),
        //
        //('extraweb/project/type/create', 'extraweb/project/type/create', 'Type', 'create', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //('extraweb/project/type/delete/{id}', 'extraweb/project/type/delete/{id}', 'Type', 'delete', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //('extraweb/project/type/edit/{id}', 'extraweb/project/type/edit/{id}', 'Type', 'edit', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //('extraweb/project/type/get_list', 'extraweb/project/type/get_list', 'Type', 'get_list', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //('extraweb/project/type/insert', 'extraweb/project/type/insert', 'Type', 'insert', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //('extraweb/project/type/remove/{id}', 'extraweb/project/type/remove/{id}', 'Type', 'remove', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //('extraweb/project/type/update/{id}', 'extraweb/project/type/update/{id}', 'Type', 'update', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //('extraweb/project/type/view', 'extraweb/project/type/view', 'Type', 'view', '-', 1, 0, 1, 2, '2022-07-19 16:25:50', 2, '2022-07-19 16:25:50'),
        //
        //('extraweb/project/team/create', 'extraweb/project/team/create', 'Team', 'create', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //('extraweb/project/team/delete/{id}', 'extraweb/project/team/delete/{id}', 'Team', 'delete', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //('extraweb/project/team/edit/{id}', 'extraweb/project/team/edit/{id}', 'Team', 'edit', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //('extraweb/project/team/get_list', 'extraweb/project/team/get_list', 'Team', 'get_list', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //('extraweb/project/team/insert', 'extraweb/project/team/insert', 'Team', 'insert', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //('extraweb/project/team/remove/{id}', 'extraweb/project/team/remove/{id}', 'Team', 'remove', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //('extraweb/project/team/update/{id}', 'extraweb/project/team/update/{id}', 'Team', 'update', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //('extraweb/project/team/view', 'extraweb/project/team/view', 'Team', 'view', '-', 1, 0, 1, 2, '2022-07-19 16:27:02', 2, '2022-07-19 16:27:02'),
        //
        //('extraweb/project/requirement/create', 'extraweb/project/requirement/create', 'Requirement', 'create', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //('extraweb/project/requirement/delete/{id}', 'extraweb/project/requirement/delete/{id}', 'Requirement', 'delete', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //('extraweb/project/requirement/edit/{id}', 'extraweb/project/requirement/edit/{id}', 'Requirement', 'edit', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //('extraweb/project/requirement/get_list', 'extraweb/project/requirement/get_list', 'Requirement', 'get_list', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //('extraweb/project/requirement/insert', 'extraweb/project/requirement/insert', 'Requirement', 'insert', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //('extraweb/project/requirement/remove/{id}', 'extraweb/project/requirement/remove/{id}', 'Requirement', 'remove', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //('extraweb/project/requirement/update/{id}', 'extraweb/project/requirement/update/{id}', 'Requirement', 'update', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //('extraweb/project/requirement/view', 'extraweb/project/requirement/view', 'Requirement', 'view', '-', 1, 0, 1, 2, '2022-07-19 16:28:12', 2, '2022-07-19 16:28:12'),
        //
        //('extraweb/project/team/user/create/{team_id}', 'extraweb/project/team/user/create/{team_id}', 'User', 'create', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 09:04:11'),
        //('extraweb/project/team/user/delete/{id}', 'extraweb/project/team/user/delete/{id}', 'User', 'delete', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 08:37:39'),
        //('extraweb/project/team/user/edit/{id}', 'extraweb/project/team/user/edit/{id}', 'User', 'edit', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 08:37:39'),
        //('extraweb/project/team/user/get_list', 'extraweb/project/team/user/get_list', 'User', 'get_list', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 08:37:39'),
        //('extraweb/project/team/user/insert/{team_id}', 'extraweb/project/team/user/insert/{team_id}', 'User', 'insert', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 09:05:45'),
        //('extraweb/project/team/user/remove/{id}', 'extraweb/project/team/user/remove/{id}', 'User', 'remove', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 08:37:39'),
        //('extraweb/project/team/user/update/{id}', 'extraweb/project/team/user/update/{id}', 'User', 'update', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 08:37:39'),
        //('extraweb/project/team/user/view/{team_id}', 'extraweb/project/team/user/view/{team_id}', 'User', 'view', '', 1, 0, 1, 2, '2022-07-20 08:37:39', 2, '2022-07-20 08:38:21'),
        //
        //('extraweb/project/documents/create', 'extraweb/project/documents/create', 'Document', 'create', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:37:31'),
        //('extraweb/project/documents/delete/{id}', 'extraweb/project/documents/delete/{id}', 'Document', 'delete', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:38:03'),
        //('extraweb/project/documents/edit/{id}', 'extraweb/project/documents/edit/{id}', 'Document', 'edit', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:38:16'),
        //('extraweb/project/documents/get_list', 'extraweb/project/documents/get_list', 'Document', 'get_list', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:38:29'),
        //('extraweb/project/documents/insert', 'extraweb/project/documents/insert', 'Document', 'insert', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:38:51'),
        //('extraweb/project/documents/remove/{id}', 'extraweb/project/documents/remove/{id}', 'Document', 'remove', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:39:03'),
        //('extraweb/project/documents/update/{id}', 'extraweb/project/documents/update/{id}', 'Document', 'update', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:39:16'),
        //('extraweb/project/documents/view', 'extraweb/project/documents/view', 'Document', 'view', '-', 1, 0, 1, 2, '2022-07-25 11:36:38', 2, '2022-07-25 11:39:27'),
        //
        //('extraweb/project/create', 'extraweb/project/create', 'Project_main', 'create', '-', 01, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:36:48'),
        //('extraweb/project/delete/{id}', 'extraweb/project/delete/{id}', 'Project_main', 'delete', '-', 1, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:37:00'),
        //('extraweb/project/edit/{id}', 'extraweb/project/edit/{id}', 'Project_main', 'edit', '-', 1, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:37:12'),
        //('extraweb/project/get_list', 'extraweb/project/get_list', 'Project_main', 'get_list', '-', 1, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:37:43'),
        //('extraweb/project/insert', 'extraweb/project/insert', 'Project_main', 'insert', '-', 1, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:37:23'),
        //('extraweb/project/remove/{id}', 'extraweb/project/remove/{id}', 'Project_main', 'remove', '-', 1, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:37:54'),
        //('extraweb/project/update/{id}', 'extraweb/project/update/{id}', 'Project_main', 'update', '-', 1, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:38:22'),
        //('extraweb/project/view', 'extraweb/project/view', 'Project_main', 'view', '-', 1, 0, 1, 2, '2022-07-25 13:32:59', 2, '2022-07-25 13:38:04'),
        //('extraweb/project/detail/{id}', 'extraweb/project/detail/{id}', 'Project_main', 'detail', '-', 1, 0, 1, 2, '2022-07-26 11:26:05', 2, '2022-07-26 11:26:05'),
        //('extraweb/project/timeline/{id}', 'extraweb/project/timeline/{id}', 'Project_main', 'timeline', '-', 1, 0, 1, 2, '2022-07-26 14:41:39', 2, '2022-07-26 14:41:39'),
        //('extraweb/project/team_user/{id}', 'extraweb/project/team_user/{id}', 'Project_main', 'team_user', '-', 1, 0, 1, 2, '2022-07-28 08:05:16', 2, '2022-07-28 08:05:16'),
        //
        //('extraweb/messaging/compose', 'extraweb/messaging/compose', 'MailController', 'compose', '-', 1, 0, 1, 2, '2022-08-11 11:12:04', 2, '2022-08-11 11:12:04'),
        //('extraweb/messaging/inbox', 'extraweb/messaging/inbox', 'MailController', 'inbox', '-', 1, 0, 1, 2, '2022-08-11 11:12:04', 2, '2022-08-11 11:12:04'),
        //('extraweb/messaging/chat', 'extraweb/messaging/chat', 'MailController', 'chat', '-', 1, 0, 1, 2, '2022-08-11 11:14:21', 2, '2022-08-11 11:14:21'),
        //('extraweb/messaging/inbox/get_list', 'extraweb/messaging/inbox/get_list', 'MailController', 'get_list', '-', 1, 0, 1, 2, '2022-08-11 11:12:04', 2, '2022-08-11 11:12:04'),
        //('extraweb/messaging/sent', 'extraweb/messaging/sent', 'MailController', 'sent', '-', 1, 0, 1, 2, '2022-08-11 11:12:04', 2, '2022-08-11 11:12:04'),
        //('extraweb/messaging/draft', 'extraweb/messaging/draft', 'MailController', 'draft', '-', 1, 0, 1, 2, '2022-08-11 11:12:04', 2, '2022-08-11 11:12:04'),
        //('extraweb/messaging/junk', 'extraweb/messaging/junk', 'MailController', 'junk', '-', 1, 0, 1, 2, '2022-08-11 11:12:04', 2, '2022-08-11 11:12:04'),
        //('extraweb/messaging/trash', 'extraweb/messaging/trash', 'MailController', 'trash', '-', 1, 0, 1, 2, '2022-08-11 11:12:04', 2, '2022-08-11 11:12:04');
        //";
        //DB::statement($sql_insert_permission);
        //get all tbl_a_permissions
        $param_permissions = [
            'table_name' => 'tbl_a_permissions',
            'conditions' => [
                'where' => [
                    ['a.is_active', '=', 1]
                ]
            ],
            'limit' => 250,
            'offset' => 0,
            'order' => [
                ['a.id', 'asc']
            ],
        ];
        $permissions = $this->MY_Model->find($request, 'all', $param_permissions);
        if ($permissions['data']) {
            //insert tbl_b_group_permissions
            //$arr_group_permissions = [];
            //$arr_group = [1, 2, 3, 6, 7, 8, 9, 10, 11];
            //for ($i = 0; $i < count($arr_group); $i++) {
            //    foreach ($permissions['data'] AS $key => $val) {
            //        $arr_group_permissions[$arr_group[$i]][] = [
            //            'group_id' => $arr_group[$i],
            //            'permission_id' => $val->id,
            //            'module_id' => 3,
            //            'is_allowed' => 1,
            //            'is_active' => 1,
            //            'created_by' => 1,
            //            'created_date' => $this->Date->now(),
            //            'updated_by' => 1,
            //            'updated_date' => $this->Date->now()
            //        ];
            //    }
            //}
            //foreach ($arr_group_permissions AS $k => $v) {
            //    DB::table('tbl_b_group_permissions')->insert($v);
            //}
            //$param_isb_permissions = [
            //    'table_name' => 'tbl_a_permissions',
            //    'conditions' => [
            //        'where' => [
            //            ['a.is_active', '=', 1],
            //            ['a.is_basic', '=', 1]
            //        ]
            //    ],
            //    'limit' => 250,
            //    'offset' => 0,
            //    'order' => [
            //        ['a.id', 'asc']
            //    ],
            //];
            //$permission_isb1 = $this->MY_Model->find($request, 'all', $param_isb_permissions);
            //if ($permissions['data']) {
            //    $arr_group_permissions = [];
            //    $arr_groups3 = [6, 7, 8];
            //    for ($m = 0; $m < count($arr_groups3); $m++) {
            //        //insert group permission for group id 6 (isu-isb)
            //        foreach ($permissions['data'] AS $key => $value) {
            //            $is_allowed = 0;
            //            if ($value->is_basic == 1) {
            //                $is_allowed = 1;
            //            }
            //            $arr_group_permissions[$arr_groups3[$m]][] = [
            //                'group_id' => $arr_groups3[$m],
            //                'permission_id' => $value->id,
            //                'module_id' => 3,
            //                'is_allowed' => $is_allowed,
            //                'is_active' => 1,
            //                'created_by' => 1,
            //                'created_date' => $this->Date->now(),
            //                'updated_by' => 1,
            //                'updated_date' => $this->Date->now()
            //            ];
            //        }
            //    }
            //    foreach ($arr_group_permissions AS $k => $w) {
            //        DB::table('tbl_b_group_permissions')->insert($w);
            //    }
            //}
            //insert tbl_b_user_permissions
            $arr_user_permissions = [];
            $arr_users = [1, 2, 3, 4];
            for ($j = 0; $j < count($arr_users); $j++) {
                foreach ($permissions['data'] AS $key => $val) {
                    $arr_user_permissions[$arr_users[$j]][] = [
                        'user_id' => $arr_users[$j],
                        'permission_id' => $val->id,
                        'is_denied' => 0,
                        'is_active' => 1,
                        'created_by' => 1,
                        'created_date' => $this->Date->now(),
                        'updated_by' => 1,
                        'updated_date' => $this->Date->now()
                    ];
                }
            }
            foreach ($arr_user_permissions AS $k => $w) {
                DB::table('tbl_b_user_permissions')->insert($w);
            }
            if ($permissions['data']) {
                //insert user permission for group id 6 (isu-isb)
                $arr_users = [4, 5, 6];
                $arr_group_permissions = [];
                for ($k = 0; $k < count($arr_users); $k++) {
                    //insert group permission for group id 6 (isu-isb)
                    foreach ($permissions['data'] AS $key => $value) {
                        $is_denied = 1;
                        if ($value->is_basic == 1) {
                            $is_denied = 0;
                        }
                        $arr_group_permissions[$k][] = [
                            'user_id' => $arr_users[$k],
                            'permission_id' => $value->id,
                            'is_denied' => $is_denied,
                            'is_active' => 1,
                            'created_by' => 1,
                            'created_date' => $this->Date->now(),
                            'updated_by' => 1,
                            'updated_date' => $this->Date->now()
                        ];
                    }
                }
                foreach ($arr_group_permissions AS $l => $y) {
                    DB::table('tbl_b_user_permissions')->insert($y);
                }
            }
        }
        //insert menu
        $sql_insert_menus = "
            INSERT INTO `tbl_a_menus` (`id`, `name`, `path`, `content_path`, `icon`, `level`, `rank`, `is_badge`, `badge`, `badge_id`, `badge_value`, `parent_id`, `is_basic`, `is_open`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
            (1, 'Services', '', '', '', 1, 1, 0, '', '', '', 0, 1, 1, 1, 2, '2022-07-18 14:47:51', 2, '2022-07-18 16:05:45'),
            (2, 'Master', '', '', '', 1, 2, 0, '', '', '', 0, 0, 0, 1, 2, '2022-07-18 14:47:57', 2, '2022-07-18 14:47:57'),
            (3, 'Prefferences', '', '', '', 1, 3, 0, '', '', '', 0, 0, 0, 1, 2, '2022-07-18 14:48:05', 2, '2022-07-18 14:48:05'),
            (4, 'Reports', '', '', '', 1, 6, 0, '', '', '', 0, 1, 0, 1, 2, '2022-07-18 14:48:11', 2, '2022-08-10 15:01:07'),
            (5, 'Projects', '', '', '', 2, 1, 0, '', '', '', 1, 1, 0, 1, 2, '2022-07-18 14:55:42', 2, '2022-07-18 14:55:42'),
            (6, 'Code Assessments', '', '', '', 2, 2, 0, '', '', '', 1, 0, 0, 1, 2, '2022-07-18 15:09:54', 2, '2022-07-18 15:09:54'),
            (7, 'Bussiness Assessments', '', '', '', 2, 3, 0, '', '', '', 1, 0, 0, 1, 2, '2022-07-18 15:48:44', 2, '2022-07-18 15:48:44'),
            (8, 'Create', '/project/create', '/project/create', '', 3, 1, 0, '', '', '', 5, 1, 0, 1, 2, '2022-07-18 15:52:31', 2, '2022-07-25 13:29:14'),
            (9, 'View', '/project/view', '/project/view', '', 3, 2, 0, '', '', '', 5, 1, 0, 1, 2, '2022-07-18 15:52:34', 2, '2022-07-25 13:29:26'),
            (10, 'Options', '', '', '', 3, 3, 0, '', '', '', 5, 1, 0, 1, 2, '2022-07-18 15:52:50', 2, '2022-07-18 15:52:50'),
            (11, 'Types', '', '', '', 4, 1, 0, '', '', '', 10, 1, 0, 1, 2, '2022-07-18 15:53:00', 2, '2022-07-18 15:53:00'),
            (12, 'Teams', '', '', '', 4, 2, 0, '', '', '', 10, 1, 0, 1, 2, '2022-07-18 15:53:08', 2, '2022-07-18 15:53:08'),
            (13, 'Documents', '', '', '', 4, 3, 0, '', '', '', 10, 1, 0, 1, 2, '2022-07-18 15:53:16', 2, '2022-07-25 11:31:38'),
            (14, 'Languages', '', '', '', 4, 4, 0, '', '', '', 10, 1, 0, 1, 2, '2022-07-18 15:53:23', 2, '2022-07-25 11:32:59'),
            (15, 'Create', '/project/type/create', '/project/type/create', '', 5, 1, 0, '', '', '', 11, 1, 0, 1, 2, '2022-07-18 15:53:38', 2, '2022-07-19 16:32:36'),
            (16, 'View', '/project/type/view', '/project/type/view', '', 5, 2, 0, '', '', '', 11, 1, 0, 1, 2, '2022-07-18 15:53:43', 2, '2022-07-19 16:32:27'),
            (17, 'Create', '/project/team/create', '/project/team/create', '', 5, 1, 0, '', '', '', 12, 1, 0, 1, 2, '2022-07-18 15:53:58', 2, '2022-07-19 16:32:46'),
            (18, 'View', '/project/team/view', '/project/team/view', '', 5, 2, 0, '', '', '', 12, 1, 0, 1, 2, '2022-07-18 15:54:01', 2, '2022-07-19 16:32:55'),
            (19, 'Create', '/project/documents/create', '/project/documents/create', '', 5, 1, 0, '', '', '', 13, 1, 0, 1, 2, '2022-07-18 15:54:04', 2, '2022-07-25 11:43:13'),
            (20, 'View', '/project/documents/view', '/project/documents/view', '', 5, 2, 0, '', '', '', 13, 1, 0, 1, 2, '2022-07-18 15:54:08', 2, '2022-07-25 11:43:05'),
            (21, 'Create', '/project/option/memo/create', '/project/option/memo/create', '', 5, 1, 0, '', '', '', 14, 1, 0, 1, 2, '2022-07-18 15:54:11', 2, '2022-07-19 19:01:02'),
            (22, 'View', '/project/option/memo/view', '/project/option/memo/view', '', 5, 2, 0, '', '', '', 14, 1, 0, 1, 2, '2022-07-18 15:54:15', 2, '2022-07-19 19:00:48'),
            (23, 'SAT Scans', '', '', '', 3, 1, 0, '', '', '', 6, 0, 0, 1, 2, '2022-07-18 15:55:49', 2, '2022-07-18 15:55:49'),
            (24, 'Penetration Test', '', '', '', 3, 2, 0, '', '', '', 6, 0, 0, 1, 2, '2022-07-18 15:56:01', 2, '2022-07-18 15:56:01'),
            (25, 'Options', '', '', '', 3, 3, 0, '', '', '', 6, 0, 0, 1, 2, '2022-07-18 15:56:10', 2, '2022-07-18 15:56:33'),
            (26, 'Create', '', '', '', 4, 1, 0, '', '', '', 23, 0, 0, 1, 2, '2022-07-18 15:56:44', 2, '2022-07-18 15:56:44'),
            (27, 'View', '', '', '', 4, 2, 0, '', '', '', 23, 0, 0, 1, 2, '2022-07-18 15:56:47', 2, '2022-07-18 15:56:47'),
            (28, 'Create', '', '', '', 4, 1, 0, '', '', '', 24, 0, 0, 1, 2, '2022-07-18 15:56:50', 2, '2022-07-18 15:56:50'),
            (29, 'View', '', '', '', 4, 2, 0, '', '', '', 24, 0, 0, 1, 2, '2022-07-18 15:56:55', 2, '2022-07-18 15:56:55'),
            (30, 'Application List', '', '', '', 4, 1, 0, '', '', '', 25, 0, 0, 1, 2, '2022-07-18 15:57:02', 2, '2022-07-18 15:57:35'),
            (31, 'Vendor List', '', '', '', 4, 2, 0, '', '', '', 25, 0, 0, 1, 2, '2022-07-18 15:57:17', 2, '2022-07-18 15:57:44'),
            (32, 'Memo', '', '', '', 4, 3, 0, '', '', '', 25, 0, 0, 1, 2, '2022-07-18 15:57:25', 2, '2022-07-18 15:57:25'),
            (33, 'View', '', '', '', 5, 1, 0, '', '', '', 30, 0, 0, 1, 2, '2022-07-18 15:58:02', 2, '2022-07-18 15:58:02'),
            (34, 'View', '', '', '', 5, 1, 0, '', '', '', 31, 0, 0, 1, 2, '2022-07-18 15:58:09', 2, '2022-07-18 15:58:09'),
            (35, 'Create', '', '', '', 5, 1, 0, '', '', '', 32, 0, 0, 1, 2, '2022-07-18 15:58:12', 2, '2022-07-18 15:58:12'),
            (36, 'View', '', '', '', 5, 2, 0, '', '', '', 32, 0, 0, 1, 2, '2022-07-18 15:58:16', 2, '2022-07-18 15:58:16'),
            (37, 'Documents', '', '', '', 2, 1, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:58:55', 2, '2022-07-18 15:58:55'),
            (38, 'Permissions', '', '', '', 2, 2, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:59:02', 2, '2022-07-18 15:59:02'),
            (39, 'Groups', '', '', '', 2, 3, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:59:08', 2, '2022-07-18 15:59:08'),
            (40, 'Modules', '', '', '', 2, 4, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:59:14', 2, '2022-07-18 15:59:14'),
            (41, 'Menu', '', '', '', 2, 5, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:59:19', 2, '2022-07-18 15:59:19'),
            (42, 'Users', '', '', '', 2, 6, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:59:25', 2, '2022-07-18 15:59:25'),
            (43, 'Controllers', '', '', '', 2, 7, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:59:31', 2, '2022-07-18 16:00:01'),
            (44, 'Methods', '', '', '', 2, 8, 0, '', '', '', 2, 0, 0, 1, 2, '2022-07-18 15:59:40', 2, '2022-07-18 15:59:54'),
            (45, 'PDF', '', '', '', 3, 1, 0, '', '', '', 37, 1, 0, 1, 2, '2022-07-18 16:00:36', 2, '2022-07-18 16:00:36'),
            (46, 'Word', '', '', '', 3, 2, 0, '', '', '', 37, 1, 0, 1, 2, '2022-07-18 16:00:41', 2, '2022-07-18 16:00:41'),
            (47, 'Excel', '', '', '', 3, 3, 0, '', '', '', 37, 1, 0, 1, 2, '2022-07-18 16:00:49', 2, '2022-07-18 16:00:49'),
            (48, 'Email', '', '', '', 3, 4, 0, '', '', '', 37, 1, 0, 1, 2, '2022-07-18 16:00:55', 2, '2022-07-18 16:00:55'),
            (49, 'Create', '/master/permission/create', '/master/permission/create', '', 3, 1, 0, '', '', '', 38, 0, 0, 1, 2, '2022-07-18 16:01:02', 2, '2022-07-18 16:10:20'),
            (50, 'View', '/master/permission/view', '/master/permission/view', '', 3, 2, 0, '', '', '', 38, 0, 0, 1, 2, '2022-07-18 16:01:08', 2, '2022-07-18 16:10:14'),
            (51, 'Create', '/master/group/create', '/master/group/create', '', 3, 1, 0, '', '', '', 39, 0, 0, 1, 2, '2022-07-18 16:01:12', 2, '2022-07-18 16:10:33'),
            (52, 'View', '/master/group/view', '/master/group/view', '', 3, 2, 0, '', '', '', 39, 0, 0, 1, 2, '2022-07-18 16:01:15', 2, '2022-07-18 16:10:42'),
            (53, 'Create', '/master/module/create', '/master/module/create', '', 3, 1, 0, '', '', '', 40, 0, 0, 1, 2, '2022-07-18 16:01:19', 2, '2022-07-18 16:11:00'),
            (54, 'View', '/master/module/view', '/master/module/view', '', 3, 2, 0, '', '', '', 40, 0, 0, 1, 2, '2022-07-18 16:01:23', 2, '2022-07-18 16:11:07'),
            (55, 'Create', '/master/menu/create', '/master/menu/create', '', 3, 1, 0, '', '', '', 41, 0, 0, 1, 2, '2022-07-18 16:01:26', 2, '2022-07-18 16:11:43'),
            (56, 'View', '/master/menu/view', '/master/menu/view', '', 3, 2, 0, '', '', '', 41, 0, 0, 1, 2, '2022-07-18 16:01:29', 2, '2022-07-18 16:11:34'),
            (57, 'Create', '/master/user/create', '/master/user/create', '', 3, 1, 0, '', '', '', 42, 0, 0, 1, 2, '2022-07-18 16:01:33', 2, '2022-07-18 17:09:10'),
            (58, 'View', '/master/user/view', '/master/user/view', '', 3, 2, 0, '', '', '', 42, 0, 0, 1, 2, '2022-07-18 16:01:36', 2, '2022-07-18 17:09:01'),
            (59, 'Create', '/master/controller/create', '/master/controller/create', '', 3, 1, 0, '', '', '', 43, 0, 0, 1, 2, '2022-07-18 16:01:39', 2, '2022-07-18 16:12:06'),
            (60, 'View', '/master/controller/view', '/master/controller/view', '', 3, 2, 0, '', '', '', 43, 0, 0, 1, 2, '2022-07-18 16:01:42', 2, '2022-07-18 16:12:14'),
            (61, 'Create', '/master/method/create', '/master/method/create', '', 3, 1, 0, '', '', '', 44, 0, 0, 1, 2, '2022-07-18 16:01:45', 2, '2022-07-18 16:12:32'),
            (62, 'View', '/master/method/view', '/master/method/view', '', 3, 2, 0, '', '', '', 44, 0, 0, 1, 2, '2022-07-18 16:01:48', 2, '2022-07-18 16:12:51'),
            (63, 'User Groups', '', '', '', 2, 1, 0, '', '', '', 3, 0, 0, 1, 2, '2022-07-18 16:04:43', 2, '2022-07-18 16:04:43'),
            (64, 'Group Permissions', '', '', '', 2, 2, 0, '', '', '', 3, 0, 0, 1, 2, '2022-07-18 16:04:52', 2, '2022-07-18 16:04:52'),
            (66, 'Create', '/prefferences/user/groups/create', '/prefferences/user/groups/create', '', 3, 1, 0, '', '', '', 63, 0, 0, 1, 2, '2022-07-18 16:05:12', 2, '2022-07-18 16:40:03'),
            (67, 'View', '/prefferences/user/groups/view', '/prefferences/user/groups/view', '', 3, 2, 0, '', '', '', 63, 0, 0, 1, 2, '2022-07-18 16:05:15', 2, '2022-07-18 16:39:47'),
            (68, 'Create', '/prefferences/group/permissions/create', '/prefferences/group/permissions/create', '', 3, 1, 0, '', '', '', 64, 0, 0, 1, 2, '2022-07-18 16:05:20', 2, '2022-07-19 07:39:34'),
            (69, 'View', '/prefferences/group/permissions/view', '/prefferences/group/permissions/view', '', 3, 2, 0, '', '', '', 64, 0, 0, 1, 2, '2022-07-18 16:05:23', 2, '2022-07-19 07:39:19'),
            (72, 'Application Process', '', '', '', 3, 1, 0, '', '', '', 7, 0, 0, 1, 2, '2022-07-18 16:06:15', 2, '2022-07-18 16:06:15'),
            (73, '3rd Party Assessments', '', '', '', 3, 2, 0, '', '', '', 7, 0, 0, 1, 2, '2022-07-18 16:06:27', 2, '2022-07-18 16:07:15'),
            (74, 'Data Classifications', '', '', '', 3, 3, 0, '', '', '', 7, 0, 0, 1, 2, '2022-07-18 16:06:38', 2, '2022-07-18 16:06:38'),
            (75, 'User Access Controlls', '', '', '', 3, 4, 0, '', '', '', 7, 0, 0, 1, 2, '2022-07-18 16:06:50', 2, '2022-07-18 16:06:50'),
            (76, 'Options', '', '', '', 3, 5, 0, '', '', '', 7, 0, 0, 1, 2, '2022-07-18 16:06:57', 2, '2022-07-18 16:06:57'),
            (77, 'Application List', '', '', '', 4, 1, 0, '', '', '', 76, 0, 0, 1, 2, '2022-07-18 16:07:42', 2, '2022-07-18 16:07:42'),
            (78, 'Vendor List', '', '', '', 4, 2, 0, '', '', '', 76, 0, 0, 1, 2, '2022-07-18 16:07:47', 2, '2022-07-18 16:07:47'),
            (79, 'Memo', '', '', '', 4, 3, 0, '', '', '', 76, 0, 0, 1, 2, '2022-07-18 16:07:50', 2, '2022-07-18 16:07:50'),
            (80, 'Create', '', '', '', 5, 1, 0, '', '', '', 77, 0, 0, 1, 2, '2022-07-18 16:08:18', 2, '2022-07-18 16:08:18'),
            (81, 'View', '', '', '', 5, 2, 0, '', '', '', 77, 0, 0, 1, 2, '2022-07-18 16:08:22', 2, '2022-07-18 16:08:22'),
            (82, 'Create', '', '', '', 5, 1, 0, '', '', '', 78, 0, 0, 1, 2, '2022-07-18 16:08:25', 2, '2022-07-18 16:08:25'),
            (83, 'View', '', '', '', 5, 2, 0, '', '', '', 78, 0, 0, 1, 2, '2022-07-18 16:08:29', 2, '2022-07-18 16:08:29'),
            (84, 'Create', '', '', '', 5, 1, 0, '', '', '', 79, 0, 0, 1, 2, '2022-07-18 16:08:33', 2, '2022-07-18 16:08:33'),
            (85, 'View', '', '', '', 5, 2, 0, '', '', '', 79, 0, 0, 1, 2, '2022-07-18 16:08:36', 2, '2022-07-18 16:08:36'),
            (86, 'Create', '', '', '', 4, 1, 0, '', '', '', 72, 0, 0, 1, 2, '2022-07-18 17:28:32', 2, '2022-07-18 17:28:32'),
            (87, 'View', '', '', '', 4, 2, 0, '', '', '', 72, 0, 0, 1, 2, '2022-07-18 17:28:39', 2, '2022-07-18 17:28:39'),
            (88, 'Create', '', '', '', 4, 1, 0, '', '', '', 73, 0, 0, 1, 2, '2022-07-18 17:28:43', 2, '2022-07-18 17:28:43'),
            (89, 'View', '', '', '', 4, 2, 0, '', '', '', 73, 0, 0, 1, 2, '2022-07-18 17:28:48', 2, '2022-07-18 17:28:48'),
            (90, 'Create', '', '', '', 4, 1, 0, '', '', '', 74, 0, 0, 1, 2, '2022-07-18 17:28:51', 2, '2022-07-18 17:28:51'),
            (91, 'View', '', '', '', 4, 2, 0, '', '', '', 74, 0, 0, 1, 2, '2022-07-18 17:28:56', 2, '2022-07-18 17:28:56'),
            (92, 'Create', '', '', '', 4, 1, 0, '', '', '', 75, 0, 0, 1, 2, '2022-07-18 17:29:00', 2, '2022-07-18 17:29:00'),
            (93, 'View', '', '', '', 4, 2, 0, '', '', '', 75, 0, 0, 1, 2, '2022-07-18 17:29:05', 2, '2022-07-18 17:29:05'),
            (95, 'Create', '', '', '', 6, 1, 0, '', '', '', 19, 0, 0, 1, 2, '2022-07-25 11:29:00', 2, '2022-07-25 11:29:00'),
            (96, 'View', '', '', '', 6, 2, 0, '', '', '', 19, 0, 0, 1, 2, '2022-07-25 11:29:04', 2, '2022-07-25 11:29:04'),
            (97, 'Create', '', '', '', 6, 1, 0, '', '', '', 20, 0, 0, 1, 2, '2022-07-25 11:29:08', 2, '2022-07-25 11:29:08'),
            (98, 'View', '', '', '', 6, 2, 0, '', '', '', 20, 0, 0, 1, 2, '2022-07-25 11:29:13', 2, '2022-07-25 11:29:13'),
            (99, 'Create', '', '', '', 6, 1, 0, '', '', '', 94, 0, 0, 1, 2, '2022-07-25 11:29:16', 2, '2022-07-25 11:29:16'),
            (100, 'View', '', '', '', 6, 2, 0, '', '', '', 94, 0, 0, 1, 2, '2022-07-25 11:29:21', 2, '2022-07-25 11:29:21'),
            (101, 'Create', '', '', '', 6, 3, 0, '', '', '', 19, 0, 0, 1, 2, '2022-07-25 11:29:42', 2, '2022-07-25 11:29:42'),
            (102, 'View', '', '', '', 6, 4, 0, '', '', '', 19, 0, 0, 1, 2, '2022-07-25 11:29:48', 2, '2022-07-25 11:29:48'),
            (103, 'Photos', '', '', '', 4, 5, 0, '', '', '', 10, 0, 0, 1, 2, '2022-07-25 11:33:16', 2, '2022-07-25 11:33:16'),
            (104, 'Create', '', '', '', 5, 1, 0, '', '', '', 103, 0, 0, 1, 2, '2022-07-25 11:33:29', 2, '2022-07-25 11:33:29'),
            (105, 'View', '', '', '', 5, 2, 0, '', '', '', 103, 0, 0, 1, 2, '2022-07-25 11:33:34', 2, '2022-07-25 11:33:34'),
            (106, 'Messaging', '', '', '', 1, 5, 0, '', '', '', 0, 0, 0, 1, 2, '2022-08-10 15:00:53', 2, '2022-08-10 15:01:07'),
            (107, 'Compose', '/messaging/compose', '/messaging/compose', '', 2, 1, 0, '', '', '', 106, 0, 0, 1, 2, '2022-08-10 15:03:26', 2, '2022-08-10 15:05:19'),
            (108, 'Inbox', '/messaging/inbox', '/messaging/inbox', '', 2, 2, 0, '', '', '', 106, 0, 0, 1, 2, '2022-08-10 15:03:43', 2, '2022-08-10 15:10:47'),
            (109, 'Chat', '/messaging/chat', '/messaging/chat', '', 2, 3, 0, '', '', '', 106, 0, 0, 1, 3, '2022-08-22 20:26:17', 3, '2022-08-22 20:26:49'),
            (126, 'User Permissions', '', '', '', 2, 4, 0, '', '', '', 3, 0, 0, 1, 3, '2022-09-16 10:39:22', 3, '2022-09-16 10:39:22'),
            (127, 'Create', '/prefferences/user/permissions/create', '/prefferences/user/permissions/create', '', 3, 1, 0, '', '', '', 126, 0, 0, 1, 3, '2022-09-16 10:55:21', 3, '2022-09-16 11:04:23'),
            (128, 'View', '/prefferences/user/permissions/view', '/prefferences/user/permissions/view', '', 3, 2, 0, '', '', '', 126, 0, 0, 1, 3, '2022-09-16 10:55:29', 3, '2022-09-16 11:04:37');";
        DB::statement($sql_insert_menus);

        //get all tbl_a_menus
        $param_menus = [
            'table_name' => 'tbl_a_menus',
            'conditions' => [
                'where' => [
                    ['a.is_active', '=', 1]
                ]
            ],
            'limit' => 250,
            'offset' => 0,
            'order' => [
                ['a.id', 'asc']
            ],
        ];
        $menus = $this->MY_Model->find($request, 'all', $param_menus);
        $arr_menu_permissions = [];
        for ($k = 0; $k < count($arr_group); $k++) {
            foreach ($menus['data'] AS $key => $val) {
                $arr_menu_permissions[$arr_group[$k]][] = [
                    'menu_id' => $val->id,
                    'group_id' => $arr_group[$k],
                    'module_id' => 3,
                    'is_allowed' => 1,
                    'is_active' => 1,
                    'created_by' => 1,
                    'created_date' => $this->Date->now(),
                    'updated_by' => 1,
                    'updated_date' => $this->Date->now()
                ];
            }
        }
        foreach ($arr_menu_permissions AS $k => $y) {
            DB::table('tbl_b_menu_permission')->insert($y);
        }

        $param_menus = [
            'table_name' => 'tbl_a_menus',
            'conditions' => [
                'where' => [
                    ['a.is_active', '=', 1],
                    ['a.is_basic', '=', 1]
                ]
            ],
            'limit' => 250,
            'offset' => 0,
            'order' => [
                ['a.id', 'asc']
            ],
        ];
        $menus2 = $this->MY_Model->find($request, 'all', $param_menus);
        $arr_group2 = [6, 7, 8];
        for ($l = 0; $l < count($arr_group2); $l++) {
            $arr_menu_permissions2 = [];
            foreach ($menus2['data'] AS $key => $val) {
                $arr_menu_permissions2[$arr_group2[$l]][] = [
                    'menu_id' => $val->id,
                    'group_id' => $arr_group2[$l],
                    'module_id' => 3,
                    'is_allowed' => 1,
                    'is_active' => 1,
                    'created_by' => 1,
                    'created_date' => $this->Date->now(),
                    'updated_by' => 1,
                    'updated_date' => $this->Date->now()
                ];
            }
            foreach ($arr_menu_permissions2 AS $k => $y) {
                DB::table('tbl_b_menu_permission')->insert($y);
            }
        }
        return ['ok'];
    }

}
