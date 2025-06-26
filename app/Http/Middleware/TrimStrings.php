<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * Les noms d'attributs qui ne doivent pas être tronqués.
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
