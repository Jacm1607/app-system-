<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--<div class="flex justify-between">-->
                <!--    <div class="mb-6">-->
                <!--        <h1 class="text-2xl text-gray-700">Listas de Servicios</h1>-->
                <!--        <hr>-->
                <!--    </div>-->
                <!--    <div class="">-->
                <!--        <a class="p-2 bg-green-700 text-white rounded-xl uppercase text-xs font-bold" href="{{ route('servicio.create') }}">Crear servicio</a>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<form action="" method="get" class="w-full flex items-end">-->
                <!--    <div class="w-1/4">-->
                <!--        <x-jet-label for="servicio" value="Buscar" />-->
                <!--        <x-jet-input id="servicio" class="block mt-1 w-full" type="text" name="servicio" placeholder="Buscar por nombre"-->
                <!--            :value="old('servicio')" autofocus />-->
                <!--    </div>-->
                <!--    <x-jet-button class="ml-4 h-[40px]">-->
                <!--        Buscar-->
                <!--    </x-jet-button>-->
                <!--</form>-->
                <div class="">
                    <div class="mb-6 w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Listas de Servicios</h1>
                    </div>
                    <div class="flex justify-center w-full px-6">
                        <div class="w-1/2">
                            <a class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('servicio.create') }}">Crear
                                servicio</a>
                        </div>
                        <div class="w-1/2">
                            <form action="" method="get" class="w-full flex items-end">
                                <div class="w-full">
                                    <x-jet-input id="servicio" class="block w-full h-[35px] text-black" type="text" name="servicio" placeholder="Buscar por nombre"
                                        :value="old('servicio')" autofocus />
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
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Precio
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($servicios as $servicio)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">{{ $servicio->nombre }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">{{ $servicio->precio }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                    <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('servicio.edit', $servicio->id) }}"><i class="fa-solid fa-pencil"></i> Editar</a>
                                                    <a class="btn-eliminar p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('servicio.delete', $servicio->id) }}"><i class="fa-solid fa-trash"></i> Eliminar</a>
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
