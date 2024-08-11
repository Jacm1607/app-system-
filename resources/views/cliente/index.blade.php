<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="mb-6 w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Listas de Clientes</h1>
                    </div>
                    <div class="flex justify-center w-full px-6">
                        <div class="w-1/2">
                           
                        </div>
                        <div class="w-1/2">
                            <form action="" method="get" class="w-full flex items-end">
                                <div class="w-full">
                                    <x-jet-input id="cliente" class="block w-full h-[35px] text-black" type="text" name="cliente" placeholder="Buscar por nombre"
                                        :value="old('cliente')" autofocus />
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
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Nombre
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Cliente recurrente</th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Fuente referencia</th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($search)
                                            @forelse ($clientes as $cliente)
                                                @if(!is_null($cliente->cliente))
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                            {{ $cliente->nombre }} {{ $cliente->apellido }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                            {{ $cliente->cliente->recurrente ? 'SI' : 'NO' }}</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                            {{ $cliente->cliente->fuente_referencia }}</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                            <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('cliente.edit', $cliente->cliente->id) }}"><i class="fa-solid fa-pencil"></i> Editar</a>
                                                            <a class="btn-eliminar p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('cliente.delete', $cliente->cliente->id) }}"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @empty
                                                <td colspan="4" class="px-6 py-4">
                                                    <center>Sin registros</center>
                                                </td>
                                            @endforelse
                                        @else
                                            @forelse ($clientes as $cliente)
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        {{ $cliente->persona->nombre }} {{ $cliente->persona->apellido }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        {{ $cliente->recurrente ? 'SI' : 'NO' }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        {{ $cliente->fuente_referencia }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                        <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('cliente.edit', $cliente->id) }}"><i class="fa-solid fa-pencil"></i> Editar</a>
                                                        <a class="btn-eliminar p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('cliente.delete', $cliente->id) }}"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="4" class="px-6 py-4">
                                                    <center>Sin registros</center>
                                                </td>
                                            @endforelse
                                        @endif
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
