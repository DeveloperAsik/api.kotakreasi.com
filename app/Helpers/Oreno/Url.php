<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Helpers\Oreno;

use Illuminate\Http\Request;

/**
 * Description of Url
 *
 * @author root
 */
class Url {

    //put your code here

    public function get_path() {
        return request()->path();
    }

    public function get_current() {
        return url()->current();
    }

    public function get_current_full() {
        return url()->full();
    }

    public function get_previous_full() {
        return url()->previous();
    }

    public function get_previous() {
        return url()->previousPath();
    }
}
