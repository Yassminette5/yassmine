<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function toggleBlock(User $user)
{
    $user->is_blocked = !$user->is_blocked;
    $user->save();
    return back()->with('success', 'Utilisateur mis à jour.');
}
public function destroy(User $user)
{
    $user->delete();
    return back()->with('success', 'Utilisateur supprimé.');
}

}
