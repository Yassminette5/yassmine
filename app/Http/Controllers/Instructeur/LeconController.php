<?php
namespace App\Http\Controllers\Instructeur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecon;
use App\Models\Formation;
use App\Models\Categorie;
class LeconController extends Controller
{
    public function index()
    {
        $lecons = Lecon::with('formation')->get();
        return view('instructeur.lecons.index', compact('lecons'));
    }

    public function create()
    {
        $formations = Formation::all();
        return view('instructeur.lecons.create', compact('formations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'nullable|string',
            'formation_id' => 'required|exists:formations,id',
        ]);

        Lecon::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'formation_id' => $request->formation_id,
        ]);

        // ✅ Correction ici : pas besoin de $formation->id
        return redirect()->route('instructeur.lecons.create')->with('success', 'Leçon ajoutée avec succès.');
    }
}
