<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $movie_ids = Movie::pluck('id')->toArray();
        $user_ids = User::pluck('id')->toArray();
        $ratings = [];

        foreach ($movie_ids as $movie_id) {
            # code...
            foreach ($user_ids as $user_id) {
                # code...
                $ratings[]= [

                    'movie_id' => $movie_id,
                    'user_id' => $user_id,
                    'rating' => rand(1,5),
                ];
            }
        }

        Rating::insert($ratings);
    }


}
