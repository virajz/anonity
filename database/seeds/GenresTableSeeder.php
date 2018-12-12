<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'title' => 'Romantic',
            'slug' => 'romantic',
            'color' => '#ff1744',
        ]);
        DB::table('genres')->insert([
            'title' => 'Sci-fi',
            'slug' => 'sci-fi',
            'color' => '#4a148c',
        ]);
        DB::table('genres')->insert([
            'title' => 'Comedy',
            'slug' => 'comedy',
            'color' => '#04e361',
        ]);
        DB::table('genres')->insert([
            'title' => 'Rom Com',
            'slug' => 'rom-com',
            'color' => '#03a9f4',
        ]);
        DB::table('genres')->insert([
            'title' => 'Horror',
            'slug' => 'horror',
            'color' => '#607d8b',
        ]);
        DB::table('genres')->insert([
            'title' => 'Drama',
            'slug' => 'drama',
            'color' => '#ffc400',
        ]);
    }
}
