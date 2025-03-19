<?php

namespace App\Helpers\Oreno;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\Oreno\Jwt;

/**
 * Description of Encrypter
 *
 * @author User
 */
class Encrypter {

    //put your code here
    public function encrypt($params = '') {
        //get raw string from $params
        if ($params != '') {
            $chunk = trim(chunk_split($params, 2, " "));
            $explode = explode(' ', $chunk);
            $total_array = count($explode) - 1;
            $new_id = 0;
            $new_arr_raw = [];
            $new_arr_encrypted = [];
            if ($explode) {
                foreach ($explode AS $key => $value) {
                    if ($explode[$total_array]) {
                        $new_arr_encrypted[] = base64_encode($explode[$total_array]);
                    }
                    $total_array--;
                }
            }
            $implode = implode('&amp;', ($new_arr_encrypted));
            $headers = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
            $payload = json_encode(['value' => $implode]);
            $this->Jwt = new Jwt();
            return $this->Jwt->encode($headers, $payload);
        }
    }

    public function decrypt($params = '') {
        if ($params != '') {
            $this->Jwt = new Jwt();
            $tokenParts = explode('.', $params);
            $header = base64_decode($tokenParts[0]);
            $payload = json_decode($this->Jwt->decode($params), true)['value'];
            $explode = explode('&amp;', $payload);
            $total_array = count($explode) - 1;
            $new_id = 0;
            $new_arr_raw = [];
            $new_arr_encrypted = [];
            if ($explode) {
                foreach ($explode AS $key => $value) {
                    if ($explode[$total_array]) {
                        $new_arr_encrypted[] = base64_decode($explode[$total_array]);
                    }
                    $total_array--;
                }
            }
            $implode = implode(' ', $new_arr_encrypted);
            $reverse_chunk = str_replace(' ', '', $implode);
            return $reverse_chunk;
        }
    }

}
