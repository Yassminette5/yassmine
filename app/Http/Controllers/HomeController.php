<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function apprenantHome()
    {
        $user = Auth::user();
        return view('apprenant.home', compact('user'));
    }
}
