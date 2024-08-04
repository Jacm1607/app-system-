<div class="col-span-6 grid grid-cols-6 gap-8">
    <div class="col-span-2">
        <p>
            <label class="text-gray-700" for="idProductos">Productos</label>
        </p>
        <p>
            <select wire:model="idProducto" class="w-full px-3 h-[45px] rounded-xl text-gray-700">
                <option {{ $buttonDisabled ? '' : 'selected' }} hidden>Seleccione una opcion</option>
                @forelse ($productos as $producto)
                   <option value="{{ $producto->id }}">{{ $producto->nombre }} - {{ $producto->precio_compra }} Bs.</option>
                @empty
                    <option value="">SIN REGISTROS</option>
                @endforelse
            </select>
        </p>
        <span>&nbsp;</span>
    </div>
    <div class="col-span-1">
        <p>
            <label class="text-gray-700" for="cantidad">Cantidad</label>
        </p>
        <p>
            <input type="number" wire:model="cantidad" class="w-full rounded-xl text-gray-700" value="{{$cantidad}}">
        </p>
        @error('cantidad') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="col-span-1 flex items-center">
        <p>
            <label class="text-gray-700" for="cantidad">&nbsp;</label>
        </p>
        <p>
            <button {{ $buttonDisabled ? 'disabled' : '' }} wire:click="save" type="button" class="px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 mb-1 w-full text-center"><span class="text-base font-bold">+</span> Agregar</button>
        </p>
    </div>
</div>