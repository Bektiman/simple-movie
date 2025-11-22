<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        // $user = [
        //     'name' => 'John',
        //     'email'=> 'Jode@gmail.com',
        //     'role'=> 'admin'
        // ];

        // $movieCategory= 'Horror';


        return view('home');

    }
}
