<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div class="mb-6">
                        <h1 class="text-2xl text-gray-700">Actualizar Rol</h1>
                        <hr>
                    </div>
                    <div class="">
                        <a class="py-2 px-4 bg-gray-700 text-white rounded-xl" href="{{ route('rol.index') }}">Atras</a>
                    </div>
                </div>
                <form method="POST" action="{{ route('rol.update', $rol->id) }}" class="forms-sample">
                    @csrf
                    @method('put')
                   <div class="grid grid-cols-4 gap-4">
                    <div class=" col-span-1">
                        <p>
                            <label class="text-gray-700" for="idPrivilegio">Privilegio</label>
                        </p>
                        <p>
                            <select class="w-full h-[45px] rounded-xl text-gray-700 select2"  name="idPrivilegio[]" id="idPrivilegio" multiple>
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
                        @error('idPrivilegio')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="nombre_rol">Nombre</label>
                            </p>
                            <p>
                          <input type="text" class="w-full rounded-xl text-gray-700" id="nombre_rol" name="nombre" value="{{$rol->nombre}}" placeholder="Ingresa nombre">
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 bg-green-700 text-white rounded-xl">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
