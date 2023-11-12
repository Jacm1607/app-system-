<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div class="mb-6">
                        <h1 class="text-2xl dark:text-gray-700">Crear Persona</h1>
                        <hr>
                    </div>
                    <div class="">
                        <a class="py-2 px-4 bg-gray-700 text-white rounded-xl"
                            href="{{ route('persona.index') }}">Atras</a>
                    </div>
                </div>
                <form method="POST" action="{{ route('persona.store') }}" class="forms-sample">
                    @csrf
                    <div class="grid grid-cols-4 gap-8 mb-4">
                        <div class=" col-span-1">
                            <p>
                                <label class="dark:text-gray-700" for="nombre">Nombre</label>

                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl dark:text-gray-700" id="nombre" name="nombre"
                                    placeholder="Ingresa nombre">
                            </p>
                            @error('nombre')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class=" col-span-1">
                            <p>
                                <label class="dark:text-gray-700" for="apellido">Apellido</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl dark:text-gray-700" id="apellido" name="apellido"
                                    placeholder="Ingresa apellido">
                            </p>
                            @error('apellido')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="dark:text-gray-700" for="celular">Celular</label>
                            </p>
                            <p>
                                <input type="text" class="w-full rounded-xl dark:text-gray-700" id="celular" name="celular"
                                    placeholder="Ingresa celular">
                            </p>
                            @error('celular')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class=" col-span-1">
                            <p>
                                <label class="dark:text-gray-700" for="fecha">Fecha de Nacimiento</label>

                            </p>
                            <p>
                                <input type="date" class="w-full rounded-xl dark:text-gray-700" id="fecha" name="fecha_nac"
                                    placeholder="Ingresa fecha">
                            </p>
                            @error('fecha_nac')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
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
