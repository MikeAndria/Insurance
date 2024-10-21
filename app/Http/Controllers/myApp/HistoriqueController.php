<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Sinistre;

class HistoriqueController extends Controller
{
    public function historiques()
    {
        return view('myApp.autres.historiques');
    }
}
