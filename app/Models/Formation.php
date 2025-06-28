<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'categorie_id',
        'duree',
        'niveau',
        'prix',
        'image_name',
        'date_creation',
    ];

    public $timestamps = false; // ← Laravel ne cherchera pas à remplir created_at et updated_at automatiquement

    // 🔗 Relation : une formation appartient à une catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
