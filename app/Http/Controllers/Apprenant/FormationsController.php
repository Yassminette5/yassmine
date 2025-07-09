<?php

namespace App\Http\Controllers\Apprenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class FormationsController extends Controller
{
     public function index()
    {
        $formations = Formation::all();
        return view('apprenant.index', compact('formations'));
    }
    public function inscrire($id)
{

    return redirect()->back()->with('success', 'Inscription réussie !');
}
}
