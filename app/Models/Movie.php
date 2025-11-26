<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $fillable = [
        'title',
        'year',
        'genre',
        'release_date',
        'image',
        'cast',
        'description',
    ];

    protected $casts = [
        'cast' => 'array', // otomatis menjadi array
        'release_date' => 'date',
        'year' => 'integer',
    ];
}
