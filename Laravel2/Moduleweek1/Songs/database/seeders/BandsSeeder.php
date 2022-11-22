<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            'name' => 'Europe',
            'genre' => 'Rock',
            'founded' => 2003,
            'active_till' => 'heden',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'AC/DC',
            'genre' => 'Rock',
            'founded' => 1264,
            'active_till' => 'heden',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'Metallica',
            'genre' => 'Metal',
            'founded' => 1264,
            'active_till' => 'heden',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'Queen',
            'genre' => 'Rock',
            'founded' => 1264,
            'active_till' => 'heden',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'The Beatles',
            'genre' => 'Rock',
            'founded' => 1264,
            'active_till' => 'heden',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
