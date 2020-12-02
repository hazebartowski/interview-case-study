<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SiteController extends BaseController
{
    public function index()
    {
        return view('site.homepage');
    }
}
