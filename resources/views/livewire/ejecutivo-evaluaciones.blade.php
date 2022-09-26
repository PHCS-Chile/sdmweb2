{{--
Plantilla: Ejecutivo-Evaluaciones
Versión 4
--}}
<div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">


        <p class="font-bold p-4 bg-gray-200 text-gray-700">{{$asignacionfinal->agente->name}} - {{$rutejecutivo}}</p>



        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID Evaluación
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <p>Estado</p>
                <div class="col-span-6 sm:col-span-3">

                    <select id="filtroEstado" name="filtroEstado" autocomplete="" wire:model="filtroEstado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="0">Todos</option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Evaluador
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <p>Chat</p>
                <div class="col-span-6 sm:col-span-3">

                    <select id="filtroChat" name="filtroChat" wire:model="filtroChat" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Todos</option>
                        <option>Con Chat</option>
                        <option>Sin Chat</option>
                    </select>
                </div>
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Fecha Chat
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 rounded-lg text-xs-sm focus:outline-none" type="search" name="search" placeholder="Móvil" wire:model="searchMovil">
              </div>
            </th>

            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ConnID
            </th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Ir</span>
            </th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">ICI</span>
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

        @foreach($evaluaciones as $evaluacion)

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
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      {{$evaluacion->id}}
                    </span>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ( $evaluacion->estado->id == 2) ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                      {{$evaluacion->estado->name}}
                    </span>

                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      {{$evaluacion->user_completa}}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($evaluacion->image_path)

                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>

                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$evaluacion->fecha_grabacion}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$evaluacion->movil}}</div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$evaluacion->connid}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{route('evaluacions.index', ['evaluacion_id'=>$evaluacion->id])}}" class="text-indigo-600 hover:text-indigo-900">Ir</a>
                </td>
                <td>
                    @if(Auth::user()->perfil  == 1)
                        @if($evaluacion->fecha_ici)
                        <form method="POST" action="{{ route('evaluacions.resetici', [$evaluacion->id]) }}" onsubmit="return confirm('¿Seguro quieres borrar la ICI? (Acción irreversible)');">
                        @method('DELETE')
                        @csrf
                            <button type="submit" class="btn btn-default">[ Eliminar ICI ]</button>
                        </form>
                        @else
                            <span><i class="text-gray-300">Sin ICI</i></span>
                        @endif
                    @endif
                </td>
            </tr>

        @endforeach

        <!-- More items... -->
        </tbody>
    </table>
</div>
