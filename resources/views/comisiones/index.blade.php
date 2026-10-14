@extends('layouts.app')

@section('title', 'Comisiones Vendedores — UDLA')

@section('content')
<div class="grid gap-6 grid-cols-1 lg:grid-cols-3">

    {{-- Columna 1: Formulario de cálculo y resultados --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Calcular Comisiones</h2>

        <form action="{{ route('comisiones.calcular') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio"
                       value="{{ old('fecha_inicio', $fecha_inicio ?? '') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('fecha_inicio')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha Fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin"
                       value="{{ old('fecha_fin', $fecha_fin ?? '') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('fecha_fin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md transition-colors">
                Filtrar y Calcular
            </button>
        </form>

        @isset($resultados)
            <div class="mt-6">
                <h3 class="font-medium mb-2">Resultados de {{ $fecha_inicio }} a {{ $fecha_fin }}</h3>
                <table class="table-auto w-full text-sm text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Vendedor</th>
                            <th class="py-2 text-right">Comisión Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($resultados as $nombre => $comision)
                            <tr class="border-b">
                                <td class="py-2">{{ $nombre }}</td>
                                <td class="py-2 text-right">${{ number_format($comision, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-2 text-center text-gray-500">
                                    No hay ventas en este rango.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endisset
    </div>

    {{-- v 2: Listado de vendedores --}}
    <div class="bg-white rounded-lg shadow p-6 overflow-x-auto">
        <h2 class="text-xl font-semibold mb-4">Listado de Vendedores</h2>
        <table class="table-auto w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-2">Nombre</th>
                    <th class="py-2">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendedores as $v)
                    <tr class="border-b">
                        <td class="py-2">{{ $v->nombre }}</td>
                        <td class="py-2">{{ $v->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Columna 3: Reglas de comisión --}}
    <div class="bg-white rounded-lg shadow p-6 overflow-x-auto">
        <h2 class="text-xl font-semibold mb-4">Reglas de Comisión</h2>
        <table class="table-auto w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-2">Umbral Monto</th>
                    <th class="py-2">Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reglas as $r)
                    <tr class="border-b">
                        <td class="py-2">{{ number_format($r->umbral_monto, 2) }}</td>
                        <td class="py-2">{{ ($r->porcentaje * 100) . '%' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
