<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Crear persona</h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('persona.store') }}" class="p-6">
                    @csrf
                    <div class="grid grid-cols-10 gap-8 mb-4">
                        <div class=" col-span-2">
                            <p>
                                <label class="text-gray-700" for="nombre">Nombre</label>

                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="nombre" name="nombre"
                                    placeholder="Ingresa nombre">
                            </p>
                            @error('nombre')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class=" col-span-2">
                            <p>
                                <label class="text-gray-700" for="apellido">Apellido</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="apellido" name="apellido"
                                    placeholder="Ingresa apellido">
                            </p>
                            @error('apellido')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-2">
                            <p>
                                <label class="text-gray-700" for="celular">Celular</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="celular" name="celular"
                                    placeholder="Ingresa celular">
                            </p>
                            @error('celular')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class=" col-span-2">
                            <p>
                                <label class="text-gray-700" for="fecha">Fecha de Nacimiento</label>

                            </p>
                            <p>
                                <input type="date" class="w-full rounded-xl text-gray-700" id="fecha" name="fecha_nac"
                                    placeholder="Ingresa fecha">
                            </p>
                            @error('fecha_nac')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <p>
                                <label class="text-gray-700" for="idServicio">Servicio</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idServicio" id="idServicio">
                                    <option value="" hidden>Seleccione una opcion</option>
                                    @forelse ($servicios as $servicio)
                                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                            @error('idServicio')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-2">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('persona.index') }}">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
