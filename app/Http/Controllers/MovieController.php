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
                'image' => 'https://image.tmdb.org/t/p/w500/edv5CZvWj09upOsy2Y6IwDhK8bt.jpg',
                'cast' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt', 'Elliot Page'],
                'description' => 'Seorang pencuri mimpi ditugaskan menanamkan ide ke dalam alam bawah sadar targetnya.'
            ],
            [
                'title' => 'Avengers: Endgame',
                'year' => 2019,
                'genre' => 'Action',
                'release_date' => '2019-04-26',
                'image' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
                'cast' => ['Robert Downey Jr.', 'Chris Evans', 'Scarlett Johansson'],
                'description' => 'Para Avengers berusaha membalikkan dampak jentikan Thanos dan menyelamatkan semesta.'
            ],
            [
                'title' => 'The Dark Knight',
                'year' => 2008,
                'genre' => 'Action',
                'release_date' => '2008-07-18',
                'image' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
                'cast' => ['Christian Bale', 'Heath Ledger', 'Aaron Eckhart'],
                'description' => 'Batman menghadapi Joker yang membawa kekacauan brutal ke Gotham City.'
            ],
            [
                'title' => 'Parasite',
                'year' => 2019,
                'genre' => 'Drama',
                'release_date' => '2019-05-30',
                'image' => 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg',
                'cast' => ['Song Kang-ho', 'Lee Sun-kyun', 'Cho Yeo-jeong'],
                'description' => 'Keluarga miskin menyusup bekerja ke rumah keluarga kaya dengan berbagai tipu daya.'
            ],
            [
                'title' => 'John Wick: Chapter 4',
                'year' => 2023,
                'genre' => 'Action',
                'release_date' => '2023-03-24',
                'image' => 'https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg',
                'cast' => ['Keanu Reeves', 'Donnie Yen', 'Bill Skarsgård'],
                'description' => 'John Wick melawan High Table untuk mencari kebebasannya yang terakhir.'
            ],
            [
                'title' => 'The Matrix',
                'year' => 1999,
                'genre' => 'Sci-Fi',
                'release_date' => '1999-03-31',
                'image' => 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
                'cast' => ['Keanu Reeves', 'Carrie-Anne Moss', 'Laurence Fishburne'],
                'description' => 'Seorang hacker menemukan bahwa dunia yang ia tinggali hanyalah simulasi buatan mesin.'
            ],
            [
                'title' => 'Fight Club',
                'year' => 1999,
                'genre' => 'Drama',
                'release_date' => '1999-10-15',
                'image' => 'https://image.tmdb.org/t/p/w500/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg',
                'cast' => ['Brad Pitt', 'Edward Norton', 'Helena Bonham Carter'],
                'description' => 'Seorang pria membentuk klub pertarungan bawah tanah yang berkembang di luar kendali.'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'year' => 1994,
                'genre' => 'Drama',
                'release_date' => '1994-09-23',
                'image' => 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
                'cast' => ['Tim Robbins', 'Morgan Freeman', 'Bob Gunton'],
                'description' => 'Seorang pria dipenjara karena tuduhan palsu dan berteman dengan narapidana bijak.'
            ],
            [
                'title' => 'The Godfather',
                'year' => 1972,
                'genre' => 'Crime',
                'release_date' => '1972-03-24',
                'image' => 'https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
                'cast' => ['Marlon Brando', 'Al Pacino', 'James Caan'],
                'description' => 'Kisah keluarga mafia Corleone dan perebutan kekuasaan di dunia kejahatan terorganisir.'
            ],
            [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'year' => 2001,
                'genre' => 'Fantasy',
                'release_date' => '2001-12-19',
                'image' => 'https://image.tmdb.org/t/p/w500/6oom5QYQ2yQTMJIbnvbkBL9cHo6.jpg',
                'cast' => ['Elijah Wood', 'Ian McKellen', 'Viggo Mortensen'],
                'description' => 'Frodo memulai perjalanan untuk menghancurkan cincin jahat bersama kelompok Fellowship.'
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'year' => 2003,
                'genre' => 'Fantasy',
                'release_date' => '2003-12-17',
                'image' => 'https://image.tmdb.org/t/p/w500/rCzpDGLbOoPwLjy3OAm5NUPOTrC.jpg',
                'cast' => ['Elijah Wood', 'Ian McKellen', 'Viggo Mortensen'],
                'description' => 'Pertempuran akhir untuk Middle-earth terjadi saat Frodo mendekati Mordor.'
            ],
            [
                'title' => 'Titanic',
                'year' => 1997,
                'genre' => 'Romance',
                'release_date' => '1997-12-19',
                'image' => 'https://image.tmdb.org/t/p/w500/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg',
                'cast' => ['Leonardo DiCaprio', 'Kate Winslet', 'Billy Zane'],
                'description' => 'Cinta terlarang berkembang di atas kapal Titanic sebelum tragedi besar terjadi.'
            ],
            [
                'title' => 'The Lion King',
                'year' => 1994,
                'genre' => 'Animation',
                'release_date' => '1994-06-24',
                'image' => 'https://image.tmdb.org/t/p/w500/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg',
                'cast' => ['Matthew Broderick', 'James Earl Jones', 'Jeremy Irons'],
                'description' => 'Simba harus menghadapi masa lalunya dan mengambil kembali haknya sebagai raja.'
            ],
            [
                'title' => 'Gladiator',
                'year' => 2000,
                'genre' => 'Action',
                'release_date' => '2000-05-05',
                'image' => 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg',
                'cast' => ['Russell Crowe', 'Joaquin Phoenix', 'Connie Nielsen'],
                'description' => 'Seorang jenderal Romawi menjadi gladiator dan mencari balas dendam atas keluarganya.'
            ],
            [
                'title' => 'Avatar',
                'year' => 2009,
                'genre' => 'Sci-Fi',
                'release_date' => '2009-12-18',
                'image' => 'https://image.tmdb.org/t/p/w500/jRXYjXNq0Cs2TcJjLkki24MLp7u.jpg',
                'cast' => ['Sam Worthington', 'Zoe Saldana', 'Sigourney Weaver'],
                'description' => 'Seorang mantan marinir bergabung dengan suku Na’vi dalam konflik di planet Pandora.'
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

        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

       $newMovie = [
        'title' => $request['title'],
        'description' => $request['description'],
        'release_date' => $request['release_date'],
        'cast' => explode(',',$request['cast']),
        'genre' => $request['genre'],
        'image'=> $request['image-url']
       ];

    //    dd($newMovie);

       $newMovie = (object) $newMovie;
       $this->movies[] = $newMovie;
       return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie= $this->movies[$id];
        return view('movies.show', compact(['movie','id']));;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie= $this->movies[$id];
        $movie->cast = implode(',', $movie->cast);
        return view('movies.edit', compact(['movie', 'id']));
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
        $this->movies[$id]->title = $request['title'];
        $this->movies[$id]->description = $request['description'];
        $this->movies[$id]->genre = $request['genre'];
        $this->movies[$id]->release_date = $request['release_date'];
        $this->movies[$id]->cast = explode(',', $request['cast']);
        $this->movies[$id]->image = $request['image-url'];
        
       return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!isset($this->movies[$id])) {
            return response()->json([
                'error' => 'Movie not found'
            ], 404);
        }

        // hapus movie berdasarkan index array
        unset($this->movies[$id]);

        // reindex array biar urut lagi
        // $this->movie = array_values($this->movie);

        return $this->index();
    }
}
