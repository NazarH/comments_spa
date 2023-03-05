<?php

namespace App\Http\Controllers;

use App\Services\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service){
        $this->service = $service;
    }
}
