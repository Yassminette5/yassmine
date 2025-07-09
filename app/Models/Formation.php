<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'categorie_id',
        'titre',
        'description',
        'duree',
        'niveau',
        'date_creation',
        'prix',
        'image_name',
        'statut',
        'instructeur_id',
    ];

    // Relations (optionnelles)
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function instructeur()
    {
        return $this->belongsTo(User::class, 'instructeur_id');
    }
    // App\Models\Formation

public function lecons()
{
    return $this->hasMany(Lecon::class);
}
public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
