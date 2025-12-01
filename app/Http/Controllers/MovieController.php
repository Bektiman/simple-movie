<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexMovieRequest;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Routing\Controller;             // <<< WAJIB ADA
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{
    public function __construct() {}

    public function index(IndexMovieRequest $request)
    {
        // Ambil parameter dari request
        // $page = request('page', 1);
        // $search = request('search', '');
        // $perPage = 20;

        // // Buat cache key unik per page + filter
        // $cacheKey = "movies.page.$page.search.".md5($search);

        // // Ambil data dari cache atau query DB
        // $movies = Cache::remember($cacheKey, 86400, function () use ($search, $perPage) {
        //     $query = Movie::query();

        //     // Filter search jika ada
        //     if (! empty($search)) {
        //         $query->where('title', 'like', "%{$search}%")
        //             ->orWhere('description', 'like', "%{$search}%");
        //     }

        //     // Optional: orderBy (pastikan ada index di kolom ini)
        //     $query->orderBy('title');

        //     // Paginate
        //     return $query->paginate($perPage);

        $request->validated();

        $movies = Cache::remember('movie-index-page'.$request->page,86400, function(){
            return Movie::paginate(10);
        });



        return view('movies.index', compact('movies'))
            ->with(['titlePage' => 'Movie List']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        //

        $request->validated();

        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'cast' => explode(',', $request->cast),
            'genre' => $request->genre,
            'image' => $request['image-url'],
        ]);

        Cache::forget('movie.index');

        return redirect()->route('movie.index')->with('success', 'Movie created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Cache::remember("movie.show.$id", 86400, function () use ($id) {
            return Movie::findOrFail($id); // atau firstOrFail()
        });

        return view('movies.show', compact(['movie', 'id']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        $castArray = $movie->cast ?? [];
        $movie->cast = implode(',', $castArray);

        return view('movies.edit', compact('movie', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, string $id)
    {

        $request->validated();
        Movie::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'cast' => explode(',', $request->cast),
            'genre' => $request->genre,
            'image' => $request['image-url'],
        ]);

        Cache::forget('movie.index');
        Cache::forget("movie.show.$id");

        return redirect()->route('movie.show', $id)
            ->with('success', 'Movie updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Movie::findOrFail($id)->delete();
        Cache::forget("movie.show.$id");
        Cache::forget('movie.index');

        return redirect()->route('movie.index')
            ->with('success', 'Movie deleted.');
    }

    public function attachCategory(){

        $movie = Movie::findOrFail(1);
        $movie->categories()->attach([1,2]);

        return $movie->with('categories')->first();
    }

    public function detachCategory(){
        $movie = Movie::findOrFail(1);
        $movie->categories()->detach([1,2]);
        return $movie->with('categories')->first();
    }

    public function syncCategory(){

        $movie = Movie::findOrFail(1);
        $movie->categories()->sync([1,4,5]);

        // $category = Category::findOrFail(3);
        // $category->movies()->sync([1]);
        return $movie->with('categories')->first();


    }
}
