<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {!! Breadcrumbs::render('asignacion-agrupado', $asignacion) !!}
        </div>
    </div>

    {{-- Contenido --}}
    <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
        <div class="flex flex-row items-center mb-4">
            <strong class="inline-flex mr-10 flex-1" style="font-size: 26px; font-weight: 600">{{ $asignacion->agente->servicio->name }} - {{ $asignacion->agente->habilidad }}</strong>
        </div>
    </div>

    <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-2">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ejecutivo
                                </th>
                                <th scope="col" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Base
                                </th>
                                <th scope="col" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Completas
                                </th>
                                @foreach($estadosConversacion as $estado)
                                <th scope="col" class="text-center bg-blue-100 px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    {{ $estado->name }}
                                </th>
                                @endforeach
                                <th scope="col" class="relative px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($ejecutivosAgrupados as $nombre => $datos)
                            <tr class="bg-white hover:bg-gray-100 transition-all transition-duration: 50ms;">
                                <td class="px-6 py-1 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $nombre }}
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="text-center px-6 py-1 whitespace-nowrap">
                                    <div class="inline-block px-2 text-sm font-semibold rounded-full bg-gray-600 text-white">
                                        {{ $datos['base']  }}
                                    </div>
                                </td>
                                <td class="text-center px-6 py-1 whitespace-nowrap">
                                    <div class="inline-block px-2 text-sm font-semibold rounded-full bg-gray-600 text-white">
                                        {{ $datos['completas']  }}
                                    </div>
                                </td>
                                @foreach($estadosConversacion as $estado)
                                    <td class="text-center px-6 py-1 whitespace-nowrap">
                                        <div class="inline-block px-2 text-sm font-semibold rounded-full bg-blue-100 text-gray-800">
                                          {{ $datos[$estado->name] }}
                                        </div>
                                    </td>
                                @endforeach
                                <td class="px-2 py-1 whitespace-nowrap text-center text-sm font-medium">
                                    <label for="seleccionPeriodo" class="sr-only">Periodo</label>
                                    <a href="{{ route('asignacion.ejecutivo', [$asignacion->id, $nombre]) }}" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-600 bg-white border-blue-600 hover:bg-blue-700 hover:text-white transition-all ease-in-out duration-75">
                                        Ejecutivo
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More items... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
