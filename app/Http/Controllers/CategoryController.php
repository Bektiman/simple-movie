<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $categories = DB::table('categories')->get();
        // return $categories;

        // $categories= Category::select(['name', 'slug'])->get();
        // return $categories;

        $categories = Category::all();

        return $categories;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //

        $request->validated();
        DB::table('categories')->insert([
            'name' => $request['name'],
            'slug' => Str::of($request['name'])->slug('-'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this->index();
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
