<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Crear rol</h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('rol.store') }}" class="p-6">
                    @csrf
                   <div class="grid grid-cols-4 gap-4">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="nombre_rol">Nombre</label>
                            </p>
                            <p>
                          <input type="text" class="w-full rounded-xl text-gray-700" id="nombre_rol" name="nombre" placeholder="Ingresa nombre">
                            </p>
                         @error('nombre')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-3">
                            <p>
                                <label class="text-gray-700" for="idPrivilegio">Privilegio</label>
                            </p>
                            <p>
                                <select class="w-full h-[55px] rounded-xl text-gray-700 select2"  name="idPrivilegio[]" id="idPrivilegio" multiple>
                                    @forelse ($privilegios as $privilegio)
                                        <option value="{{ $privilegio->id }}">{{ $privilegio->nombre }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                            @error('idPrivilegio')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('rol.index') }}">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
