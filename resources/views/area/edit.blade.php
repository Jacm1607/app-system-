<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div class="mb-6">
                        <h1 class="text-2xl text-gray-700">Actualizar Area</h1>
                        <hr>
                    </div>
                    <div class="">
                        <a class="py-2 px-4 bg-gray-700 text-white rounded-xl"
                            href="{{ route('area.index') }}">Atras</a>
                    </div>
                </div>
                <form method="POST" action="{{ route('area.update', $area->id) }}" class="forms-sample">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-4">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="nombre_area">Nombre</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl text-gray-700" id="nombre_area" name="nombre"  value="{{$area->nombre}}"
                                    placeholder="Ingresa nombre">

                            </p>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 bg-green-700 text-white rounded-xl">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
