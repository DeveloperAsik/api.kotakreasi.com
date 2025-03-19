<?php

namespace App\Helpers\Oreno;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Description of Sanitize
 *
 * @author User
 */
class Sanitize {

    //put your code here
    public function filter_input_field($string = null, $variant = 'low', $type = "varchar") {
        if ($variant == 'low') {
            $new_string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
            $new_string = filter_var($new_string, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
        } elseif ($variant == 'high') {
            $new_string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
        } elseif ($variant == 'encode') {
            $new_string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH);
        } elseif ($variant == 'full') {
            $new_string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        } else {
            $new_string = '';
        }

        if (isset($new_string) && !empty($new_string) && $new_string != null || $new_string != '') {
            return $new_string;
        } else {
            if ($type == 'varchar') {
                return '-';
            } elseif ($type == 'datetime') {
                return '0000-00-00 00:00:00';
            } elseif ($type == 'int') {
                return '0';
            } else {
                return null;
            }
        }
    }

    public function string_escape($options = null) {
        if (count($options) == 1) {
            $field_data = $options;
            $type = null;
        } else {
            $field_data = $options[0];
            $type = $options[1];
        }
        if (isset($type) && !empty($type)) {
            if ($type == 'quotes') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
                return $new_string;
            } elseif ($type == 'strip-low') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                return $new_string;
            } elseif ($type == 'strip-high') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                return $new_string;
            } elseif ($type == 'encode-low') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                return $new_string;
            } elseif ($type == 'encode-high') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH);
                return $new_string;
            } elseif ($type == 'encode-amp') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP);
                return $new_string;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function url_clean($field_data = null) {
        $new_string = filter_var($field_data, FILTER_SANITIZE_URL);
        return $new_string;
    }

    public function html_escape($options = null) {
        if (count($options) == 1) {
            $field_data = $options;
            $type = 'low';
        } else {
            $field_data = $options[0];
            $type = $options[1];
        }
        if (isset($type) && !empty($type)) {
            if ($type == 'low') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
                return $new_string;
            } elseif ($type == 'high') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
                return $new_string;
            } elseif ($type == 'encode') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH);
                return $new_string;
            } elseif ($type == 'full') {
                $new_string = filter_var($field_data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                return $new_string;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function email_clean($field_data = null) {
        $new_string = filter_var($field_data, FILTER_SANITIZE_EMAIL);
        return $new_string;
    }

    public function quotes($field_data = null) {
        $new_string = filter_var($field_data, FILTER_SANITIZE_MAGIC_QUOTES);
        return $new_string;
    }

    public function replace($search = null, $replace = null, $field_data = null) {
        return str_replace($search, $replace, $field_data);
    }

}
