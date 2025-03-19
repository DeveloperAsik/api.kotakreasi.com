<?php

namespace App\Helpers\Oreno;

use Illuminate\Http\Request;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Converter
 *
 * @author User
 */
class Converter {

    //put your code here

    public function array_to_object($data = []) {
        if (!is_array($data)) {
            return 'this is not array';
        }
        return json_decode(json_encode($data), FALSE);
    }

    public function object_to_array($data = []) {
        if (!$data || $data == '') {
            return array();
        }
        return json_decode(json_encode($data), true);
    }

    public function base64url_encode($str) {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }

    public function base64url_decode($str) {
        return base64_decode($str);
    }

    public function base64(Request $request, $string = null, $type = 'encode', $options = array()) {
        if ($string != null) {
            $uuid = $request->session()->get('_uuid');
            $response = [];
            switch ($type) {
                case 'encode':
                    $string = $string . '|' . $uuid;
                    if ($options && isset($options['rep']) && !empty($options['rep'])) {
                        $total = $options['rep'];
                        for ($i = 0; $i < $total; $i++) {
                            if ($i == 0) {
                                $response[$i] = base64_encode(($string));
                            } else {
                                $old_id = $i - 1;
                                $response[] = base64_encode(($response[$old_id]));
                            }
                        }
                        $response = $response[$total - 1];
                    } else {
                        $response = base64_encode(($string));
                    }
                    break;
                default:
                    if ($options && isset($options['rep']) && !empty($options['rep'])) {
                        $total = $options['rep'];
                        for ($i = 0; $i < $total; $i++) {
                            if ($i == 0) {
                                $response[$i] = base64_decode(($string));
                            } else {
                                $old_id = $i - 1;
                                $response[] = base64_decode(($response[$old_id]));
                            }
                        }
                        $string2 = explode('|',$response[$total - 1]);
                        $response = trim($string2[0]);
                    } else {
                        $response = base64_decode(($string));
                    }
                    break;
            }
            return $response;
        }
    }
}
