<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Rank::create(['name' => 'Banni', 'level' => 0]);
        \App\Rank::create(['name' => 'Inactif', 'level' => 1]);
        \App\Rank::create(['name' => 'Actif', 'level' => 2]);
        \App\Rank::create(['name' => 'Modo', 'level' => 3]);
        \App\Rank::create(['name' => 'Admin', 'level' => 4]);
        \App\Rank::create(['name' => 'S. Admin', 'level' => 5]);
    }
}
