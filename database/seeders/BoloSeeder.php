<?php

namespace Database\Seeders;

use App\Models\Bolo;
use Illuminate\Database\Seeder;

class BoloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Criando o bolo";

       Bolo::factory()
           ->count(50)
           ->create();
    }
}
