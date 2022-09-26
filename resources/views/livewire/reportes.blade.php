{{--
Plantilla: livewire/reportes
Versión 1
--}}

<div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="px-8">
            <div class="mb-4 inline-block float-right">
                <label for="pagination">Mostrar</label>
                <select id="pagination" name="pagination" autocomplete="" wire:model="pagination" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="25">25 Resultados</option>
                    <option value="50">50 Resultados</option>
                    <option value="100">100 Resultados</option>
                </select>
            </div>

            <div class="mr-5 mt-6 float-right mb-4 inline-block">
                <button type="submit"  wire:click="crearPDF" class="flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 2xl:group-hover:bg-red-700 focus:outline-none">
                    <!-- Heroicon name: check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Crear PDFs
                </button>
            </div>

            <div class="mb-4 inline-block">
                <label for="filtroPeriodo">Periodo</label>
                <select id="filtroPeriodo" name="filtroPeriodo" autocomplete="" wire:model="filtroPeriodo" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="0">Todos</option>
                    @foreach($periodos as $periodo)
                        <option value="{{$periodo->id}}">{{$periodo->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 inline-block">
                <label for="filtroMercado">Mercado</label>
                <select id="filtroMercado" name="filtroMercado" autocomplete="" wire:model="filtroMercado" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="0">Todos</option>
                    <option value="Hogar">Hogar</option>
                    <option value="Movil">Movil</option>
                    <option value="Temp">Temp</option>
                </select>
            </div>

            <div class="mb-4 inline-block">
                <label for="filtroEstudio">Estudio</label>
                <select id="filtroEstudio" name="filtroEstudio" autocomplete="" wire:model="filtroEstudio" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="0">Todos</option>
                    @foreach($estudios as $estudio)
                        <option value="{{$estudio->id}}">{{$estudio->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 inline-block">
                <label for="filtroServicio">Servicio</label>
                <select id="filtroServicio" name="filtroServicio" autocomplete="" wire:model="filtroServicio" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="0">Todos</option>
                    @foreach($servicios as $servicio)
                        <option value="{{$servicio->id}}">{{$servicio->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">


            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-1 py-1">
                            <label class="" for="todo">
                                <input class="form-checkbox rounded" id="todo" type="checkbox" wire:ignore wire:click="marcarTodo" wire:model.defer="marcarTodo">
                                <span class="ml-2 sr-only">Marcar todo</span>
                            </label>


                        </th>
                        <th scope="col" class="pl-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Id
                        </th>
                        <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Agente
                        </th>
                        <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Reporte
                        </th>
                        <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha conversación
                        </th>
                        <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Móvil
                        </th>
                        <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha evaluación
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($evaluaciones as $index => $evaluacion)
                        <tr>
                            <td class="pl-3 pr-1 py-1 whitespace-nowrap text-right">
                                <label for="evaluacion_{{ $evaluacion->id }}" class="sr-only">Marcar</label>
                                <input class="rounded" id="evaluacion_{{ $evaluacion->id }}" type="checkbox" wire:model.defer="evaluacionesSeleccionadas.{{ $index }}" value="{{ $evaluacion->id }}">
                            </td>
                            <td class="pl-3 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $evaluacion->id }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $evaluacion->asignacion->agente->name }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $evaluacion->estado->name }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if ($estado = $estados->firstWhere('id', $evaluacion->estado_reporte))
                                    {{ $estado }}
                                    @else
                                    -
                                    @endif
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $evaluacion->fecha_grabacion }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $evaluacion->movil }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $evaluacion->fecha_completa }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <!-- More items... -->
                    </tbody>
                </table>
                <div class="mx-2">{{ $evaluaciones->links('vendor.livewire.tailwind') }}</div>
            </div>
        </div>
    </div>
</div>

