<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Crear cliente</h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('cliente.store') }}" class="p-6">
                    @csrf
                    <div class="grid grid-cols-4 gap-8">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="idPersona">Persona</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idPersona" id="idPersona">
                                    @forelse ($personas as $persona)
                                        <option value="{{ $persona->id }}">{{ $persona->nombre }}
                                            {{ $persona->apellido }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                            @error('idPersona')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="recurrente">Cliente recurrente</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="recurrente" id="recurrente">
                                        <option value="0">NO</option> 
                                        <option value="1">SI</option>
                                </select>
                            </p>
                            @error('recurrente')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-2">
                            <p>
                                <label class="text-gray-700" for="nit">Fuente referencia</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="fuente_referencia" name="fuente_referencia"
                                    placeholder="Ingresa referencia" value="Ninguna">
                            </p>
                            @error('fuente_referencia')
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
