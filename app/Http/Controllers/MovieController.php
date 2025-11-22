<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;             // <<< WAJIB ADA

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $movie;
    public $movies;

    public function __construct()
    {

        // $this->middleware('isAuth');
        // $this->middleware('isMember')->only('show');

        for ($i = 0; $i < 10; $i++) {
            $this->movie[] = [
                'title' => 'Movie' . ' ' . $i,
                'year' => '2025',
                'genre' => 'Action'
            ];
        }
    }


    public function index()
    {
        $movies = $this->movie;
        // return view('movies.index',['films'=>$movies]);
        return view('movies.index', compact('movies'))->with([
            'titlePage'=>'Movie List'
        ]);
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

        $this->movies[] = [

            'title' => request('title'),
            'year' => request('year'),
            'genre' => request('genre')
        ];

        return $this->movies;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('movies.show');;
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
        if (!isset($this->movie[$id])) {
            return response()->json([
                'error' => 'Movie not found'
            ], 404);
        }

        // Update field
        $this->movie[$id]['title'] = $request->input('title');
        $this->movie[$id]['year']  = $request->input('year');
        $this->movie[$id]['genre'] = $request->input('genre');

        return response()->json([
            'message' => 'Movie' . '  ' . $id . ' ' . 'updated',
            'data' => $this->movie
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!isset($this->movie[$id])) {
            return response()->json([
                'error' => 'Movie not found'
            ], 404);
        }

        // hapus movie berdasarkan index array
        unset($this->movie[$id]);

        // reindex array biar urut lagi
        $this->movie = array_values($this->movie);

        return response()->json([
            'message' => 'Movie deleted',
            'data' => $this->movie
        ]);
    }
}
