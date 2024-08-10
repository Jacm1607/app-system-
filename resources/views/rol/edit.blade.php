<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Editar rol </h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('rol.update', $rol->id) }}" class="p-6">
                    @csrf
                    @method('put')
                   <div class="grid grid-cols-4 gap-4">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="nombre_rol">Nombre</label>
                            </p>
                            <p>
                          <input type="text" class="w-full rounded-xl text-gray-700" id="nombre_rol" name="nombre" value="{{$rol->nombre}}" placeholder="Ingresa nombre">
                            </p>
                        </div>
                        <div class=" col-span-3">
                            <p>
                                <label class="text-gray-700" for="id_privilegio">Privilegio</label>
                            </p>
                            <p>
                                <select class="w-full h-[45px] rounded-xl text-gray-700 select2"  name="id_privilegio[]" id="id_privilegio" multiple>
                                    @forelse ($privilegios as $privilegio)
                                        <option
                                        @foreach ($rol->privilegios as $priv)
                                            {{ $priv->id == $privilegio->id ? 'selected': ''}}
                                        @endforeach
                                        value="{{ $privilegio->id }}">{{ $privilegio->nombre }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                            @error('id_privilegio')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('rol.index') }}">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
