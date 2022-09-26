<div>
    <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <p class="font-bold p-4 bg-gray-200 text-gray-700">{{$asignacionfinal->agente->name}}</p>
                            <div class="p-2 flex items-start">
                              <div class="flex items-center h-5">
                                <input id="norecorridos" name="norecorridos" type="checkbox" wire:model="filtroNoRecorridos" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                              </div>
                              <div class="ml-3 text-sm">
                                <label for="norecorridos" class="font-medium text-gray-700">Filtra Agentes Recorridos</label>
                              </div>
                            </div>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ejecutivo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Base
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Chat en Blanco
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Chat Completo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Chat Descartado
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Ir</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($baseasignacions as $evaluacion)

                        <tr class="
                        @foreach($evaluacionescompletas as $evaluacioncompleta)
                            @if($evaluacioncompleta->rut_ejecutivo == $evaluacion->rut_ejecutivo)
                                bg-yellow-50
                                @if($filtroNoRecorridos == 1)
                                    hidden
                                @endif
                            @endif
                        @endforeach
                        ">

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$evaluacion->rut_ejecutivo}}</div>
                            </td>


                            @livewire('cuenta-ejecutivo', ['rutejecutivo' => $evaluacion->rut_ejecutivo, 'asignacionid' => $evaluacion->asignacion_id])

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('asignacions.ejecutivoevaluaciones', ['asignacionid'=>$evaluacion->asignacion_id, 'rutejecutivo'=>$evaluacion->rut_ejecutivo])}}" class="text-indigo-600 hover:text-indigo-900">Ir</a>
                            </td>

                        </tr>
                        @endforeach
                        <!-- More items... -->
                        </tbody>
                    </table>
                    <div class="px-3 py-2">{{ $baseasignacions->links() }}</div>
                </div>
            </div>
        </div>
    </div>

</div>
