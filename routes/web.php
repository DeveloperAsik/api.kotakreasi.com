<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', 'App\Http\Controllers\Api\UserController@view')->name('api.user.view');
Route::middleware(['auth'])->group(function ($e) {
    /*
     * 
     * extraweb routes start here
     * 
     */
    Route::group(['prefix' => 'api'], function ($e) {

        Route::get('/', function () {
            dd('iyey');
        });
        Route::get('/lists', 'App\Http\Controllers\Api\UserController@view')->name('api.user.view');
    });
});
