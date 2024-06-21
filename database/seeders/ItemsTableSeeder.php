<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['name' => 'Auto\'s'],
            ['name' => 'Verrekijkers'],
            ['name' => 'Toetsenborden'],
            ['name' => 'Fietsen'],
            ['name' => 'Laptops'],
            ['name' => 'Mobiele telefoons'],
            ['name' => 'Boeken'],
            ['name' => 'Kleding'],
            ['name' => 'Meubels'],
            ['name' => 'Keukengerei'],
        ]);
    }
}

