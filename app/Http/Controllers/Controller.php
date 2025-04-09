<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Entity\AppEntity;
use View;

abstract class Controller {

    protected $General;
    protected $AppEntity;

    public function __construct(Request $request) {
        $this->AppEntity = new AppEntity;
        $this->General = new General;
        dd('wew');
    }
}
