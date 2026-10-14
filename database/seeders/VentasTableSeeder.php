<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venta;

class VentasTableSeeder extends Seeder
{
    public function run(): void
    {
        Venta::insert([
            ['vendedor_id' => 1, 'fecha_venta' => '2026-10-03', 'monto' => 750],
            ['vendedor_id' => 1, 'fecha_venta' => '2026-10-18', 'monto' => 950],

            ['vendedor_id' => 2, 'fecha_venta' => '2026-10-08', 'monto' => 420],
            ['vendedor_id' => 2, 'fecha_venta' => '2026-10-22', 'monto' => 1300],

            ['vendedor_id' => 3, 'fecha_venta' => '2026-10-11', 'monto' => 350],

            ['vendedor_id' => 4, 'fecha_venta' => '2026-10-14', 'monto' => 1050],
            ['vendedor_id' => 4, 'fecha_venta' => '2026-10-25', 'monto' => 680],
        ]);
    }
}
