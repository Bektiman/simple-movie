<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movie = Movie::with('ratings')->findOrFail(1);
        return $movie;
    }
    public function popularMovie()
    {
        //
        $movie = Movie::select('id','title')->whereHas('ratings', function($query){

            $query->where('rating','>',4);
        })->get();

        return $movie;
    }

    public function popularMovieAVG()
    {
        //
        // $movie = Movie::select('id','title')->withAvg(['ratings as avg_rating' => function($q){
        //     $q->where('rating','>',4);
        
        // }], 'rating')->get();

        $movie = Movie::whereHas('ratings', function($q){

            $q->select(DB::raw('AVG(rating)'))->havingRaw('AVG(rating)>3');
        })->with('ratings')->get();
        return $movie;
    }

    public function movieWithRating(){
        $movie = Movie::with('ratings')->get()->filter(function ($movie){
            return $movie->ratings->avg('rating') >3;
        })->map(
            function ($movie){
                return [
                    'name' => $movie->name,
                    'rating'=> $movie->ratings()->avg('rating')
                ];
            }
        )->values();

        return $movie;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
