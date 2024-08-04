<div class="flex flex-col">
    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
        <div class="py-2 inline-block min-w-full">
            <div class="overflow-hidden">
                <table class="min-w-full" id="miTabla">
                    <thead class="bg-gray-200 border-b">
                        <tr>
                            <th scope="col"
                                class="text-sm font-bold text-gray-900 px-6 py-4 text-center">
                                Acción
                            </th>
                            <th scope="col"
                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Nombre
                            </th>
                            <th scope="col"
                                class="text-sm font-bold text-gray-900 px-6 py-4 text-center">Cantidad</th>
                            <th scope="col"
                                class="text-sm font-bold text-gray-900 px-6 py-4 text-center">Precio</th>
                            <th scope="col"
                                class="text-sm font-bold text-gray-900 px-6 py-4 text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                            <tr>
                                <td
                                    class="whitespace-nowrap text-sm font-normal text-gray-900 text-center w-[80px]">
                                        <button id="idAgregar{{$producto->id}}" wire:click="removerProducto({{ $producto->id }})" type="button" class="px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition p-2 text-center">X</button>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                    {{$producto->nombre}}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4 text-center">
                                    {{$producto->cantidad}}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4 text-center">
                                    <span>{{ $producto->precio_compra ?? 0 }}</span>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4 text-center">
                                    {{number_format($producto->subtotal, 2) }} Bs
                                </td>
                            </tr>
                        @empty
                            <td colspan="5" class="px-6 py-4">
                                <center><span class="text-black">Sin registros</span></center>
                            </td>
                        @endforelse
                        
                        @if($productos)
                            <tr>
                                <td colspan="4" class="px-6 text-right py-4">
                                    <span class="text-black">Total</span>
                                </td>
                                <td class="px-6 py-4">
                                    <center><span class="text-black font-bold">{{number_format($total, 2) }} Bs</span></center>
                                </td>
                            </tr>
                        @else
                            
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>