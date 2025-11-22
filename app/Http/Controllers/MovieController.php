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

        // for ($i = 0; $i < 10; $i++) {
        //     $this->movie[] = [
        //         'title' => 'Movie' . ' ' . $i,
        //         'year' => 2020+$i,
        //         'genre' => 'Action'
        //     ];
        // }

        $this->movies = array_map(function ($m) {
            return (object)$m;
        }, [
            [
                'title' => 'Inception',
                'year' => 2010,
                'genre' => 'Sci-Fi',
                'release_date' => '2010-07-16',
                'image' => 'https://image.tmdb.org/t/p/w500/edv5CZvWj09upOsy2Y6IwDhK8bt.jpg'
            ],
            [
                'title' => 'Avengers: Endgame',
                'year' => 2019,
                'genre' => 'Action',
                'release_date' => '2019-04-26',
                'image' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg'
            ],
            [
                'title' => 'The Dark Knight',
                'year' => 2008,
                'genre' => 'Action',
                'release_date' => '2008-07-18',
                'image' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg'
            ],
            [
                'title' => 'Parasite',
                'year' => 2019,
                'genre' => 'Drama',
                'release_date' => '2019-05-30',
                'image' => 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg'
            ],
            [
                'title' => 'John Wick: Chapter 4',
                'year' => 2023,
                'genre' => 'Action',
                'release_date' => '2023-03-24',
                'image' => 'https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg'
            ],
            [
                'title' => 'The Matrix',
                'year' => 1999,
                'genre' => 'Sci-Fi',
                'release_date' => '1999-03-31',
                'image' => 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg'
            ],
            [
                'title' => 'Fight Club',
                'year' => 1999,
                'genre' => 'Drama',
                'release_date' => '1999-10-15',
                'image' => 'https://image.tmdb.org/t/p/w500/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'year' => 1994,
                'genre' => 'Drama',
                'release_date' => '1994-09-23',
                'image' => 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg'
            ],
            [
                'title' => 'The Godfather',
                'year' => 1972,
                'genre' => 'Crime',
                'release_date' => '1972-03-24',
                'image' => 'https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg'
            ],
            [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'year' => 2001,
                'genre' => 'Fantasy',
                'release_date' => '2001-12-19',
                'image' => 'https://image.tmdb.org/t/p/w500/6oom5QYQ2yQTMJIbnvbkBL9cHo6.jpg'
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'year' => 2003,
                'genre' => 'Fantasy',
                'release_date' => '2003-12-17',
                'image' => 'https://image.tmdb.org/t/p/w500/rCzpDGLbOoPwLjy3OAm5NUPOTrC.jpg'
            ],
            [
                'title' => 'Titanic',
                'year' => 1997,
                'genre' => 'Romance',
                'release_date' => '1997-12-19',
                'image' => 'https://image.tmdb.org/t/p/w500/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg'
            ],
            [
                'title' => 'The Lion King',
                'year' => 1994,
                'genre' => 'Animation',
                'release_date' => '1994-06-24',
                'image' => 'https://image.tmdb.org/t/p/w500/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg'
            ],
            [
                'title' => 'Gladiator',
                'year' => 2000,
                'genre' => 'Action',
                'release_date' => '2000-05-05',
                'image' => 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg'
            ],
            [
                'title' => 'Avatar',
                'year' => 2009,
                'genre' => 'Sci-Fi',
                'release_date' => '2009-12-18',
                'image' => 'https://image.tmdb.org/t/p/w500/jRXYjXNq0Cs2TcJjLkki24MLp7u.jpg'
            ]
        ]
        );
        
    }


    public function index()
    {
        $movies = $this->movies;
        return view('movies.index', compact('movies'))->with(
            ['titlePage'=>'Movie List']
        );
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
