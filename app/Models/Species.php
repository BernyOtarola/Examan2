<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    public function attractions()
    {
        return $this->hasMany(Attraction::class, 'id_especie');
    }
}

