<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'title' => 'The Final Countdown',
            'singer' => 'Europe',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('songs')->insert([
            'title' => 'Love Chaser',
            'singer' => 'Europe',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('songs')->insert([
            'title' => 'Dancer',
            'singer' => 'Queen',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('songs')->insert([
            'title' => 'highway to hell',
            'singer' => 'AC/DC',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('songs')->insert([
            'title' => 'come together',
            'singer' => 'the Beatles',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
