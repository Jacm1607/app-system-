
<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Editar usuario </h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('usuario.update', $usuario->id) }}" class="p-6">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-4 gap-8">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="idPersona">Persona</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idPersona" id="idPersona">
                                    <option value="{{$usuario->idPersona}}">{{$usuario->persona->nombre}} {{$usuario->persona->apellido}}</option>
                                    @forelse ($personas as $persona)
                                        <option value="{{ $persona->id }}">{{ $persona->nombre }}
                                            {{ $persona->apellido }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="email">Email</label>

                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="email" name="email" value="{{$usuario->email}}"
                                    placeholder="Ingresa email">
                            </p>
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="idRol">Rol</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idRol" id="idRol">
                                    <option value="{{$usuario->idRol}}">{{$usuario->rol->nombre}}</option>
                                    @forelse ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('usuario.index') }}">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
