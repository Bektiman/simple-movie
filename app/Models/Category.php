<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    use HasFactory;
    protected $fillable = [

        'name',
        'slug'
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];

    public function movies (){

        return $this->belongsToMany(Movie::class, 'category_movie','category_id','movie_id');
    }


}
