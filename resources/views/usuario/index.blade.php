<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--<div class="flex justify-between">-->
                <!--    <div class="mb-6">-->
                <!--        <h1 class="text-2xl text-gray-700">Listas de Usuarios</h1>-->
                <!--        <hr>-->
                <!--    </div>-->
                <!--    <div class="">-->
                <!--        <a class="p-2 bg-green-700 text-white rounded-xl uppercase text-xs font-bold" href="{{ route('usuario.create') }}">Crear-->
                <!--            Usuario</a>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<form action="" method="get" class="w-full flex items-end">-->
                <!--    <div class="w-1/4">-->
                <!--        <x-jet-label for="email" value="Buscar" />-->
                <!--        <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" placeholder="Buscar por email"-->
                <!--            :value="old('email')" autofocus />-->
                <!--    </div>-->
                <!--    <x-jet-button class="ml-4 h-[40px]">-->
                <!--        Buscar-->
                <!--    </x-jet-button>-->
                <!--</form>-->
                <div class="">
                    <div class="mb-6 w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Listas de Usuarios</h1>
                    </div>
                    <div class="flex justify-center w-full px-6">
                        <div class="w-1/2">
                            <a class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('usuario.create') }}">Crear
                                usuario</a>
                        </div>
                        <div class="w-1/2">
                            <form action="" method="get" class="w-full flex items-end">
                                <div class="w-full">
                                    <x-jet-input id="email" class="block w-full h-[35px] text-black" type="text" name="email" placeholder="Buscar por email"
                                        :value="old('email')" autofocus />
                                </div>
                                <x-jet-button class="ml-4 p-2">
                                    Buscar
                                </x-jet-button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Nombre completo
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Email
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Estado
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Opciones
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($usuarios as $usuario)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{ $usuario->persona->nombre }} {{ $usuario->persona->apellido }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{ $usuario->email }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{ $usuario->estado ? 'ACTIVO': 'INACTIVO' }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                    <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('usuario.edit', $usuario->id) }}">✏ Editar</a>
                                                    <a class="p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('usuario.delete', $usuario->id) }}">🗑 Eliminar</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="4" class="px-6 py-4">
                                                <center>Sin registros</center>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
