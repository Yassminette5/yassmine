<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom',
        'email',
        'password',
        'date_naissance',
        'role',
        'niveau_etude',
        'cv',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Un instructeur peut avoir plusieurs formations.
     */
    public function formations(): HasMany
    {
        return $this->hasMany(Formation::class, 'instructeur_id');
    }
    public function formation()
{
    return $this->belongsToMany(Formation::class);
}
}
