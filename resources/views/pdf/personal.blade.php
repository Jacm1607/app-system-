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
</style>
<body>
    <table>
        <tbody>
            <tr>
                <td style="vertical-align: middle;" class="h-16 w-16" rowspan="4"><img src="{{asset('img/logo.png')}}" alt="Logo de la empresa" style="height:40px"></td>
            </tr>
            <tr>
                <td class="text-xs">Fabiola Spa</td>
            </tr>
            <tr>
                <td class="text-xs">Av. Cañoto, sobre el 2do anillo</td>
            </tr>
            <tr>
                <td class="text-xs">+591 773 46 774</td>
            </tr>
            <tr>
                <td colspan="2" ></td>
            </tr>
            <tr>
                <td colspan="2" >{{$title}}</td>
            </tr>
        </tbody>
    </table>
  <div class="col-span-6">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
        <div class="py-2 inline-block min-w-full">
          <div class="overflow-hidden">
            <table class="min-w-full table-auto">
              <thead class="bg-gray-200 border-b">
                <tr>
                    <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">#</th>
                  <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">Nombre completo</th>
                  <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">Area</th>
                  <th scope="col" class="text-sm font-bold text-gray-900 border-2 px-4 text-left">Servicio</th>
                </tr>
              </thead>
              <tbody>
                @foreach($personales as $key => $personal)
                    
                    <tr>
                        <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        {{$key + 1}}
                      </td>
                      <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        {{$personal->persona->nombre}} {{$personal->persona->apellido}}
                      </td>
                      <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        {{$personal->servicio->nombre ?? 'Sin Area'}}
                      </td>
                     <td class="whitespace-nowrap text-sm font-normal border-2 px-4 text-gray-900">
                        {{$personal->servicio->nombre ?? 'Sin Servicio Asignado'}}
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