<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Crear personal</h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('personal.store') }}" class="p-6">
                    @csrf
                    <div class="grid grid-cols-4 gap-8">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="idPersona">Persona</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idPersona" id="idPersona">
                                    <option value="{{ $persona->id }}">{{ $persona->nombre }}  {{ $persona->apellido }}</option>
                                </select>
                            </p>
                            @error('idPersona')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="idServicio">Servicio</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idServicio" id="idServicio">
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
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="idArea">Area</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idArea" id="idArea">
                                    @if($personal->idArea == 0)
                                        <option value="0" hidden>SIN ASIGNAR</option>
                                    @endif
                                    @forelse ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                            @error('idArea')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-2">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('cliente.index') }}">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
