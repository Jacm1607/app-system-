
<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Editar personal </h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('personal.update', $personal->id) }}" class="p-6">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-4 gap-8">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="id_persona">Persona</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="id_persona" id="id_persona">
                                    <option value="{{$personal->id_persona}}">{{$personal->persona->nombre}} {{$personal->persona->apellido}}</option>
                                </select>
                            </p>
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="id_servicio">Servicio</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="id_servicio" id="id_servicio">
                                    @if($personal->id_servicio == 0)
                                        <option value="0" hidden>SIN ASIGNAR</option>
                                        @forelse ($servicios as $servicio)
                                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                        @empty
                                            <option value="">SIN REGISTROS</option>
                                        @endforelse
                                    @else
                                        <option value="{{ $personal->id_servicio }}">{{ $personal->servicio->nombre }}</option>
                                        @forelse ($servicios as $servicio)
                                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                        @empty
                                            <option value="">SIN REGISTROS</option>
                                        @endforelse
                                    @endif
                                </select>
                            </p>
                            @error('id_servicio')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="id_area">Area</label>
                            </p>
                            <p>
                                <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="id_area" id="id_area">
                                    @if($personal->id_servicio == 0)
                                        <option value="0" hidden>SIN ASIGNAR</option>
                                    @else
                                     <option value="{{ $personal->id_area }}">{{ $personal->area->nombre }}</option>
                                    @endif
                                    @forelse ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @empty
                                        <option value="">SIN REGISTROS</option>
                                    @endforelse
                                </select>
                            </p>
                            @error('id_area')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-2">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('personal.index') }}">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
