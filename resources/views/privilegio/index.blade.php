<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div class="mb-6">
                        <h1 class="text-2xl dark:text-gray-700">Listas de Privilegios</h1>
                        <hr>
                    </div>
                    <div class="">
                        <a class="p-2 bg-green-700 text-white rounded-xl uppercase text-xs font-bold" href="{{ route('privilegio.create') }}">Crear privilegio</a>
                    </div>
                </div>
                <form action="" method="get" class="w-full flex items-end">
                    <div class="w-1/4">
                        <x-jet-label for="privilegio" value="Buscar" />
                        <x-jet-input id="privilegio" class="block mt-1 w-full" type="text" name="privilegio" placeholder="Buscar por nombre"
                            :value="old('privilegio')" autofocus />
                    </div>
                    <x-jet-button class="ml-4 h-[40px]">
                        Buscar
                    </x-jet-button>
                </form>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-normal text-gray-900 px-6 py-4 text-left">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-normal text-gray-900 px-6 py-4 text-left">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($privilegios as $privilegio)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">{{ $privilegio->nombre }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                    <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('privilegio.edit', $privilegio->id) }}">✏ Editar</a>
                                                    <a class="p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('privilegio.delete', $privilegio->id) }}">🗑 Eliminar</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="2" class="px-6 py-4"><center>Sin registros</center></td>
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
