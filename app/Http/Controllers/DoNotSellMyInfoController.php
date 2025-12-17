<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoNotSellMyInfoController extends Controller
{
    public function index()
    {
        return view('do-not-sell-my-info');
    }
}
