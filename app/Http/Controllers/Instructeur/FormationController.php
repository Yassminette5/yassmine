<?php

namespace App\Http\Controllers\Instructeur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Categorie;

class FormationController extends Controller
{
    // Affiche la page du formulaire
    public function create()
    {
        $categories = Categorie::all();
        return view('instructeur.formations.create', compact('categories'));
    }

    // Traite l'envoi du formulaire
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
            'duree' => 'nullable|string',
            'niveau' => 'nullable|string',
            'prix' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/formations'), $imageName);
        }

        Formation::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'duree' => $request->duree,
            'niveau' => $request->niveau,
            'prix' => $request->prix,
            'image_name' => $imageName,
            'date_creation' => now(),
        ]);

        return back()->with('success', 'Formation ajoutée avec succès.');
    }
}
