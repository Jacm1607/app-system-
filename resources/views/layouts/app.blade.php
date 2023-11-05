<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-white-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

        <!-- Page Content -->
        <div class="grid grid-cols-12 h-[880px]">
            <div class="col-span-2 p-8 flex flex-col space-y-6 border-r-[1px] border-gray-100">
                <a href="{{route('cliente.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg>
                    <span class="ml-2">Dashboard</span>
                </a>
                <a href="{{route('area.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg><span class="ml-2">Gestión de Areas</span></a>
                <a href="{{route('cliente.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg><span class="ml-2">Gestión de Clientes</span></a>
                <a href="{{route('persona.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg><span class="ml-2">Gestión de Personas</span></a>
                <a href="{{route('proveedor.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg><span class="ml-2">Gestión de Proveedor</span></a>
                <a href="{{route('producto.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg><span class="ml-2">Gestión de Productos</span></a>
                <a href="{{route('privilegio.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg><span class="ml-2">Gestión de Privilegios</span></a>
                <a href="{{route('servicio.index')}}" class="flex items-center p-2 border-[1px] border-gray-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="12 4 4 8 12 12 20 8 12 4" />
                        <polyline points="4 12 12 16 20 12" />
                        <polyline points="4 16 12 20 20 16" />
                    </svg><span class="ml-2">Gestión de Servicios</span></a>
            </div>
            <div class="col-span-10">
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
