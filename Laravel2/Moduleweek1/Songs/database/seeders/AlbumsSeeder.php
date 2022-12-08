<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'name' => 'The Final Countdown',
            'year' => 1986,
            'times_sold' => 10000000,
            'band_id' => 1,
        ]);

        DB::table('albums')->insert([
            'name' => 'Hot Space',
            'year' => 1982,
            'times_sold' => 10000000,
            'band_id' => 2,
        ]);

        DB::table('albums')->insert([
            'name' => 'highway to hell',
            'year' => 1979,
            'times_sold' => 10000000,
            'band_id' => 3,
        ]);

        DB::table('albums')->insert([
            'name' => 'abbey road',
            'year' => 1969,
            'times_sold' => 10000000,
            'band_id' => 4,
        ]);

        DB::table('albums')->insert([
            'name' => 'Sure',
            'year' => 1986,
            'times_sold' => 10000000,
            'band_id' => 5,
        ]);

    }
}
