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
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];

    protected $casts = [
        'cast' => 'array', // otomatis menjadi array
        'release_date' => 'date',
        'year' => 'integer',
    ];

    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    
    public function categories(){

        return $this->belongsToMany(Category::class,'category_movie','movie_id','category_id');
    }
}
