<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Regla;

class ReglasTableSeeder extends Seeder
{
    public function run(): void
    {
        Regla::insert([
            ['porcentaje' => 0.00, 'umbral_monto' => 0],
            ['porcentaje' => 0.05, 'umbral_monto' => 400],
            ['porcentaje' => 0.08, 'umbral_monto' => 700],
            ['porcentaje' => 0.12, 'umbral_monto' => 900],
            ['porcentaje' => 0.15, 'umbral_monto' => 1200],
        ]);
    }
}
