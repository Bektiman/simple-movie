<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $categories =[

            'Action',
            'Adventure',
            'Animation',
            'Çomedy'
        ];

        foreach ($categories as $category){

            DB::table('categories')->insert(

                [
                    'name' => $category,
                    'slug' => Str::of($category)->slug('-'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
                );
        }


    }
}
