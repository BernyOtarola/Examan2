<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    public function species()
    {
        return $this->belongsTo(Species::class, 'id_especie');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_atraccion');
    }

    public function averageRating()
    {
        return $this->comments()->avg('calificación');
    }
}

