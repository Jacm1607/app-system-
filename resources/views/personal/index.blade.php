<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="mb-6 w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Listas de Personal</h1>
                    </div>
                    <div class="flex justify-center w-full px-6">
                        <div class="w-1/2">
                            
                        </div>
                        <div class="w-1/2">
                            <form action="" method="get" class="w-full flex items-end">
                                <div class="w-full">
                                    <x-jet-input id="personal" class="block w-full h-[35px] text-black" type="text" name="personal" placeholder="Buscar por nombre"
                                        :value="old('personal')" autofocus />
                                </div>
                                <x-jet-button class="ml-4 p-2">
                                    Buscar
                                </x-jet-button>
                                <a class="inline-flex items-center px-4 py-2 w-[230px] bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition ml-4 p-2 text-center" href="{{route('personal.pdf')}}">Exportar PDF</a>
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
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Area</th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Servicio</th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($search)
                                                @forelse ($personales as $personal)
                                                    @if(!is_null($personal->personal) && !is_null($personal->personal->servicio))
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                            {{ $personal->nombre }} {{ $personal->apellido }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                            {{ $personal->personal->area->nombre }}</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                            {{ $personal->personal->servicio->nombre }}</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                            <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('personal.edit', $personal->id) }}"><i class="fa-solid fa-pencil"></i> Editar</a>
                                                            <a class="btn-eliminar p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('personal.delete', $personal->id) }}"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                                        </td>
                                                    </tr>
                                                     @endif
                                                @empty
                                                    <td colspan="4" class="px-6 py-4 text-black">
                                                        <center>Sin registros</center>
                                                    </td>
                                                @endforelse
                                           
                                        @else
                                            @forelse ($personales as $personal)
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        {{ $personal->persona->nombre }} {{ $personal->persona->apellido }}
                                                    </td>
                                                    <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        @if($personal->id_servicio == 0)
                                                            Sin asignar
                                                        @else
                                                        {{ $personal->area->nombre }}
                                                        @endif
                                                            </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        @if($personal->id_servicio == 0)
                                                            Sin asignar
                                                        @else
                                                        {{ $personal->servicio->nombre }}
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                        <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('personal.edit', $personal->id) }}"><i class="fa-solid fa-pencil"></i> Editar</a>
                                                        <a class="btn-eliminar p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('personal.delete', $personal->id) }}"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="4" class="px-6 py-4 text-black">
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
