<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Helpers\Oreno;

use Illuminate\Http\Request;
use App\Helpers\Oreno\Sanitize;

/**
 * Description of Global
 *
 * @author User
 */
class General {

    //put your code here
    public function init() {
        return ([
            '_uuid' => $this->__get_uuid(),
            '_app_version' => env('APP_VERSION'),
            '_app_platform' => env('APP_PLATFORM'),
            '_salt' => $this->getRandomChar(32)
        ]);
    }

    protected function __set_uuid() {
        $this->Sanitize = new Sanitize();
        $uuid5 = $this->Sanitize->url_clean(Uuid::uuid5(Uuid::NAMESPACE_DNS, 'widget/1234567890'));
        return $uuid5;
    }

    protected function __get_uuid(Request $request) {
        $uuid_session = $request->session()->get('_uuid');
        if (isset($uuid_session) && !empty($uuid_session) && $uuid_session != 'undefined') {
            return $uuid_session;
        } else {
            $this->__set_uuid();
        }
    }

    public function getStatusMobile() {
        $agent = new Agent();
        return $agent->isMobile();
    }

    public function getStatusTablet() {
        $agent = new Agent();
        return $agent->isTablet();
    }

    public function getUserAgent() {
        $agent = new Agent();
        return $agent;
    }

    public function getDivideClassPath($path = null) {
        if ($path != null) {
            $res = explode('\\', $path);
            return $res[2]; //model name
        }
    }

    public function redirect($path = null) {
        if ($path != null) {
            header("Location: " . $path);
        }
    }

    public function getValidEmail($keyword = null) {
        if ($keyword != null) {
            if (filter_var($keyword, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getRandomNumber($length = null) {
        $char = '0123456789';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $pos = rand(0, strlen($char) - 1);
            $string .= $char[$pos];
        }
        return $string;
    }

    public function getRandomChar($length = null, $type = 'auto') {
        if ($type == 'auto') {
            $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        } elseif ($type == 'l') {
            $char = 'abcdefghijklmnopqrstuvwxyz123456789';
        } elseif ($type == 'u') {
            $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        }
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $pos = rand(0, strlen($char) - 1);
            $string .= $char[$pos];
        }
        return $string;
    }

    public function getHashPassword($password = null) {
        if ($password != null) {
            $options = array(
                'cost' => 12,
            );
            return password_hash($password, PASSWORD_BCRYPT, $options);
        }
    }

    public function getUriSegment2($url, $return_array = false) {
        $str = str_replace(url('/'), '', $url);
        $str2 = explode('?', $str);
        $str3 = explode('/', $str2[0]);
        if ($return_array == true) {
            $res = array();
            if ($str3) {
                $res = array();
                foreach ($str3 AS $k => $v) {
                    if ($k != 0)
                        $res[] = $v;
                }
            }
        } else {
            $res = '';
            if ($str3) {
                $total = count($str3) - 1;
                foreach ($str3 AS $k => $v) {
                    if (!empty($res))
                        $res .= '.';
                    if ($k != 0)
                        if ($k == ($total)) {
                            $res .= ($v);
                        } else {
                            $res .= ucfirst($v);
                        }
                }
            }
        }
        return $res;
    }

    public function getRoutes($key = null, $type = '') {
        if ($key != null && app('request')->route()->getAction() != null) {
            $routeArray = app('request')->route()->getAction();
            if ($type == 'namespace') {
                $val = explode('@', $routeArray['controller'])[0];
                $val = str_replace('App\Http\Controllers', '', $val);
                $val = str_replace('\\', '/', $val);
                $val = explode('/', $val);
                array_pop($val);
                return implode('.', $val);
            } else {
                if ($key == 'modul') {
                    $routeArray = explode('\\', $routeArray['controller']);
                    return $routeArray[3];
                } else {
                    $controllerAction = class_basename($routeArray['controller']);
                    list($controller, $action) = explode('@', $controllerAction);
                    return ${$key};
                }
            }
        }
    }

    public function getClass($request, $current_url) {
        $val = explode('@', $current_url);
        $val = str_replace('App\Http\Controllers', '', $val[0]);
        $val = str_replace('\\', '/', $val);
        $val = str_replace('Controller', '', $val);
        $val = explode('/', $val);
        $total = count($val) - 1;
        return $val[$total];
    }

    public function getMethod($request, $current_url) {
        $val = explode('@', app('request')->route()->getAction()['controller']);
        return $val[1];
    }

    public function getBrowser($length = null) {
        $u_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";
        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        $ub = 'unknown';
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = isset($matches['version'][1]) ? $matches['version'][1] : '';
            }
        } else {
            $version = $matches['version'][0];
        }
        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }
        return array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern
        );
    }

    public function getIp() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_REAL_IP', 'REMOTE_ADDR', 'HTTP_FORWARDED_FOR', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }

    public function _set_response($type = 'json', $params = array()) {
        if ($params) {
            switch ($type) {
                case "json":
                    $response = json_encode(
                            array(
                                'status' => array(
                                    'code' => $params['code'],
                                    'message' => $params['message']
                                ),
                                'options' => array_merge(['valid' => isset($params['valid']) ? $params['valid'] : false, 'meta' => isset($params['meta']) ? $params['meta'] : []]),
                                'data' => isset($params['data']) ? $params['data'] : []
                            )
                    );
                    break;
                case "array":
                    $response = array(
                        'status' => array(
                            'code' => $params['code'],
                            'message' => $params['message']
                        ),
                        'options' => array_merge(['valid' => isset($params['valid']) ? $params['valid'] : false, 'meta' => isset($params['meta']) ? $params['meta'] : []]),
                        'data' => isset($params['data']) ? $params['data'] : []
                    );
                    break;
                case "object":
                    $array = array(
                        'status' => array(
                            'code' => $params['code'],
                            'message' => $params['message']
                        ),
                        'options' => array_merge(['valid' => isset($params['valid']) ? $params['valid'] : false, 'meta' => isset($params['meta']) ? $params['meta'] : []]),
                        'data' => isset($params['data']) ? $params['data'] : []
                    );
                    $response = json_decode(json_encode($array), FALSE);
                    break;
                case "xml":
                    $array = array(
                        'status' => array(
                            'code' => $params['code'],
                            'message' => $params['message']
                        ),
                        'options' => array_merge(['valid' => isset($params['valid']) ? $params['valid'] : false, 'meta' => isset($params['meta']) ? $params['meta'] : []]),
                        'data' => isset($params['data']) ? $params['data'] : []
                    );
                    $xml = new SimpleXMLElement('<root/>');
                    array_walk_recursive($array, array($xml, 'addChild'));
                    $response = $xml->asXML();
                    break;
            }
            return $response;
        }
    }

    public function validate_img_exist($external_link) {
        if ($external_link && @getimagesize($external_link)) {
            return true;
        } else {
            return false;
        }
    }

    public function format_money($number) {
        $result = "Rp " . number_format($number, 2, ',', '.');
        return $result;
    }

    public function slug($string = null) {
        if ($string != null) {
            $string_1 = trim($string);
            $string_2 = strtolower($string_1);
            $string_3 = str_replace(' ', '-', $string_2);
            $string_4 = str_replace('--', '-', $string_3);
            $string_5 = str_replace('_', '-', $string_4);
            $string_6 = str_replace('__', '-', $string_5);
            $string_7 = str_replace('/', '-', $string_6);
            return $string_7;
        }
    }

    public function url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE) {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];
            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s" : "%s://%s") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            if ($end == "/") {
                $base_url = sprintf($tmplt, $http, $hostname);
            } else {
                $base_url = sprintf($tmplt, $http, $hostname, $end);
            }
        } else {
            $base_url = 'http://localhost';
        }
        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) {
                if ($base_url['path'] == '/') {
                    $base_url['path'] = '';
                }
            }
        }
        return $base_url;
    }

    public function session_flash_custom($params = array()) {
        $message = [];
        if ($params) {
            $message = [
                'alert-msg' => [
                    [
                        'type' => $params['body']['type'],
                        'message' => $params['body']['message']
                    ]
                ]
            ];
            session($message);
            session()->save();
        }
    }
}
