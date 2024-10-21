<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Sinistre;

class ContratController extends Controller
{
    public function contrats()
    {
        $clients = Client::all();
        $contrats = Contrat::all();
        $message = '';

        return view( 'myApp.contrats.contrats', compact('contrats', 'clients', 'message'));
    }

    public function contratsVie()
    {
        $clients = Client::all();
        // Récupérer tous les contrats de type vie
        $contrats = Contrat::where('type', 'vie')->get();
        $nbr = count($contrats);
        if ($nbr > 1) {
            $message = $nbr.' contrats de type vie';
        }
        else {
            $message = $nbr.' contrat de type vie';
        }
        
        // Passer les contrats sans contrat à la vue
        return view( 'myApp.contrats.contrats', compact('contrats', 'clients', 'message'));
    }

    public function contratsNonVie()
    {
        $clients = Client::all();
        // Récupérer tous les contrats de type non-vie
        $contrats = Contrat::where('type', 'non-vie')->get();
        $nbr = count($contrats);
        if ($nbr > 1) {
            $message = $nbr.' contrats de type vie';
        }
        else {
            $message = $nbr.' contrat de type vie';
        }

        // Passer les contrats sans contrat à la vue
        return view( 'myApp.contrats.contrats', compact('contrats', 'clients', 'message'));
    }

    
    public function rechercherContratParId(Request $request)
    {
        $clients = Client::all();
        $id = $request -> input('contrat_id');
        // Rechercher un contrat par son ID
        $contrats = Contrat::where('contrat_id', $id)->get();


        // Si aucun contrat n'est trouvé, retourner un message d'erreur
        if (count($contrats) == 0) {
            $message = 'Contrat non trouvé';
            return view( 'myApp.contrats.contrats', compact('contrats','clients', 'message'));
        }
        $message = 'Resultat de la recherche';
        // Si trouvé, retourner la vue avec le contrat
        return view( 'myApp.contrats.contrats', compact('contrats', 'clients', 'message'));
   
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'type' => 'required|string|in:vie,non-vie',
            'date_souscription' => 'required|date',
            'montant_assure' => 'required|numeric|min:0',
            'duree' => 'required|int',
        ]);

        Contrat::create($validated);
        return redirect()->route('contrats')->with('success', 'Contrat bien ajouté');
    }

    public function destroy($id)
    {
        $clients = Client::all();
        $contrat = Contrat::find($id);

        if ($contrat) {
            $contrat->delete();
        }
        return redirect()->route('contrats')->with('success', 'Contrat  numéro '.$id.' bien supprimé!');
    }

    public function update(Request $request, $id)
    {
        // Valider les données
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'type' => 'required|string|in:vie,non-vie',
            'date_souscription' => 'required|date',
            'montant_assure' => 'required|numeric|min:0',
            'duree' => 'required|int',
        ]);

    
        // Récupérer le contrat par son ID
        $contrat = Contrat::findOrFail($id);

        // Mettre à jour les informations du contrat
        $contrat->update($validated);
    
        // Redirection avec message de succès
        return redirect()->route('contrats')->with('success', 'Mise à jour du contrat numéro '.$id.' bien effectué!');
    }
    


}
