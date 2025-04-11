<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['auth'])->group(function ($e) {
    Route::get('/', function () {
        dd('iyey');
    });
        Route::get('/api/lists', 'App\Http\Controllers\Api\UserController@view')->name('api.user.view');
    /*
     * 
     * extraweb routes start here
     * 
     */
    Route::group(['prefix' => 'api'], function ($e) {
        
    });
});
