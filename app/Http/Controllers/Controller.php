<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Entity\AppEntity;
use App\Helpers\Oreno\General;
use App\Helpers\Oreno\Date;
use App\Helpers\Oreno\Jwt;
use App\Helpers\Oreno\Converter;
use App\Helpers\Oreno\Cookies;
use View;

abstract class Controller {

    protected $General;
    protected $AppEntity;
    protected $Jwt;
    protected $Date;
    protected $Cookies;
    protected $Converter;

    public function __construct(Request $request) {
        $this->AppEntity = new AppEntity;
        $this->General = new General();
        $this->Jwt = new Jwt();
        $this->Date = new Date();
        $this->Cookies = new Cookies();
        $this->Converter = new Converter();
        dd('wew');
    }
}
