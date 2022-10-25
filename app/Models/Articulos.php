<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'modelo', 'marca', 'color', 'talla', 'precio', 'fotoArticulo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

