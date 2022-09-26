{{--
Plantilla: Ejecutivo-Evaluaciones Call Voz
Versión 4
--}}
<div>

    <script src="{{ asset('js/clipboard.js') }}" type="text/javascript"></script>
{{--    @if($asignacionfinal->estudio_id == 5 || $asignacionfinal->estudio_id == 4)--}}
{{--        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">--}}
{{--        <script src="https://unpkg.com/js-datepicker"></script>--}}
{{--    @endif--}}
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">


        <p class="font-bold p-4 bg-gray-200 text-gray-700">{{$asignacionfinal->agente->name}}</p>



        <tr>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                &nbsp;<br>ID
            </th>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <p>Estado</p>
                <div class="col-span-6 sm:col-span-3">

                    <select id="filtroEstado" name="filtroEstado" autocomplete="" wire:model="filtroEstado" class="pr-6 mt-1 block py-1 pl-1 border border-gray-300 text-xs bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="0" class="">Todos</option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>
            </th>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                &nbsp;<br>Evaluador
            </th>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <label for="filtroEstadoGrabacion">Grabación</label>
                <select id="filtroEstadoGrabacion" name="filtroEstadoGrabacion" autocomplete="" wire:model="filtroEstadoGrabacion" class="mt-1 block w-full py-1 pl-1 pr-6 text-xs border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="0">Todos</option>
                    @foreach($grabacionestados as $estado)
                        <option value="{{$estado->id}}">{{$estado->name}}</option>
                    @endforeach
                </select>
            </th>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-tighter">
                <label for="filtroFecha" class="block text-transparent select-none">Fecha Grabación</label>
                <input id="filtroFecha" class="border border-gray-300 bg-white py-1 px-1 mt-1 rounded-lg text-xs focus:outline-none" placeholder="Fecha Grabación" wire:model="filtroFecha">
            </th>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-tighter">
                <label for="searchMovil" class="block text-transparent select-none">Móvil</label>
                <input id="searchMovil" class="w-28 border border-gray-300 bg-white py-1 px-1 mt-1 rounded-lg focus:outline-none" placeholder="Móvil" wire:model="searchMovil">
            </th>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-tighter">
                <label for="filtroConnid" class="block text-transparent select-none">ConnID</label>
                <input id="filtroConnid" class="block border border-gray-300 bg-white py-1 px-1 mt-1 rounded-lg text-xs focus:outline-none" placeholder="ConnID" wire:model="filtroConnid">
            </th>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <label for="filtroEjecutivo" class="">Ejecutivo</label>
                <select id="filtroEjecutivo" name="filtroEjecutivo" autocomplete="" wire:model="filtroEjecutivo" class="mt-1 block w-full py-1 pl-1 pr-6 text-xs border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Todos">Todos</option>
                    @foreach($ejecutivos as $ejecutivo)
                        <option value="{{ $ejecutivo }}">{{ $ejecutivo }}</option>
                    @endforeach
                </select>
            </th>
            <th scope="col" class="text-center px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                &nbsp;<br>ACCIONES
            </th>
            @if (Auth::user()->perfil == 1 && ($estudio == 4 || $estudio == 5))
            <th scope="col" class="text-center px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                &nbsp;<br>SUPERVISIÓN
            </th>
            @endif
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

        @foreach($evaluaciones as $evaluacion)

            <tr id="fila_{{ $evaluacion->id }}" class="hover:bg-gray-50">
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      {{$evaluacion->id}} - {{$evaluacion->tipo_gestion}}
                    </span>
                </td>
                <td class="px-3 py-1 whitespace-nowrap">
                    @if($evaluacion->fecha_grabacion == NULL || $evaluacion->connid == NULL || $evaluacion->movil == NULL)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                          Faltan datos
                        </span>
                    @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ( $evaluacion->estado->id == 2) ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                      {{$evaluacion->estado->name}}
                    </span>
                    @endif
                </td>
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      {{$evaluacion->user_completa}}
                    </span>
                </td>
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($evaluacion->estado_conversacion == 8) bg-green-100 text-green-800 @elseif(in_array($evaluacion->estado_conversacion, [9, 14, 15, 16])) bg-yellow-100 text-yellow-800 @else bg-gray-100 text-gray-800 @endif">
                      {{$grabacionestados->firstWhere('id', $evaluacion->estado_conversacion)->name}}
                    </span>

                </td>
                <td class="px-3 py-1 whitespace-nowrap">
                    @if($evaluacion->fecha_grabacion == NULL)
                        <button id="ctc_fechagrabacion_{{ $evaluacion->id }}_boton" class="flex items-center text-sm text-yellow-500 bg-yellow-100 hover:bg-yellow-200 rounded-xl p-1 pr-2 shadow-md transition-all focus: border-transparent">
                            <!-- Heroicon name: currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                             <span class="text-gray-500">Por completar</span>
                        </button>
                    @else
                        <input id="ctc_fecha_{{ $evaluacion->id }}" value="{{$evaluacion->fecha_grabacion}}" class="sr-only">
                        <button class="ctc flex items-center text-sm text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl p-1 shadow-md transition-all focus: border-transparent" data-clipboard-target="#ctc_fecha_{{ $evaluacion->id }}" onclick="CopyToClipboard('ctc_fecha_{{ $evaluacion->id }}')">
                            <!-- Heroicon name: currency-dollar -->
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentC   olor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <span id="ctc_fecha_{{ $evaluacion->id }}" class="text-gray-500">{{date('d-m-Y H:i', strtotime($evaluacion->fecha_grabacion))}}</span>
                        </button>
                        <div id="ctc_fecha_{{ $evaluacion->id }}_alert" class="transition duration-350 ease-in-out hidden shadow-md rounded-md flex fixed items-center bg-green-500 text-white text-sm px-3 py-3" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            <p>Fecha copiada al portapapeles.</p>
                        </div>
                    @endif

                </td>
                <td class="px-3 py-1 whitespace-nowrap">
                    @if($evaluacion->movil == NULL)
                        <button class="flex items-center text-sm text-yellow-500 bg-yellow-100 hover:bg-yellow-200 rounded-xl p-1 pr-2 shadow-md transition-all focus: border-transparent">
                            <!-- Heroicon name: currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-500">Por completar</span>
                        </button>
                    @else
                        <input id="ctc_movil_{{ $evaluacion->id }}" value="{{$evaluacion->movil}}" class="sr-only">
                        <button id="ctc_movil_{{ $evaluacion->id }}_boton" class="ctc flex items-center text-sm text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl p-1 shadow-md transition-all focus: border-transparent" data-clipboard-target="#ctc_movil_{{ $evaluacion->id }}" onclick="CopyToClipboard('ctc_movil_{{ $evaluacion->id }}')">
                            <!-- Heroicon name: currency-dollar -->
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <span id="ctc_movil_{{ $evaluacion->id }}" class="text-gray-500">{{$evaluacion->movil}}</span>
                        </button>
                        <div id="ctc_movil_{{ $evaluacion->id }}_alert" class="transition duration-350 ease-in-out hidden shadow-md rounded-md flex fixed items-center bg-green-500 text-white text-sm px-3 py-3" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            <p>Móvil copiado al portapapeles.</p>
                        </div>
                    @endif
                </td>

                <td class="px-3 py-1 whitespace-nowrap text-center">
                    @if($evaluacion->connid == NULL)
                        <button class="text-center flex items-center text-sm text-yellow-500 bg-yellow-100 hover:bg-yellow-200 rounded-xl p-1 pr-2 shadow-md transition-all focus: border-transparent">
                            <!-- Heroicon name: currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-500">Por completar</span>
                        </button>
                    @else
                        <input id="ctc_connid_{{ $evaluacion->id }}" value="{{$evaluacion->connid}}" class="sr-only">
                        <button id="ctc_connid_{{ $evaluacion->id }}_boton" class="ctc flex items-center text-sm text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl p-1 shadow-md transition-all focus: border-transparent" data-clipboard-target="#ctc_connid_{{ $evaluacion->id }}" onclick="CopyToClipboard('ctc_connid_{{ $evaluacion->id }}')">
                            <!-- Heroicon name: currency-dollar -->
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd" />
                                <path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                            </svg>
                            <span id="ctc_connid_{{ $evaluacion->id }}" class="text-gray-500">{{Str::limit($evaluacion->connid,15)}}</span>
                        </button>

                        <div id="ctc_connid_{{ $evaluacion->id }}_alert" class="transition duration-350 ease-in-out hidden shadow-md rounded-md flex fixed items-center bg-green-500 text-white text-sm px-3 py-3" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            <p>ConnID copiado al portapapeles.</p>
                        </div>
                    @endif
                </td>
                <td class="px-3 py-1 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      {{$evaluacion->nombre_ejecutivo}}
                    </span>
                </td>
                <td class="px-3 py-1 whitespace-nowrap text-right text-sm font-medium">
                    @if($evaluacion->fecha_grabacion == NULL || $evaluacion->connid == NULL || $evaluacion->movil == NULL)
                        <button  wire:click.prevent="render" wire:click="abrirModalCompletar('completar', {{ $evaluacion->id }})" class="text-xs inline-flex items-center py-1.5 px-2 mx-2 my-0.5 transition-colors duration-150 text-blue-700 bg-gray-50 border border-blue-700 hover:bg-blue-700 hover:text-white rounded focus:shadow-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Completar
                        </button>
                    @else
                        <a class="text-xs inline-flex items-center py-1.5 px-2 mx-0.5 my-0.5 transition-colors duration-150 text-white bg-green-600 border border-green-700 hover:bg-green-700 hover:text-white rounded focus:shadow-outline " href="{{ route('evaluacions.index', ['evaluacion_id'=>$evaluacion->id])}}" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Ver
                        </a>
                        <button wire:click.prevent="render" wire:click="abrirModalCompletar('reportar_grabacion', {{ $evaluacion->id }})" class="font-bold modal-open text-xs inline-flex items-center py-1.5 px-2 mx-0.5 my-0.5 transition-colors duration-150 text-red-700 bg-gray-50 border border-red-700 hover:bg-red-700 hover:text-white rounded focus:shadow-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                        </button>
                    @endif
                </td>
                @if (Auth::user()->perfil == 1 && ($estudio == 4 || $estudio == 5))
                <td class="px-3 py-1 whitespace-nowrap text-right text-sm font-medium inline-flex">

                    @if($evaluacion->esDummy())
                        <button wire:click.prevent="render" wire:click="abrirModalCompletar('cambiar_ejecutivo', {{ $evaluacion->id }})" class="text-xs inline-flex items-center py-1.5 pl-2 pr-1 mx-0.5 my-0.5 transition-colors duration-150 text-white bg-blue-600 border border-blue-700 hover:bg-blue-700 hover:text-white rounded focus:shadow-outline ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 relative -top-1 -left-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <form method="POST" action="{{ route("evaluacion.eliminar_dummy", [$evaluacion->id]) }}" onsubmit="return confirm('Seguro que desea eliminar este Dummy? (acción irreversible)')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="evaluacion_id" value="{{ $evaluacion->id }}">
                            <button type="submit" class="text-xs inline-flex items-center py-1.5 px-2 mx-0.5 my-0.5 transition-colors duration-150 text-white bg-red-600 border border-red-700 hover:bg-red-700 hover:text-white rounded focus:shadow-outline ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    @endif
                </td>
                @endif
            </tr>

        @endforeach

        <!-- More items... -->
        </tbody>
    </table>
    <div class="px-3 py-2">{{ $evaluaciones->links() }}</div>

    <div wire:loading.delay class="fixed right-3 top-3 z-50 text-yellow-700 shadow-lg bg-yellow-50 border-2 border-yellow-700 font-bold rounded-lg text-md px-5 py-2 text-center inline-flex items-center transition-all ease-in-out">
        <svg class="inline mr-3 w-6 h-6 text-yellow-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
        </svg>
        Cargando...
    </div>

    @if (Auth::user()->perfil == 1 && ($estudio == 4 || $estudio == 5))
        <form class="bg-gray-200 p-2 pt-4 border-t flex space-x-2 text-sm justify-end" method="post" action="{{ route('asignacion.crear_dummy', [$asignacionid]) }}">
            @csrf
            <input type="hidden" name="asignacion_id" value="{{ $asignacionid }}">
            <div class="inline-flex items-center">Agregar evaluación vacía para</div>
            <div class="inline-flex">
                <label for="subestudioDummies" class="sr-only">Subestudio</label>
                <select name="subestudioDummies" id="subestudioDummies" class="w-24 border border-gray-300 bg-white py-1 px-1 rounded-lg text-xs focus:outline-none">
                    @if($estudio == 5)
                        <option value="N2">N2</option>
                        <option value="N3">N3</option>
                    @elseif($estudio == 4)
                        <option value="MovilHogar">MovilHogar</option>
                        <option value="Subtel">Subtel</option>
                        <option value="Tecnico">Tecnico</option>
                    @endif
                </select>
            </div>
            <div class="inline-flex">
                <button type="submit" class="text-xs inline-flex items-center py-1.5 px-2 mx-0.5 my-0.5 transition-colors duration-150 text-white bg-green-600 border border-green-700 hover:bg-green-700 hover:text-white rounded focus:shadow-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
            </div>
        </form>
    @endif


    <div id="modal-completar" class="@if($modalVisible) modal-active @else opacity-0 pointer-events-none @endif transition-all fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="cambiar_ejecutivo_overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div wire:click.prevent="render" wire:click="cerrarModalCompletar" class="absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-xs z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-xs">(Esc)</span>
            </div>
            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <form class="w-full" method="POST" action="{{ $modalVisible ? route('evaluacion.' . $datosModal['ruta'] , [$datosModal['id']]) : '#' }}">
                    {{--            <form class="w-full" method="POST" action="{{ route('evaluacion.cambiar_ejecutivo', [$modal['evaluacion_id']]) }}">--}}
                    @csrf
                    <input type="hidden" name="modal_evaluacion_id" value="{{ $modalVisible ? $datosModal['id'] : '' }}">

                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-base font-bold mb-4 text-2xl">{{ $modalVisible ? $datosModal['titulo'] : '' }}</p>
                        <div wire:click.prevent="render" wire:click="cerrarModalCompletar" class="modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                        </div>
                    </div>

                    @if(!empty($datosModal['ruta']) && $datosModal['ruta'] == "cambiar_ejecutivo")

                        <div class="flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="cambiar_ejecutivo_nombre">
                                    Nombre
                                </label>
                            </div>
                            <div class="w-2/3">
                                <input oninput="validarCambiarEjecutivo()" wire:model.defer="datosModal.nombre" class="bg-gray-50 appearance-none border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="cambiar_ejecutivo_nombre" id="cambiar_ejecutivo_nombre" type="text">
                            </div>
                        </div>

                        <div class="flex md:items-center mb-6">
                            <div class="w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="cambiar_ejecutivo_rut">
                                    RUT
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input oninput="validarCambiarEjecutivo()" wire:model.defer="datosModal.rut" class="bg-gray-50 appearance-none border-2 border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="cambiar_ejecutivo_rut" id="cambiar_ejecutivo_rut" type="text">
                            </div>
                        </div>

                    @elseif(!empty($datosModal['ruta']) && $datosModal['ruta'] == "completar")

                        <div class="flex items-center mb-6 space-x-2">
                            <div class="w-1/3">
                                <label class="block text-gray-500 font-bold text-right mb-1 pr-2" for="fecha_grabacion">
                                    Fecha de grabación
                                </label>
                            </div>
                            <div class="w-1/3 relative">
                                <span class="text-gray-300 absolute left-1 top-0 text-xs">
                                    Fecha (DD/MM/AAAA)
                                </span>
                                <input oninput="validarFecha(this)" wire:model.defer="datosModal.fecha_grabacion" class="bg-gray-50 appearance-none border border-gray-400 rounded w-full pt-4 pb-1 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 placeholder-gray-300" name="fecha_grabacion" id="fecha_grabacion" type="text">
                            </div>
                            <div class="w-1/6 relative">
                                <label class="text-gray-300 absolute left-1 top-0 text-xs" for="hora_grabacion">
                                    Hora (0-23)
                                </label>
                                <input oninput="validarHora(this)" wire:model.defer="datosModal.hora_grabacion" min="0" max="23" class="w-24 bg-gray-50 appearance-none border border-gray-400 rounded pt-4 pb-1 px-4 text-gray-700 focus:outline-none focus:bg-white focus:border-purple-500 placeholder-gray-300" name="hora_grabacion" id="hora_grabacion" type="number">
                            </div>
                            <div class="w-1/6 relative">
                                <label class="text-gray-300 absolute left-1 top-0 text-xs" for="minutos_grabacion">
                                    Minuto (0-59)
                                </label>
                                <input oninput="validarMinutos(this)" wire:model.defer="datosModal.minutos_grabacion" min="0" max="60" class="w-24 bg-gray-50 appearance-none border border-gray-400 rounded pt-4 pb-1 px-4 text-gray-700 focus:outline-none focus:bg-white focus:border-purple-500 placeholder-gray-300" name="minutos_grabacion" id="minutos_grabacion" type="number">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="movil">
                                    Móvil
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input oninput="validarCompletar()" wire:model.defer="datosModal.movil" class="bg-gray-50 appearance-none border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="movil" id="movil" type="number">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="connid">
                                    ConnID
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input oninput="validarCompletar()" wire:model.defer="datosModal.connid" class="bg-gray-50 appearance-none border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="connid" id="connid" type="text">
                            </div>
                        </div>

                    @elseif(!empty($datosModal['ruta']) && $datosModal['ruta'] == "reportar_grabacion")

                        <div>
                            <div class="form-check">
                                <input onchange="validarReportarGrabacion()" wire:model.defer="datosModal.estadoGrabacion" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="estadoGrabacion" value="ok" id="sin_problemas">
                                <label class="form-check-label inline-block text-gray-800" for="sin-problemas">
                                    La grabación está bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input onchange="validarReportarGrabacion()" wire:model.defer="datosModal.estadoGrabacion" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="estadoGrabacion" value="inexistente" id="no_existe">
                                <label class="form-check-label inline-block text-gray-800" for="no-existe">
                                    No existe
                                </label>
                            </div>
                            <div class="form-check">
                                <input onchange="validarReportarGrabacion()" wire:model.defer="datosModal.estadoGrabacion" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="estadoGrabacion" value="problema" id="no_evaluable" >
                                <label class="form-check-label inline-block text-gray-800" for="no-evaluable">
                                    No es posible evaluarla
                                </label>
                            </div>

                            <div class="ml-10 mt-4">
                                <div id="pg_problema_duracion" class="form-check pg @if($datosModal['estadoGrabacion'] !== "problema") hidden @endif">
                                    <input onchange="validarReportarGrabacion()" wire:model.defer="datosModal.problemaGrabacion" class="pg-cb form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="problemaGrabacion" value="duracion" id="problema_duracion">
                                    <label class="pg-label form-check-label inline-block text-gray-800" for="problema-duracion">
                                        Duración superior a 30 minutos
                                    </label>
                                </div>
                                <div id="pg_problema_incompleto" class="form-check pg @if($datosModal['estadoGrabacion'] !== "problema") hidden @endif">
                                    <input onchange="validarReportarGrabacion()" wire:model.defer="datosModal.problemaGrabacion" class="pg-cb form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="problemaGrabacion" value="incompleta" id="problema_incompleto">
                                    <label class="pg-label form-check-label inline-block text-gray-800" for="problema-incompleto">
                                        Está incompleta
                                    </label>
                                </div>
                                <div id="pg_problema_inaudible" class="form-check pg @if($datosModal['estadoGrabacion'] !== "problema") hidden @endif">
                                    <input onchange="validarReportarGrabacion()" wire:model.defer="datosModal.problemaGrabacion" class="pg-cb form-check-input appearance-none rounded-full h-4 w-4 border focus:outline-none border-gray-300 bg-white checked:bg-blue-600 transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="problemaGrabacion" value="inaudible" id="problema-inaudible">
                                    <label class="pg-label form-check-label inline-block text-gray-800" for="problema-inaudible">
                                        No se entiende
                                    </label>
                                </div>
                            </div>

                            <div class="form-check">
                                <input onchange="validarReportarGrabacion()" wire:model.defer="datosModal.estadoGrabacion" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="estadoGrabacion" value="descartada" id="evaldescartada" >
                                <label class="form-check-label inline-block text-gray-800" for="evaldescartada">
                                    Descartada por:
                                </label>
                            </div>

                            <div class="ml-10 mt-4">
                                <div id="comentario_descartada" class="form-check pg ">
                                    <textarea id="comentario_desc" name="comentario_desc" wire:model.defer="datosModal.comentario_interno" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-30 block w-full sm:text-sm border-gray-300 rounded-md disabled:opacity-50"></textarea>
                                </div>
                                
                            </div>
                            

                        </div>

                    @endif

                    <!--Footer-->
                    <div class="space-x-2 flex justify-end pt-2">
                        <button wire:click.prevent="render" wire:click="cerrarModalCompletar" type="button" class="px-3 bg-red-500 py-1.5 rounded-lg text-white hover:bg-indigo-400">Cancelar</button>
                        <button id="modal_completar_guardar" type="submit" class="@if($modalOK) guardar-activo @else guardar-inactivo @endif px-3 bg-green-500 py-1.5 rounded-lg text-white hover:bg-green-400" @if(!$modalOK) disabled @endif >Guardar</button>
                        {{--                    <button id="cambiar_ejecutivo_guardar" type="submit" class="px-3 bg-green-500 py-1.5 rounded-lg text-white hover:bg-green-400 @if($modal['nombre_ejecutivo']) guardar-activo @else guardar-inactivo @endif" @if(!$modal['nombre_ejecutivo']) disabled @endif>Guardar</button>--}}
                    </div>


                </form>
            </div>
            <script>

                var cambiarEjecutivoBoton = document.getElementById("modal_completar_guardar");


                function desmarcarHijos() {
                    document.getElementById("problema_duracion").checked = false;
                    document.getElementById("problema_incompleto").checked = false;
                    document.getElementById("problema-inaudible").checked = false;
                }

                function esconderHijos() {
                    document.getElementById("pg_problema_duracion").classList.add('hidden');
                    document.getElementById("pg_problema_incompleto").classList.add('hidden');
                    document.getElementById("pg_problema_inaudible").classList.add('hidden');
                }

                function mostrarHijos() {
                    document.getElementById("pg_problema_duracion").classList.remove('hidden');
                    document.getElementById("pg_problema_incompleto").classList.remove('hidden');
                    document.getElementById("pg_problema_inaudible").classList.remove('hidden');
                }

                function vaciasComentario() {
                    document.getElementById("descartada") = null;    
                }

                function esconderComentario() {
                    document.getElementById("comentario_descartada").classList.add('hidden');
                   
                }

                function mostrarComentario() {
                    document.getElementById("comentario_descartada").classList.remove('hidden');
                    
                }

                function validarReportarGrabacion() {
                    if (document.getElementById("sin_problemas").checked || document.getElementById("no_existe").checked) {
                        desmarcarHijos();
                        esconderHijos();
                        activarGuardarModalCompletar();
                    } else if (document.getElementById("no_evaluable").checked) {
                        if (document.getElementById("problema_duracion").checked || document.getElementById("problema_incompleto").checked || document.getElementById("problema-inaudible").checked) {
                            activarGuardarModalCompletar();
                        } else {
                            mostrarHijos();
                            desactivarGuardarModalCompletar();
                        }
                    } else if (document.getElementById("evaldescartada").checked) {
                        if (document.getElementById("comentario_descartada")) {
                            activarGuardarModalCompletar();
                        } else {
                            mostrarComentario();
                            desactivarGuardarModalCompletar();

                        }
                    }

                }

                function validarCompletar() {
                    var completarFecha = document.getElementById("fecha_grabacion");
                    var completarHora = document.getElementById("hora_grabacion");
                    var completarMinutos = document.getElementById("minutos_grabacion");
                    var completarMovil = document.getElementById("movil");
                    var completarConnid = document.getElementById("connid");
                    if ((completarFecha.value !== "" && completarHora.value !== "" && completarMinutos.value !== "") || completarMovil.value !== "" || completarConnid.value !== "") {
                        activarGuardarModalCompletar();
                    } else {
                        desactivarGuardarModalCompletar();
                    }
                }

                function validarHora(object)
                {
                    if (object.value > 23)
                        object.value = 23
                    if (object.value < 0)
                        object.value = 0
                    validarCompletar();
                }

                function validarMinutos(object)
                {
                    if (object.value > 59)
                        object.value = 59
                    if (object.value < 0)
                        object.value = 0
                    validarCompletar();
                }

                function validarFecha(object)
                {
                    if (object.value.replace(/^[\d\/]*$/, "").length > 0) {
                        object.value = object.value.substring(0, object.value.length - 1);
                    }
                    validarCompletar();
                }

                function validarCambiarEjecutivo() {
                    var cambiarEjecutivoNombre = document.getElementById("cambiar_ejecutivo_nombre");
                    var cambiarEjecutivoRut = document.getElementById("cambiar_ejecutivo_rut");
                    if (cambiarEjecutivoNombre.value !== "" || cambiarEjecutivoRut.value !== "") {
                        activarGuardarModalCompletar();
                    } else {
                        desactivarGuardarModalCompletar();
                    }
                }

                function activarGuardarModalCompletar() {
                    cambiarEjecutivoBoton.classList.remove("guardar-inactivo");
                    cambiarEjecutivoBoton.classList.add("guardar-activo");
                    cambiarEjecutivoBoton.disabled = false;
                }

                function desactivarGuardarModalCompletar() {
                    cambiarEjecutivoBoton.classList.remove("guardar-activo");
                    cambiarEjecutivoBoton.classList.add("guardar-inactivo");
                    cambiarEjecutivoBoton.disabled = true;
                }
            </script>
        </div>
        <style>
            .guardar-activo {
                cursor: pointer;
                opacity: 1;
            }

            .guardar-inactivo {
                cursor: not-allowed;
                opacity: 0.3;
            }
        </style>

    </div>



    <script>
        var ctcSeleccionado = 0;

        function seleccionarVisualmente(containerid) {
            if (ctcSeleccionado > 0) {
                document.getElementById("fila_" + ctcSeleccionado).classList.remove("bg-green-50");
                document.getElementById("fila_" + ctcSeleccionado).classList.add("hover:bg-gray-50");
            }
            ctcSeleccionado = containerid.substring(containerid.lastIndexOf("_") + 1);
            document.getElementById("fila_" + ctcSeleccionado).classList.add("bg-green-50");
            document.getElementById("fila_" + ctcSeleccionado).classList.remove("hover:bg-gray-50");
        }

        function esconderAlerta(containerid) {
            document.getElementById(containerid + "_alert").style.display = "none";
        }

        function CopyToClipboard(containerid) {
            seleccionarVisualmente(containerid);
            document.getElementById(containerid + "_alert").style.display = "flex";
            setTimeout(function() {
                esconderAlerta(containerid);
            }, 1000);
        }
        new ClipboardJS('.ctc');
    </script>

    <!-- Modal -->

</div>


