<?php

namespace App\Http\Controllers\Instructeur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function create()
    {
        return view('instructeur.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($request->all());

        return redirect()->route('instructeur.categories.create')->with('success', 'Catégorie ajoutée avec succès.');
    }
}
