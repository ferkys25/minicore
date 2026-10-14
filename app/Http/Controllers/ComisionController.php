<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Venta;
use App\Models\Regla;

class ComisionController extends Controller
{
    /**
     * Muestra el panel principal de comisiones con la lista de
     * vendedores y las reglas de comisión configuradas.
     */
    public function index()
    {
        $vendedores = Vendedor::select('nombre', 'email')->get();
        $reglas     = Regla::orderBy('umbral_monto')->get();

        return view('comisiones.index', compact('vendedores', 'reglas'));
    }

    /**
     * Recibe un rango de fechas, filtra las ventas en ese período,
     * aplica la regla de comisión correspondiente a cada venta y
     * devuelve el total acumulado por vendedor.
     */
    public function calcular(Request $request)
    {
        $datos = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $ventas = Venta::with('vendedor')
            ->whereBetween('fecha_venta', [$datos['fecha_inicio'], $datos['fecha_fin']])
            ->get();

        $resultados = [];

        foreach ($ventas as $venta) {
            $regla = Regla::where('umbral_monto', '<=', $venta->monto)
                          ->orderByDesc('umbral_monto')
                          ->first();

            $porcentaje = $regla?->porcentaje ?? 0;
            $comision   = $venta->monto * $porcentaje;

            $nombre = $venta->vendedor->nombre;
            $resultados[$nombre] = ($resultados[$nombre] ?? 0) + $comision;
        }

        $vendedores = Vendedor::select('nombre', 'email')->get();
        $reglas     = Regla::orderBy('umbral_monto')->get();

        return view('comisiones.index', [
            'vendedores'   => $vendedores,
            'reglas'       => $reglas,
            'resultados'   => $resultados,
            'fecha_inicio' => $datos['fecha_inicio'],
            'fecha_fin'    => $datos['fecha_fin'],
        ]);
    }
}
