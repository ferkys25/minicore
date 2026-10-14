<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Minicore Comisiones')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Encabezado --}}
    <header class="bg-indigo-700 shadow-lg">
        <div class="max-w-5xl mx-auto flex items-center py-4 px-6 space-x-4">
            <img src="{{ asset('images/udla.png') }}" alt="Logo UDLA" class="h-12">
            <h1 class="text-2xl font-bold text-white">
                @yield('title', 'Comisiones Vendedores — UDLA')
            </h1>
        </div>
    </header>

    {{-- Contenido principal --}}
    <main class="max-w-5xl mx-auto mt-8 px-6 flex-1">
        @yield('content')
    </main>

    {{-- Pie de página --}}
    <footer class="mt-12 pb-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} — Universidad de las Américas
    </footer>

</body>
</html>
