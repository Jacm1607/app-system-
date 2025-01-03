<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="mb-6 w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Listas de Personas</h1>
                    </div>
                    <div class="flex justify-center w-full px-6">
                        <div class="w-1/2">
                            <a class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('persona.create') }}">Crear
                                persona</a>
                        </div>
                        <div class="w-1/2">
                            <form action="" method="get" class="w-full flex items-end">
                                <div class="w-full">
                                    <x-jet-input id="persona" class="block w-full h-[35px] text-black" type="text" name="persona" placeholder="Buscar por nombre"
                                        :value="old('persona')" autofocus />
                                </div>
                                <x-jet-button class="ml-4 p-2">
                                    Buscar
                                </x-jet-button>
                                <a class="inline-flex items-center px-4 py-2 w-[320px] bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition ml-4 p-2 text-center" href="{{route('persona.pdf')}}">Exportar PDF</a>
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
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Tipo asignado
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Celular
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Fecha
                                                Nacimiento</th>
                                            <th scope="col"
                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Opciones
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($personas as $persona)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{ $persona->nombre }} {{ $persona->apellido }}</td>
                                                <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                {{ $persona->tipo->nombre }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{ $persona->celular }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{ $persona->fecha_nac }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4">
                                                    <a class="p-2 bg-yellow-500 text-black rounded-xl" href="{{ route('persona.edit', $persona->id) }}"><i class="fa-solid fa-pencil"></i> Editar</a>
                                                    <a class="btn-eliminar p-2 bg-red-200 text-red-700 rounded-xl" href="{{ route('persona.delete', $persona->id) }}"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="4" class="px-6 py-4">
                                                <center>Sin registros</center>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                                @if(!request()->has('persona'))
                                    {{$personas->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
