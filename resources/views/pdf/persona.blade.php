<html>

<head>
  <title>Imprimir</title>
    <!-- Fonts -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">-->
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
td {
  height: 10px;
  vertical-align: middle;
}
body: {
    width:100%;
}
</style>
<body>
    <p class="text-center">{{$title}}</p>
    <table class="w-full">
        <tbody>
            <tr>
                <td width="50%">
                    <p><strong>Usuario:</strong> {{$user}}</p>    
                </td>
                <td style="vertical-align: middle;" class="h-16 w-16"><img src="{{asset('img/logo.png')}}" alt="Logo de la empresa" style="height:40px"></td>
                 <td>
                    <p class="text-xs">Fabiola Spa</p>
                    <p class="text-xs">Av. Cañoto, sobre el 2do anillo</p>
                    <p class="text-xs">+591 773 46 774</p>
                </td>
            </tr>
        </tbody>
    </table>
  <div style="width: 100%">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
        <div class="py-2 inline-block min-w-full">
          <div class="overflow-hidden">
            <table class="min-w-full table-auto">
              <thead class="bg-gray-200 border-b">
                <tr>
                    <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">#</th>
                  <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">Nombre completo</th>
                  <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">Tipo</th>
                  <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">Celular</th>
                  <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-center">Fecha de nacimiento</th>
                </tr>
              </thead>
              <tbody>
                @foreach($personas as $key => $persona)
                    <tr>
                        <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        {{$key + 1}}
                      </td>
                      <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        {{$persona->nombre}} {{$persona->apellido}}
                      </td>
                      <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        @if($persona->id_tipo_persona == 1)
                            Personal
                        @else
                            Cliente
                        @endif
                      </td>
                      <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        {{$persona->celular}}
                      </td>
                      <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900 space-x-4 text-center">
                        {{$persona->fecha_nac}}
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>