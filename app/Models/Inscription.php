<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    

    protected $fillable = [
        'formation_id',
        'apprenant_id',
        'date_inscription',
        'status',
        'montant',
        'type_paiement',
        'nom_apprenant',
        'nom_formation',
        'cin',
        'email',
    ];
}
