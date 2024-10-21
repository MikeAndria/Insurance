<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Sinistre;

class ClientController extends Controller
{
    public function clients()
    {
        $clients = Client::all();
        $message = '';
        return view( 'myApp.clients.clients', compact('clients', 'message'));
    }

    public function clientsSansContrat()
    {
        // Récupérer tous les clients qui n'ont pas de contrat
        $clients = Client::doesntHave('contrats')->get();
        $nbr = count($clients);
        if ($nbr > 1) {
            $message = $nbr.' clients sans contrat';
        }
        else {
            $message = $nbr.' client sans contrat';
        }

        // Passer les clients sans contrat à la vue
        return view( 'myApp.clients.clients', compact('clients', 'message'));
    }

    public function clientsAvecContrat()
    {
        // Récupérer tous les clients qui ont des contrat
        $clients = Client::has('contrats')->get();
        $nbr = count($clients);
        if ($nbr > 1) {
            $message = $nbr.' clients avec contrat';
        }
        else {
            $message = $nbr.' client avec contrat';
        }

        // Passer les clients sans contrat à la vue
        return view( 'myApp.clients.clients', compact('clients', 'message'));
    }

    public function clientsIndividuel()
    {
        // Récupérer tous les clients de type individuel
        $clients = Client::where('type_contrat_souscrit', 'individuel')->get();
        $nbr = count($clients);
        if ($nbr > 1) {
            $message = $nbr.' clients individuel';
        }
        else {
            $message = $nbr.' client individuel';
        }

        // Passer les clients sans contrat à la vue
        return view( 'myApp.clients.clients', compact('clients', 'message'));
    }

    public function clientsGroupe()
    {
        // Récupérer tous les clients de type groupe
        $clients = Client::where('type_contrat_souscrit', 'groupe')->get();
        $nbr = count($clients);
        if ($nbr > 1) {
            $message = $nbr.' clients groupe';
        }
        else {
            $message = $nbr.' client groupe';
        }
        // Passer les clients sans contrat à la vue
        return view( 'myApp.clients.clients', compact('clients', 'message'));

    }


    public function rechercherClientParId(Request $request)
    {
        $id = $request -> input('client_id');
        // Rechercher un client par son ID
        $clients = Client::where('client_id', $id)->get();


        // Si aucun client n'est trouvé, retourner un message d'erreur
        if (count($clients) == 0) {
            $message = 'Client non trouvé';
            return view( 'myApp.clients.clients', compact('clients', 'message'));
        }
        $message = 'Resultat de la recherche';
        // Si trouvé, retourner la vue avec le client
        return view( 'myApp.clients.clients', compact('clients', 'message'));
   
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date_de_naissance' => 'required|date',
            'type_contrat_souscrit' => 'required|string|in:individuel,groupe',
        ]);

        Client::create($validated);
        return redirect()->route('clients')->with('success', 'Client bien ajouté');
    }

    

    public function destroy($id)
    {
        $client = Client::find($id);

        if ($client) {
            $client->delete();
        }
        return redirect()->route('clients')->with('success', 'Client  numéro '.$id.' bien supprimé!');
    }

    public function update(Request $request, $id)
    {
        // Valider les données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date_de_naissance' => 'required|date',
            'type_contrat_souscrit' => 'required|string|in:individuel,groupe',
        ]);
 
    
        // Récupérer le client par son ID
        $client = Client::findOrFail($id);

        // Mettre à jour les informations du client
        $client->update($validated);
    
        // Redirection avec message de succès
        return redirect()->route('clients')->with('success', 'Mise à jour du client numéro '.$id.' bien effectué!');
    }
    





    
 
}
