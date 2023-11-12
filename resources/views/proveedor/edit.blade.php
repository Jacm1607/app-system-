

<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div class="mb-6">
                        <h1 class="text-2xl text-gray-700">Actualizar Proveedor</h1>
                        <hr>
                    </div>
                    <div class="">
                        <a class="py-2 px-4 bg-gray-700 text-white rounded-xl"
                            href="{{ route('proveedor.index') }}">Atras</a>
                    </div>
                </div>
                <form method="POST" action="{{ route('proveedor.update', $proveedor->id) }}" class="forms-sample">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-4 gap-8">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="idPersona">Persona</label>
                            </p>
                            <p>
                                <select class="w-full h-[45px] rounded-xl text-gray-700" name="idPersona" id="idPersona">
                                    <option value="{{$proveedor->idPersona}}">{{$proveedor->persona->nombre}} {{$proveedor->persona->apellido}}</option>
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
                                <label class="text-gray-700" for="razon_social">Razon Social</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="razon_social" name="razon_social" value="{{$proveedor->razon_social}}"
                                    placeholder="Ingresa razon social">
                            </p>
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="empresa">Empresa</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="empresa" name="empresa" value="{{$proveedor->empresa}}"
                                    placeholder="Ingresa empresa">
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
