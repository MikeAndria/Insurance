<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Sinistre;

class MainController extends Controller
{
    public function acceuil()
    {
        //Total client
        $clients = Client::all();
        $total_clients = count($clients);
        
        //client avec contrats
        $clientsAvecContrat = Client::has('contrats')->get();
        $nbr_clientAvecContrat = (count($clientsAvecContrat) * 100) / $total_clients;

        //client sans contrats
        $clientsSansContrat = Client::doesntHave('contrats')->get();
        $nbr_clientSansContrat = (count($clientsSansContrat) * 100) / $total_clients;

        //Total contrats
        $contrats = Contrat::all();
        $total_contrats = count($contrats);

        //Total sinistres
        $sinistres = Sinistre::all();
        $total_sinistres = count($sinistres);

        // Récupérer tous les clients de type individuel
        $clientsIndividuel = Client::where('type_contrat_souscrit', 'individuel')->get();
        $nbr_clientsIndividuel = (count($clientsIndividuel)*100) / $total_clients;

        // Récupérer tous les clients de type groupe
        $clientsGroupe = Client::where('type_contrat_souscrit', 'groupe')->get();
        $nbr_clientsGroupe = (count($clientsGroupe)*100) / $total_clients;

        // Récupérer tous les contrats de type vie
        $contratsVie = Contrat::where('type', 'vie')->get();
        $nbr_contratsVie = (count($contratsVie)*100) / $total_contrats;
        
        // Récupérer tous les contrats de type non-vie
        $contratsNonVie = Contrat::where('type', 'non-vie')->get();
        $nbr_contratsNonVie = (count($contratsNonVie)*100) / $total_contrats;
        

        return view('myApp.acceuil.acceuil', compact('total_clients', 'total_contrats', 'total_sinistres', 'nbr_clientAvecContrat', 'nbr_clientSansContrat'
    , 'nbr_clientsIndividuel', 'nbr_clientsGroupe', 'nbr_contratsVie', 'nbr_contratsNonVie'));
        
    }
}
