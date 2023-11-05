<x-app-layout>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div class="mb-6">
                        <h1 class="text-2xl">Listas de Clientes</h1>
                        <hr>
                    </div>
                    <div class="">
                        <a class="p-2 bg-green-700 text-white rounded-xl uppercase text-xs font-bold" href="{{ route('cliente.create') }}">Crear cliente</a>
                    </div>
                </div>
                <form action="" method="get" class="w-full flex items-end">
                    <div class="w-1/4">
                        <x-jet-label for="cliente" value="Buscar" />
                        <x-jet-input id="cliente" class="block mt-1 w-full" type="text" name="cliente" placeholder="Buscar por razon social"
                            :value="old('cliente')" autofocus />
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
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nombre
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Razon
                                                Social</th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">NIT</th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($clientes as $cliente)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $cliente->persona->nombre }} {{ $cliente->persona->apellido }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $cliente->razon_social }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $cliente->nit }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 space-x-4">
                                                    <a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a>
                                                    <a href="{{ route('cliente.delete', $cliente->id) }}">Eliminar</a>
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
