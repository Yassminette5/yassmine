<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InscriptionController extends Controller
{
    public function formulaire($id)
    {
        

        $formation = Formation::findOrFail($id);
        return view('inscription.formulaire', compact('formation'));
    }

    public function payer(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',
            'cin' => 'required|string',
            'type_paiement' => 'required|string',
        ]);

        $formation = Formation::findOrFail($id);

        Inscription::create([
            'formation_id'     => $formation->id,
              'apprenant_id'   => Auth::id(),
            'date_inscription' => now(),
            'status'           => 'payé',
            'montant'          => $formation->prix,
            'type_paiement'    => $request->type_paiement,
            'nom_apprenant'    => $request->nom,
            'nom_formation'    => $formation->titre,
            'cin'              => $request->cin,
            'email'            => $request->email,
            
        ]);

        return redirect()->route('apprenant.index')->with('success', 'Inscription réussie !');
    }
}
