<?php

namespace App\Helpers\Oreno;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Description of Cookies
 *
 * @author User
 */
class Cookies {

    //put your code here

    public function _create($params = []) {
        if ($params) {
            $minutes = time() + (86400 * 30);
            if (isset($params['minutes']) && !empty($params['minutes'])) {
                $minutes = $params['minutes'];
            }
            $path = '/';
            if ($params['path'] && isset($params['path']) && !empty($params['path'])) {
                $path = $params['path'];
            }
            setcookie($params['name'], $params['value'], $minutes, $path); // 86400 = 1 day
            return true;
        }
    }

    public function _update($params = []) {
        $minutes = 60;
        $response = new Response('Set Cookies');
        $response->withCookies(cookie($params['name'], $params['value'], $minutes, $params['path']));
        return $response;
    }

    public function _get($request, $params = []) {
        return $request->cookie($params['name']);
    }

    public function _delete($params = []) {
        setcookie($params['name'], "", time() - 3600, "/");
    }
}

//
////Create: 
//cookie()->queue(cookie($name, $value, $minutes));
//// forever
//cookie()->queue(cookie()->forever($name, $value));
////get
//request()->cookie($name);
////forget
//cookie()->queue(cookie()->forget($name));
