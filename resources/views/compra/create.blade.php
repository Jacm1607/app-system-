<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Crear compra</h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('compra.store') }}" class="p-6">
                    @csrf
                    <input type="hidden" name="idUsuario" value="{{auth()->user()->id}}">
                    <div class="grid grid-cols-6 gap-8">
                        <div class="col-span-6">
                            <div class="flex justify-between">
                                <div class="w-1/3">
                                    <p>
                                        <label class="text-gray-700" for="idProveedor">Proveedor</label>
                                    </p>
                                    <p>
                                        <select class="w-full px-3 h-[45px] rounded-xl text-gray-700" name="idProveedor" id="idProveedor">
                                            <option value="" hidden>Seleccione una opcion</option>
                                            @forelse ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}</option>
                                            @empty
                                                <option value="">SIN REGISTROS</option>
                                            @endforelse
                                        </select>
                                    </p>
                                    @error('idProveedor')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>                                    
                                <div>
                                    <p>
                                        <label class="text-gray-700" for="fecha">Fecha</label>
                                    </p>
                                    @php
                                    date_default_timezone_set("America/La_Paz");
                                    @endphp
                                    <p>
                                        <input type="text" class="w-full rounded-xl text-gray-500 bg-gray-100 border-gray-200" id="fecha" name="fecha" value="{{now()->format('Y-m-d h:i:s')}}" readonly>
                                    </p>
                                    @error('fecha')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-span-6">
                            <span class="text-gray-700 text-lg font-bold">Detalle</span>
                            <div class="border-b-2 border-gray-500 w-full"></div>
                        </div>
                        <livewire:agregar-producto /> 
                    </div>
                    <livewire:tabla-detalle-compra />
                    <div class="flex justify-end mt-2">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('compra.index') }}">Cancelar</a>
                        <button id="miBoton" type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Guardar</button>
                    </div>
                    <script>
                    
                    </script>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
