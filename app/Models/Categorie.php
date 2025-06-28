<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
     protected $fillable = ['nom', 'description'];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
