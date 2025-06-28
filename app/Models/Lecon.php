<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecon extends Model
{
    // Les colonnes que l'on peut remplir automatiquement via des formulaires
    protected $fillable = [
        'formation_id',
        'titre',
        'contenu',
        'date_creation',
        'pdf_file_name',
    ];

    // Relation : chaque leçon appartient à une formation
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
