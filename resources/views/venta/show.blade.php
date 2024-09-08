<x-app-layout>
    <div class="py-4">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    <div class="w-full bg-gray-200 text-black text-center p-2">
                        <h1 class="text-2xl text-gray-700">Detalle de venta</h1>
                    </div>
                </div>
                <!--<form method="POST" action="{{ route('venta.store') }}" class="p-6">-->
                <!--    @csrf-->
                    <div class="m-6">
                        <div class="" >
                            <div class="grid grid-cols-6 gap-8">
                                <div class="col-span-6 md:col-span-2">
                                    <p>
                                        <label class="text-gray-700" for="Cliente">Cliente</label>
                                    </p>
                                    <p>
                                        <input type="text" class="w-full rounded-xl text-gray-700" value="{{$venta->cliente->persona->nombre}} {{$venta->cliente->persona->apellido}}" disabled>
                                    </p>
                                </div>      
                                <div class="col-span-6 md:col-span-2">
                                    <p>
                                        <label class="text-gray-700" for="Cliente">Usuario</label>
                                    </p>
                                    <p>
                                        <input type="text" class="w-full rounded-xl text-gray-700" value="{{auth()->user()->persona->nombre}} {{auth()->user()->persona->apellido}}" disabled>
                                    </p>
                                </div>    
                                <div class="col-span-6 md:col-span-2">
                                    <p>
                                        <label class="text-gray-700" for="fecha">Fecha</label>
                                    </p>
                                    <p>
                                        <input type="text" class="w-full rounded-xl text-gray-500 bg-gray-100 border-gray-200" value="{{ $venta->created_at }}" disabled>
                                    </p>
                                </div>
                            </div>
                            <div class=" col-span-6 mt-8">
                                <span class="text-gray-700 text-lg font-bold">Detalle</span>
                                <div class="border-b-2 border-gray-500 w-full"></div>
                            </div>
                            
                            <div class="col-span-6" id="contenidoAImprimir">
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                        <div class="py-2 inline-block min-w-full">
                                            <div class="overflow-hidden">
                                                <table class="min-w-full">
                                                    <thead class="bg-gray-200 border-b">
                                                        <tr>
                                                            <th scope="col"
                                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Nombre
                                                            </th>
                                                            <th scope="col"
                                                                class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Personal asignado
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
                                                        @php
                                                        $total = 0;
                                                        @endphp
                                                        @foreach ($detalles as $detalle)
                                                            @php
                                                             $total += $detalle->precio * $detalle->cantidad
                                                            @endphp
                                                            <tr>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                                    {{$detalle->nombre}}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                                    {{$detalle->personal}}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4 text-center">
                                                                    {{$detalle->cantidad}}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4 text-center">
                                                                    <span>{{ $detalle->precio }}</span>
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900 space-x-4 text-center">
                                                                    {{number_format($detalle->precio * $detalle->cantidad, 2) }} Bs
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                            <tr>
                                                                <td colspan="4" class="px-6 text-right py-4">
                                                                    <span class="text-black">Total</span>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <center><span class="text-black font-bold">{{number_format($total, 2) }} Bs</span></center>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-2 mx-6 mb-6">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 p-2" href="{{ route('venta.index') }}">Cancelar</a>
                        <button onclick="imprimirContenido()" type="button" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4 p-2">Imprimir</button>
                        <script>
                            function imprimirContenido() {
                                var contenido = document.getElementById('contenidoAImprimir').innerHTML;
                                var ventanaImpresion = window.open('', '_blank');
                                ventanaImpresion.document.write('<html><head><title>Imprimir</title>');
                                ventanaImpresion.document.write('<style>table {border-collapse: collapse;width: 100%;} th, td {border: 1px solid #ddd;padding: 8px;text-align: left;} th {background-color: #f2f2f2;}</style>');
                                ventanaImpresion.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"><script>window.onload = function() { window.print() }<\/script></head><body><div class="w-full text-center font-bold text-lg">Recibo de Venta</div><div class="flex items-center justify-between p-4 bg-gray-100"><img src="{{asset("img/logo.png")}}" alt="Logo de la empresa" class="h-16"><div class="ml-4"><p class="text-lg font-bold">Fabiola Spa</p><p>Av. Cañoto, sobre el 2do anillo</p><p>+591 773 46 774</p></div></div>');
                                ventanaImpresion.document.write('<div class=""><table border="0"><tr><td><strong>Cliente</strong></td><td><strong>Usuario</strong></td><td><strong>Fecha</strong></td></tr><tr><td>{{$venta->cliente->persona->nombre}} {{$venta->cliente->persona->apellido}}</td><td>{{auth()->user()->persona->nombre}} {{auth()->user()->persona->apellido}}</td><td>{{ $venta->created_at }}</td></tr></table></div>');
                                ventanaImpresion.document.write(contenido);
                                ventanaImpresion.document.write('</body></html>');
                                ventanaImpresion.document.close();
                                // ventanaImpresion.print();
                            }
                        </script>
                    </div>
                <!--</form>-->
            </div>
        </div>
    </div>
</x-app-layout>
