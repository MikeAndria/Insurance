<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\Client;
use App\Models\Sinistre;

class SinistreController extends Controller
{
    public function sinistres()
    {
        $sinistres = Sinistre::all();
        $contrats = Contrat::doesntHave('sinistres')->get();
        $message = '';
        return view( 'myApp.sinistres.sinistres', compact('sinistres', 'contrats', 'message'));
    }

    public function rechercherSinistreParId(Request $request)
    {
        $contrats = Contrat::doesntHave('sinistres')->get();
        $id = $request -> input('sinistre_id');
        // Rechercher un sinistre par son ID
        $sinistres = Sinistre::where('sinistre_id', $id)->get();


        // Si aucun sinistre n'est trouvé, retourner un message d'erreur
        if (count($sinistres) == 0) {
            $message = 'Sinistre non trouvé';
            return view( 'myApp.sinistres.sinistres', compact('sinistres','contrats', 'message'));
        }
        $message = 'Resultat de la recherche';
        // Si trouvé, retourner la vue avec le sinistre
        return view( 'myApp.sinistres.sinistres', compact('sinistres', 'contrats', 'message'));
   
    }

    public function store(Request $request)
    {
        $contrat_id = $request->contrat_id;
        $contrat = Contrat::where('contrat_id', $contrat_id)->first();
        $max_montant_assure = $contrat->montant_assure; 
        $validated = $request->validate([
            'date_declaration' => 'required|date',
            'montant_indemnise' => 'required|numeric|min:0|max:'.$max_montant_assure,
            'contrat_id' => 'required|exists:contrats,contrat_id|unique:sinistres,contrat_id', // Le contrat_id doit être unique
        ]);
    
        Sinistre::create($validated);
    
        return redirect()->route('sinistres')->with('success', 'Sinistre bien ajouté');
        
    }
    

    public function destroy($id)
    {
        $contrats = Contrat::doesntHave('sinistres')->get();
        $sinistre = Sinistre::find($id);

        if ($sinistre) {
            $sinistre->delete();
        }
        return redirect()->route('sinistres')->with('success', 'Sinistre  numéro '.$id.' bien supprimé!');
    }

    public function update(Request $request, $id)
    {
        // Valider les données
        $contrat_id = $request->contrat_id;
        $contrat = Contrat::where('contrat_id', $contrat_id)->first();
        $max_montant_assure = $contrat->montant_assure; 
        $validated = $request->validate([
            'date_declaration' => 'required|date',
            'montant_indemnise' => 'required|numeric|min:0|max:'.$max_montant_assure,
            'contrat_id' => 'required|exists:contrats,contrat_id|unique:sinistres,contrat_id', // Le contrat_id doit être unique
        ]);

    
        // Récupérer le sinistre par son ID
        $sinistre = Sinistre::findOrFail($id);

        // Mettre à jour les informations du sinistre
        $sinistre->update($validated);
    
        // Redirection avec message de succès
        return redirect()->route('sinistres')->with('success', 'Mise à jour du sinistre numéro '.$id.' bien effectué!');
        
    }


}
