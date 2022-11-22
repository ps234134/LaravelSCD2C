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
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('albums')->insert([
            'name' => 'Hello',
            'year' => 1986,
            'times_sold' => 10000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('albums')->insert([
            'name' => 'Ok',
            'year' => 1986,
            'times_sold' => 10000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('albums')->insert([
            'name' => 'No',
            'year' => 1986,
            'times_sold' => 10000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('albums')->insert([
            'name' => 'Sure',
            'year' => 1986,
            'times_sold' => 10000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
