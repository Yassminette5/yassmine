protected function redirectTo()
{
    $user = auth()->user();
    if ($user->role === 'admin') {
        return '/admin/dashboard';
    } elseif ($user->role === 'instructeur') {
        return '/instructeur/dashboard';
    } elseif ($user->role === 'apprenant') {
        return '/apprenant/dashboard';
    }

    return '/home'; // fallback
}
