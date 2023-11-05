<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div class="mb-6">
                        <h1 class="text-2xl">Actualizar Producto</h1>
                        <hr>
                    </div>
                    <div class="">
                        <a class="py-2 px-4 bg-gray-700 text-white rounded-xl" href="{{ route('producto.index') }}">Atras</a>
                    </div>
                </div>
                <form method="POST" action="{{ route('producto.update', $producto->id) }}" class="forms-sample">
                    @csrf
                    @method('put')
                   <div class="grid grid-cols-4">
                        <div class=" col-span-1">
                            <p>
                                <label for="nombre_producto">Nombre</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl" id="nombre_producto" name="nombre" value="{{$producto->nombre}}" placeholder="Ingresa nombre">
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
