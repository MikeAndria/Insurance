<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class MainController extends Controller
{
    public function index()
    {
        return view('myApp.acceuil.index');
    }
}
