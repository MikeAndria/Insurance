<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Sinistre;

class RelationController extends Controller
{
    public function relations()
    {
        return view('myApp.autres.relations');
    }
}
