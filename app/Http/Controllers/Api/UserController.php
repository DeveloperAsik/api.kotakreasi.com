<?php

namespace App\Http\Controllers\Api;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Description of UserController
 *
 * @author 64146
 */
class UserController extends Controller {
    //put your code here
    
    
    public function __construct(Request $request) {
        parent::__construct($request);
        $this->AppEntity = new AppEntity();
        $this->Date = new Date();
        $this->General = new General();
    }

    public function view(Request $request) {
        $title_for_layout = config('app.default_variables.title_for_layout');
        $_breadcrumbs = [
            [
                'id' => 1,
                'title' => 'Dashboard',
                'icon' => '',
                'arrow' => true,
                'path' => config('app.base_extraweb_uri')
            ],
            [
                'id' => 2,
                'title' => 'Controller list',
                'icon' => '',
                'arrow' => true,
                'path' => config('app.base_extraweb_uri') . '/user/view'
            ],
            [
                'id' => 3,
                'title' => 'Group create new',
                'icon' => '',
                'arrow' => false,
                'path' => '#'
            ]
        ];
        $_config = [
            'title_for_header' => 'Create new <b>Controller</b> master data management page',
            'create_page' => [
                'title' => 'click to open controller list page',
                'icon' => '<i class="fa-solid fa-list"></i>',
                'link' => config('app.base_extraweb_uri') . '/master/controller/view'
            ]
        ];
        $group_exist = $this->get_group_exist($request);
        $loadCss = [
            "templates/adminlte/plugins/select2/css/select2.min.css",
            "templates/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"
        ];
        $this->load_css($loadCss);
        $loadJS = [
            "templates/adminlte/plugins/select2/js/select2.full.min.js",
        ];
        $this->load_js($loadJS);
        return view('Public_html.Layouts.Adminlte.dashboard', compact('title_for_layout', '_breadcrumbs', '_config', 'group_exist'));
    }
}
