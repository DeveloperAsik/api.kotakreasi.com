<?php

namespace App\Helpers\Oreno;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\MyHelper;
use App\Helpers\Oreno\Converter;

/**
 * Description of Jwt
 *
 * @author User
 */
class Jwt {

    //put your code here
    public function encode($headers, $payload, $secret = 'secret') {
        $this->Converter = new Converter();
        $headers_encoded = $this->Converter->base64url_encode(json_encode($headers));
        $payload_encoded = $this->Converter->base64url_encode(json_encode($payload));
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded = $this->Converter->base64url_encode($signature);
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        return $jwt;
    }

    public function decode($jwt, $secret = 'secret') {
        $this->Converter = new Converter();
        // split the jwt
        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        //dd($payload);
        $payload2 = json_decode($payload, true);
        $signature_provided = $tokenParts[2];
        return $payload2;
    }

    public function is_jwt_valid($jwt, $secret = 'secret') {
        $this->Converter = new Converter();
        // split the jwt
        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];
        // check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
        $expiration = json_decode($payload)->expired_date;
        $is_token_expired = ($expiration - time()) < 0;
        // build a signature based on the header and payload using the secret
        $base64_url_header = $this->Converter->base64url_encode($header);
        $base64_url_payload = $this->Converter->base64url_encode($payload);
        $signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
        $base64_url_signature = $this->Converter->base64url_encode($signature);
        // verify it matches the signature provided in the jwt
        $is_signature_valid = ($base64_url_signature === $signature_provided);
        return $is_signature_valid;
    }

    public function validate_jwt_login($jwt, $secret = 'secret') {
        // split the jwt
        $is_signature_valid = $this->is_jwt_valid($jwt, $secret);
        $user = json_decode($payload);
        $is_expired = false;
        if ($user->expired_date < strtotime(date('Y-m-d H:i:s'))) {
            $is_expired = true;
            DB::table('tbl_user_c_tokens')->where('created_by', $user->user_id)->update([
                'is_logged_in' => 0,
                'is_expiry' => 1,
                'updated_by' => $user->user_id,
                'updated_date' => date('Y-m-d H:i:s'),
            ]);
            return false;
        } else {
            $token_exist = DB::table('tbl_user_c_tokens AS a')->select('a.id', 'a.token')->where('a.created_by', '=', $user->user_id)->first();
            if ($token_exist->token == $jwt) {
                if ($is_token_expired || !$is_signature_valid) {
                    DB::table('tbl_user_c_tokens')->where('created_by', $user->user_id)->update([
                        'expiry_date' => date('Y-m-d H:i:s', strtotime('+12 Hours')),
                        'is_logged_in' => 0,
                        'is_expiry' => 1,
                        'updated_by' => $user->user_id,
                        'updated_date' => date('Y-m-d H:i:s'),
                    ]);
                    return false;
                } else {
                    DB::table('tbl_user_c_tokens')->where('created_by', $user->user_id)->update([
                        'expiry_date' => date('Y-m-d H:i:s', strtotime('+12 Hours')),
                        'is_logged_in' => 1,
                        'is_expiry' => 0,
                        'updated_by' => $user->user_id,
                        'updated_date' => date('Y-m-d H:i:s'),
                    ]);
                    return true;
                }
            } else {
                return false;
            }
        }
    }

}
