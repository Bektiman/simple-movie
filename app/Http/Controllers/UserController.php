<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function createProfile(){
        $user = User::find(1);
        $user->profile()->create(
            [
                'phone' => '081515282126',
                'address' => '123 Main St'
            ]
            );

        return $user;
     }

     public function userProfile(){
        $user = User::with('profile')->findOrFail(1);
        return $user;

     }

     public function updateProfile(Request $request, string $id){
        $user = User::with('profile')->findOrFail($id);
        $user->profile->update([
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return $user;
     }
    public function index()
    {
        //
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
