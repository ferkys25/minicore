<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendedor;

class VendedoresTableSeeder extends Seeder
{
    public function run(): void
    {
        Vendedor::insert([
            ['nombre' => 'Fernando Karolys',  'email' => 'fernando.karolys@udla.edu.ec'],
            ['nombre' => 'Pepito Perez',    'email' => 'pepito.perez@udla.edu.ec'],
            ['nombre' => 'Pablo Flores',    'email' => 'pablo.flores@udla.edu.ec'],
            ['nombre' => 'Deivy Molina',  'email' => 'deivy.molina@udla.edu.ec'],
        ]);
    }
}
