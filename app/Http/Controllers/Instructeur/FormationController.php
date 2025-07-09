<?php

namespace App\Http\Controllers\Instructeur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    /**
     * Affiche le formulaire de création de formation
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('instructeur.formations.create', compact('categories'));
    }

    /**
     * Enregistre la formation dans la base
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie_id'   => 'required|exists:categories,id',
            'titre'          => 'required|string|max:255',
            'description'    => 'required|string',
            'duree'          => 'required|string',
            'niveau'         => 'required|string',
            'prix'           => 'required|numeric',
            'image'          => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'statut'         => 'required|string|in:en attente,approuvée,rejetée',
        ]);

        // ✅ Sauvegarder l'image dans storage/app/public/formations
        $imagePath = $request->file('image')->store('formations', 'public'); // ex: formations/image123.jpg

        // ✅ Créer la formation en base
        Formation::create([
            'categorie_id'   => $request->categorie_id,
            'titre'          => $request->titre,
            'description'    => $request->description,
            'duree'          => $request->duree,
            'niveau'         => $request->niveau,
            'date_creation'  => now()->toDateString(),
            'prix'           => $request->prix,
            'image_name'     => $imagePath, // ex: formations/image123.jpg
            'statut'         => $request->statut,
            'instructeur_id' => Auth::id(),
        ]);

        return redirect()->route('instructeur.dashboard')->with('success', 'Formation ajoutée avec succès.');
    }
}
