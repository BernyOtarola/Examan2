<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function attraction()
    {
        return $this->belongsTo(Attraction::class, 'id_atraccion');
    }
}

