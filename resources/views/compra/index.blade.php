<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="mb-6 w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Listas de Compras</h1>
                    </div>
                    <div class="flex justify-center w-full px-6">
                        <div class="w-1/2">
                            <a class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('compra.create') }}">Crear
                                compra</a>
                        </div>
                        <div class="w-1/2">
                            <form action="" method="get" class="w-full flex items-end">
                                <div class="w-full">
                                    <x-jet-input id="compra" class="block w-full h-[35px] text-black" type="text" name="compra" placeholder="Buscar por número de compra"
                                        :value="old('compra')" autofocus />
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
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left"># Compra
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Proveedor</th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Fecha</th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($compras as $key => $compra)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{$compra->id}}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{$compra->proveedor->razon_social}}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{$compra->created_at}}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                    <a class="p-2 bg-blue-500 text-white rounded-xl" href="{{route('compra.show', $compra->id)}}"><i class="fa-solid fa-magnifying-glass"></i> Ver</a>
                                                    <a class="btn-eliminar p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('compra.delete', $compra->id) }}"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="4" class="px-6 py-4">
                                                <center><span class="text-black">Sin registros</span></center>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{$compras->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
