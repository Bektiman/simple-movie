<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Routing\Controller;             // <<< WAJIB ADA
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public $movie;
    // public $movies;

    public function __construct() {}

    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'))->with(
            ['titlePage' => 'Movie List']
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        //

        $request->validated();

        //    $newMovie = [
        //     'title' => $request['title'],
        //     'description' => $request['description'],
        //     'release_date' => $request['release_date'],
        //     'cast' => explode(',',$request['cast']),
        //     'genre' => $request['genre'],
        //     'image'=> $request['image-url']
        //    ];

        //    dd($newMovie);

        //    $newMovie = (object) $newMovie;
        //    $this->movies[] = $newMovie;
        //    return $this->index();

        DB::table('movies')->insert([
            'title' => $request['title'],
            'description' => $request['description'],
            'release_date' => $request['release_date'],
            'cast' => explode(',', $request['cast']),
            'genre' => $request['genre'],
            'image' => $request['image-url'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::where('id', $id);

        return view('movies.show', compact(['movie', 'id']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = DB::table('movies')->where('id', $id)->first();
        $castArray = json_decode($movie->cast, true) ?? [];

        $movie->cast = implode(',', $castArray);
    
        return view('movies.edit', compact('movie', 'id'));
        // $movie->cast = implode(',', $movie->cast);

        // return view('movies.edit', compact(['movie', 'id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, string $id)
    {

        $request->validated();
        // Update field
        DB::table('movies')
            ->where('id', $id)
            ->update([
                'title' => $request['title'],
                'description' => $request['description'],
                'genre' => $request['genre'],
                'release_date' => $request['release_date'],
                'cast' => json_encode(explode(',', $request['cast'])),
                'image' => $request['image-url'],
                'updated_at' => now(), // jangan lupa updated_at
            ]);

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // if (! isset($this->movies[$id])) {
        //     return response()->json([
        //         'error' => 'Movie not found',
        //     ], 404);
        // }

        // hapus movie berdasarkan index array
        // unset($this->movies[$id]);

        // reindex array biar urut lagi
        // $this->movie = array_values($this->movie);

        DB::table('movies')
        ->where('id', $id)
        ->update([
            'deleted_at' => now(),
        ]);

        return $this->index();
    }
}
