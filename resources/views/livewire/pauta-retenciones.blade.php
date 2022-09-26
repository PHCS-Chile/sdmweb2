{{--
Plantilla: Pauta Back Office
Versión 2
--}}
<div>
    @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2)

        <!-- Modal -->
        @include('componentes.formularios.pauta_modal', ['modal' => $modal])

        <script src="{{ asset('js/clipboard.js') }}" type="text/javascript"></script>
        <div class="p-6">
            <div class=" p-5 bg-white  shadow-xl sm:rounded-lg ">
                <div class="md:grid md:grid-cols-1 md:gap-6">

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="lg:flex lg:items-center lg:justify-between">
                        <div class="flex-1 min-w-0">
                            <div class="flex">
                                <div class="w-1/4">
                                    <div class="flex flex-col">

                                        <div class="flex-1 w-4/4 bg-red sm:rounded-lg">
                                            <h2 class="text-xl font-bold leading-7 text-gray-900 sm:text-xl sm:truncate">
                                                {{ \App\Models\Evaluacion::servicioHabilidad($evaluacion_id, " ", "Monitoreo") }}
                                            </h2>
                                        </div>
                                        <div class="mt-1 flex items-center text-xs text-gray-500">
                                            <!-- Heroicon name: briefcase -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                                            </svg>
                                            ID Evaluación: {{ $evaluacion['id'] }}
                                        </div>
                                        <div class="hidden mt-1 flex items-center text-xs text-gray-500">
                                            <!-- Heroicon name: briefcase -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                            </svg>
                                            Centro/Habilidad: {{ \App\Models\Evaluacion::servicioHabilidad($evaluacion_id, " - ") }}
                                        </div>
                                        <div class="block">
                                            <input id="ctc_movil" value="{{ $evaluacion['movil'] }}" class="sr-only">
                                            <button class="ctc mt-1 flex items-center text-xs text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl p-1 shadow-md transition-all focus: border-transparent" data-clipboard-target="#ctc_movil" onclick="CopyToClipboard('ctc_movil')">
                                                <!-- Heroicon name: location-marker -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                </svg>
                                                Movil:&nbsp; <span id="ctc_movil" class="text-gray-500">{{ $evaluacion['movil'] }}</span>
                                            </button>
                                            <div id="ctc_movil_alert" class="transition duration-350 ease-in-out hidden shadow-md rounded-md flex fixed items-center bg-green-500 text-white text-xs px-3 py-3" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                                </svg>
                                                <p>Teléfono copiado al portapapeles.</p>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <input id="ctc_connid" value="{{ $evaluacion['connid'] }}" class="sr-only">
                                            <button class="ctc mt-1 flex items-center text-xs text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl p-1 shadow-md transition-all focus: border-transparent" data-clipboard-target="#ctc_connid" onclick="CopyToClipboard('ctc_connid')">
                                                <!-- Heroicon name: currency-dollar -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd" />
                                                    <path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                                                </svg>
                                                ConnID:&nbsp; <span id="ctc_connid" class="text-gray-500">{{ Str::limit($evaluacion['connid'],30) }}</span>
                                            </button>
                                            <div id="ctc_connid_alert" class="transition duration-350 ease-in-out hidden shadow-md rounded-md flex fixed items-center bg-green-500 text-white text-xs px-3 py-3" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                                </svg>
                                                <p>CONNID copiado al portapapeles.</p>
                                            </div>
                                        </div>
                                        <div class="mt-1 flex items-center text-xs text-gray-500">
                                            <!-- Heroicon name: calendar -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                            Fecha Grabación: {{ $evaluacion['fecha_grabacion'] }}
                                        </div>
                                        @if(Auth::user()->perfil == 2)
                                            <div class="mt-1 flex items-center text-xs text-gray-500">
                                                <!-- Heroicon name: calendar -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                <p class="text-gray-500 font-bold">Estado: </p>&nbsp <p>
                                                <div class="inline-block px-2 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    {{ \App\Models\Estado::find($evaluacion['estado_id'])->name }}
                                                </div>
                                            </div>

                                        @endif
                                        @if(Auth::user()->perfil  == 1)
                                            <div class="flex items-center text-xs text-gray-500">
                                                <!-- Heroicon name: calendar -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                <form action="{{route('evaluacions.guardaeval', $evaluacion['id'])}}" method="POST">
                                                    @csrf
                                                    <div class="flex items-center border-1">
                                                        <h2 class="mr-2 inline-flex font-bold text-sm mt-2">Estado:</h2>
                                                        {{--                                                <div><p class="text-gray-600 font-bold">Cambia de estado: &nbsp&nbsp</p></div>--}}
                                                        <div class="inline-flex text-xs text-gray-500">
                                                            <select id="cambioestado" wire:model="evaluacion.estado_id" name="cambioestado" class="mt-1 w-full py-1 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                                                                @foreach($estados_evaluacion as $estado)
                                                                    <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                                                                @endforeach

                                                            </select>
                                                            {{--                                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-100 text-green-500 h-7 w-7 transition-all" viewBox="0 0 20 20" fill="currentColor">--}}
                                                            {{--                                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />--}}
                                                            {{--                                                            </svg>--}}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="w-1/2 px-5 py-1">
                                    <div class="p-3 border border-solid border-gray-200 rounded-md bg-gray-50 shadow-md">
                                        <div class="flex">
                                            <div class="w-2/4">
                                                <div class="flex flex-col">
                                                    <h2 class="font-bold text-base">Audio de la conversacion</h2>

                                                    @if(!isset($grabaciones) || count($grabaciones->where('url', NULL)) > 0)
                                                        <div wire:ignore>
                                                            <audio src="" controls id="reproductor">
                                                                {{--                                        <source src="{{ asset('storage/uploads/' . $grabacion_activa->nombre) }}" type="audio/mpeg">--}}
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        </div>
                                                    @else
                                                        <i class="text-gray-500">Sin grabación.</i>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col mt-3">
                                                    <h3 class="font-bold text-sm">Link externo</h3>
                                                    @livewire('vinculos', ['evaluacionId' => $evaluacion['id']])
                                                </div>
                                            </div>

                                            <div class="w-2/4">
                                                <div class="flex flex-col">
                                                    @if(count($grabaciones->where('nombre', '<>', '')) > 0)
                                                        <h2 class="font-bold text-sm">Grabaciones:</h2>
                                                        <div class="">
                                                            <form class="flex space-x-2" action="{{ route('evaluacions.eliminar_grabacion', [$evaluacion['id']]) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar la grabación? ESTA ACCIÓN ES IRREVERSIBLE!');">
                                                                @method("DELETE")
                                                                @csrf

                                                                <select name="grabacionActiva" id="grabacionActiva" class="text-sm py-0 w-2/4 border border-gray-300 rounded-md shadow-sm focus:outline-none">
                                                                    @foreach($grabaciones->all() as $posicion => $grabacion)
                                                                        <option class="grabacion" value="{{ $posicion . "_" . $grabacion->id }}">Grabación {{ $posicion + 1 }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <script src="{{ asset('js/scripts.js') }}"></script>
                                                                <script>
                                                                    grabaciones = [
                                                                            @foreach($grabaciones->all() as $grabacion)
                                                                        ["{{ asset('storage/uploads/' . $grabacion->nombre) }}"],
                                                                        @endforeach
                                                                    ];
                                                                    reproductor();
                                                                    function reproductor() {
                                                                        $('#reproductor')[0].src = grabaciones[0];
                                                                    }
                                                                    $('#grabacionActiva').change(function () {
                                                                        $('#reproductor')[0].src = grabaciones[$("#grabacionActiva").val().substring(0, $("#grabacionActiva").val().indexOf("_"))]
                                                                    });
                                                                </script>

                                                                <div class="w-2/4 text-right">

                                                                    <button class="items-center px-2 py-1.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-red-700 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                                        </svg>
                                                                    </button>


                                                                </div>
                                                            </form>

                                                        </div>
                                                    @endif


                                                    <h2 class="font-bold text-sm mt-2">Agregar nueva:</h2>
                                                    <div class="flex flex-row content-evenly">
                                                        <form  class="flex" action="{{ route('evaluacions.grabacion', [$evaluacion['id']]) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="evaluacionid" value="{{ $evaluacion['id'] }}">
                                                            <input class="w-64 inline-flex text-sm py-1" type="file" name="grabacion" id="grabacion" accept=".mp3,.wav,.ogg,.m4a">
                                                            <button type="submit"  class="inline-flex items-center px-4 py-0 border border-transparent rounded-md shadow-sm text-xs text-white bg-green-700 hover:bg-green-500 focus:outline-none transition-colors duration-150 sm:text-xs font-medium">
                                                                Subir
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/4 text-right">

                                    <div class="flex flex-col">
                                        <div>
                                            @if(Auth::user()->perfil  == 1)
                                                <div class="inline-flex gap-1 items-center">
                                                    <div class="text-xs">Volver:</div>
                                                    <div class="w-px-150 pb-0.5">
                                                        <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacion['id']) }}" method="GET">
                                                            <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                            <input type="hidden" name="formulario" value="2">
                                                            <button type="submit" role="button" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                                Base Agente
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="w-px-150 pb-0.5">
                                                        <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacion['id']) }}" method="GET">
                                                            <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                            <input type="hidden" name="formulario" value="3">
                                                            <button type="submit" role="button" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                                Calidad
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="w-px-150 pb-0.5">
                                                        <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacion['id']) }}" method="GET">
                                                            <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                            <input type="hidden" name="formulario" value="4">
                                                            <button type="submit" role="button" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                                Reportes
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="w-px-150 pb-0.5">
                                                        <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacion['id']) }}" method="GET">
                                                            <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                            <input type="hidden" name="formulario" value="5">
                                                            <button type="submit" role="button" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                                Avances
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="w-px-150 p-0.5">
                                                    <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacion['id']) }}" method="GET">
                                                        <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                        <input type="hidden" name="formulario" value="2">
                                                        <button type="submit" role="button" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                                            </svg>
                                                            Volver a Base del Agente
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif

                                            <div class="flex flex-row space-x-2 w-80 mt-4 items-center text-center">
                                                <span class="bg-gray-300 h-px flex-row t-2 top-2"></span>
                                            </div>

                                            <div class="w-px-150 pb-0.5">
                                                <button wire:click="abrirModal('historial')" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Historial
                                                </button>
                                            </div>
                                            @if(Auth::user()->perfil  == 1)
                                                <div class="w-px-150 p-0.5">
                                                    <button wire:click="abrirModal('centro')" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Respuestas del centro
                                                    </button>
                                                </div>
                                            @endif
                                            @if(Auth::user()->perfil  == 1)
                                                <div class="w-px-150 p-0.5">
                                                    <button wire:click="abrirModal('ici')" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Respuestas ICI
                                                    </button>
                                                </div>
                                            @endif
                                            <form action="{{route('evaluacions.guardaeval', $evaluacion['id'])}}" method="POST">
                                                @csrf
                                                
                                                    <div class="w-px-150 pb-0.5">
                                                        <button type="submit" name="descartarEval" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                            <!-- Heroicon name: check -->

                                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                            </svg>
                                                            Descartar Evaluación
                                                        </button>
                                                    </div>
                                                @if(date('Y-m-d', strtotime('today')) == date('Y-m-d', strtotime($evaluacion['fecha_completa'])) && Auth::user()->name == $evaluacion['user_completa'])    
                                                    @if($evaluacion['estado_id'] == 2 || $evaluacion['estado_id'] == 3)
                                                     <div class="w-px-150 pb-0.5">
                                                        <button type="submit" name="desbloquearEval" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                            <!-- Heroicon name: check -->

                                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                            </svg>
                                                            Desbloquear Evaluación
                                                        </button>
                                                    </div>
                                                    @endif
                                                @endif
                                                @if(Auth::user()->perfil  == 2)
                                                    @if($evaluacion['estado_id'] > 1)
                                                        <div class="w-px-150 pb-0.5">
                                                            <button type="submit" name="enviarRevision" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                                <!-- Heroicon name: check -->
                                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                                Enviar a Revisión
                                                            </button>
                                                        </div>
                                                    @endif
                                                @endif
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($evaluacion['user_completa'])
                                <div class="align-baseline text-left w-full -mb-4 text-gray-800 text-xs">Evaluada por <strong>{{ $evaluacion['user_completa'] }}</strong> el <strong>{{ date('d-m-Y H:i', strtotime($evaluacion['fecha_completa'])) }}</strong></div>
                            @endif
                            <div class="align-baseline text-right w-full -mb-4 text-gray-800 text-xs">Bloqueada para <strong>{{ App\Models\User::find($bloqueo->user_id)->name }}</strong> hasta las <strong>{{ $bloqueo->created_at->add(new DateInterval('PT' . \App\Models\Bloqueo::DURACION . 'M'))->format('H:i') }}</strong></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>



        <!-- Inicializacion de campos 'copy to clipboard' -->
        <script>
            new ClipboardJS('.ctc');
        </script>

    @endif

    <div class="flex space-x-4 pt-6 px-6">
        <div class="flex-1 w-1/4 py-8 px-6 bg-white shadow-xl sm:rounded-lg overflow-y-scroll h-screen">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                    @include('componentes.formularios.pauta_textarea', [
                        'titulo' => 'Comentario Interno',
                        'arreglo' => 'respuestas',
                        'atributo_id' => 501,
                        'name' => 'comentario_interno',
                    ])

                    @include('componentes.formularios.pauta_textarea', [
                        'titulo' => 'Descripción del Caso',
                        'arreglo' => 'respuestas',
                        'atributo_id' => 502,
                        'name' => 'descripcion_caso',
                    ])

                    @include('componentes.formularios.pauta_textarea', [
                        'titulo' => 'Respuesta del Ejecutivo',
                        'arreglo' => 'respuestas',
                        'atributo_id' => 503,
                        'name' => 'respuesta_ejecutivo',
                    ])

                    @include('componentes.formularios.pauta_textarea', [
                        'titulo' => 'Retroalimentación',
                        'arreglo' => 'respuestas',
                        'atributo_id' => 500,
                        'name' => 'retroalimentacion',
                    ])

                    @include('componentes.formularios.pauta_textarea', [
                        'titulo' => 'Comentario Calidad',
                        'arreglo' => 'evaluacion',
                        'atributo_id' => 'comentario_calidad',
                        'name' => 'comentario_calidad',
                    ])


                    <button wire:click="save" type="button" class="opacity-100 disabled:opacity-40 @if(!$pauta_ok || $bloqueada) cursor-not-allowed @endif inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none" @if(!$pauta_ok || $bloqueada) disabled @endif>
                        <!-- Heroicon name: check -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Guardar
                    </button>

                    @if(Auth::user()->perfil  == 1 && in_array($evaluacion['estado_id'], [2, 3]))
                        <button type="submit"  wire:click="ici" class="@if($bloqueada) cursor-not-allowed @endif inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  @if($bloqueada) disabled @endif>
                            <!-- Heroicon name: check -->
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Discrepancia
                        </button>
                    @endif

                    <div wire:loading>
                        Guardando...
                    </div>
                </div>
            </div>


            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                Fecha Grabación Adjunta: <strong class="ml-3">{{ $grabaciones->first() ? $grabaciones->first()->created_at : '-'}}</strong>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                Fecha Evaluación: <strong class="ml-3">{{ $evaluacion['created_at'] ?? ""}}</strong>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                Fecha Modificación: <strong class="ml-3">{{ $evaluacion['updated_at'] ?? "" }}</strong>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                PENC: <strong class="ml-3">{{ $evaluacion['penc'] ?? "No calculado" }}</strong>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                PEC Usuario: <strong class="ml-3">{{ $evaluacion['pecu'] ?? "No calculado" }}</strong>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                PEC Negocio: <strong class="ml-3">{{ $evaluacion['pecn'] ?? "No calculado" }}</strong>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                PEC Cumplimiento: <strong class="ml-3">{{ $evaluacion['pecc'] ?? "No calculado" }}</strong>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                Puntaje Final: <strong class="ml-3">{{ $evaluacion['pf'] ?? "No calculado" }}</strong>
            </div>


            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                Puntaje ICI: <strong class="ml-3">{{ intval($evaluacion['ici'] ?? "No calculado") }}</strong>
            </div>
            {{--            <p class="text-gray-500 font-bold">% de Discrepancia: </p>&nbsp <p> {{$evaluacion->ici}}</p>--}}
        </div>

        <div class="w-3/4 p-6 bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg overflow-y-scroll h-screen">
            <div>
                <form wire:submit.prevent="save">

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-2 md:gap-6">
                            <div class="mt-5 md:mt-0 md:col-span-1 ">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-green-50 space-y-6 sm:p-6">
                                        <p class="font-bold text-xl">Atributos PENC</p>
                                        @if($evaluacion['sub_estudio'] == 'N2')
                                            @include('componentes.formularios.pauta_grupo_padre_condicional', [
                                                'titulo' => '1 - Cumple con Scripts de saludo y despedida',
                                                'padre' => 426,
                                                'elementos' => [427, 428, 429]
                                            ])
                                        @else
                                            @include('componentes.formularios.pauta_grupo_padre_condicional', [
                                                'titulo' => '1 - Cumple con Scripts de saludo y despedida',
                                                'padre' => 426,
                                                'elementos' => [428, 429]
                                            ])
                                        @endif
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '2 - Maneja los silencios y/o tiempos de espera',
                                            'padre' => 430,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '3 - Su expresión oral es acorde a la atención de clientes',
                                            'padre' => 434,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '4 - Demuestra seguridad y buen manejo de la información',
                                            'padre' => 438,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '5 - Claridad para comunicarse y expresar ideas',
                                            'padre' => 442,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '6 - Es Cordial y demuestra preocupación por el Cliente',
                                            'padre' => 446,
                                        ])
                                    </div>
                                </div>
                                <div class="mt-5 shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-yellow-50 space-y-6 sm:p-6">
                                        <p class="font-bold text-xl">Errores Criticos que afectan a Entel</p>
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '11 - Cumple los protocolos regulados por Subtel/Sernac',
                                            'padre' => 474,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '12 - Cumple con los procedimientos establecidos por Entel',
                                            'padre' => 478,
                                        ])
                                        @if($evaluacion['sub_estudio'] == 'N2')
                                            @include('componentes.formularios.pauta_grupo_padre_condicional', [
                                                'titulo' => '13 - Cumple con los protocolos de la plataforma',
                                                'padre' => 487,
                                                'elementos' => [488, 489, 490, 491]
                                            ])
                                        @else
                                            @include('componentes.formularios.pauta_grupo_padre_condicional', [
                                                'titulo' => '13 - Cumple con los protocolos de la plataforma',
                                                'padre' => 487,
                                                'elementos' => [488, 489, 491, 492]
                                            ])
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-1 ">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-50 space-y-6 sm:p-6">
                                        <p class="font-bold text-xl">Gestiones</p>
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '7 - Analiza correctamente los antecedentes',
                                            'padre' => 451,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '8 - Entrega información Completa',
                                            'padre' => 458,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '9 - Entrega información Correcta',
                                            'padre' => 464,
                                        ])
                                        @include('componentes.formularios.pauta_grupo_padre', [
                                            'titulo' => '10 - Gestiona correctamente en sistema los cambios o solicitudes',
                                            'padre' => 470,
                                        ])
                                    </div>
                                </div>
                                <div class="py-3"></div>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-gray-50 space-y-6 sm:p-6">
                                        <p class="font-bold text-xl">Caracterización</p>
                                        @include('componentes.formularios.pauta_grupo', [
                                            'titulo' => '15 - Caracterización de la Interacción', 'elementos' => [493, 494, 495, 496, 497, 498, 499]
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($pauta_ok)
        <div class="fixed @if($evaluacion['estado_id'] == 20) visible opacity-100 @else hidden opacity-0 @endif bottom-1 right-1 bg-yellow-100 border border border-yellow-500 text-yellow-700 px-4 py-1 shadow-lg transition-all">
            <p class="font-bold text-sm">Tienes progreso autoguardado sin enviar.</p>
            <p class="text-sm">La evaluación no se marcará como "Completada" hasta que se presione el botón "Guardar".</p>
        </div>
    @else
        <div class="fixed visible opacity-100 bottom-1 right-1 bg-red-100 border border border-red-500 text-red-700 px-4 py-1 shadow-lg transition-all">
            <p class="font-bold text-sm">Faltan campos por completar.</p>
            <p class="text-sm">Complete los campos campos resaltados en rojo antes de Guardar la pauta.</p>
        </div>
    @endif

</div>
{{--<div class="flex space-x-4 pt-6 px-6">--}}
{{--    <div class="flex-1 w-1/4 py-8 px-6 bg-white shadow-xl sm:rounded-lg overflow-y-scroll h-screen">--}}

{{--        <div class="shadow overflow-hidden sm:rounded-md">--}}
{{--            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">--}}
{{--                <div>--}}
{{--                    <label for="comentario_interno" class="block text-sm font-medium text-gray-700">--}}
{{--                        Comentario Interno--}}
{{--                    </label>--}}
{{--                    <div class="mt-1">--}}
{{--                        <textarea id="comentario_interno" name="comentario_interno" wire:model.defer="comentario_interno" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-30 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Escribe aquí el comentario interno">{{$comentario_interno}}</textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <small class="text-red-600 font-bold">{{ $errors->first('comentario_interno') }}</small>--}}
{{--                <div>--}}
{{--                    <label for="descripcion_caso" class="block text-sm font-medium text-gray-700">--}}
{{--                        Descripción del Caso--}}
{{--                    </label>--}}
{{--                    <div class="mt-1">--}}
{{--                        <textarea id="descripcion_caso" name="descripcion_caso" wire:model.defer="descripcion_caso" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-30 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Escribe aquí la descripción del caso">{{$descripcion_caso}}</textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <label for="respuesta_ejecutivo" class="block text-sm font-medium text-gray-700">--}}
{{--                        Respuesta del Ejecutivo--}}
{{--                    </label>--}}
{{--                    <div class="mt-1">--}}
{{--                        <textarea id="respuesta_ejecutivo" name="respuesta_ejecutivo" wire:model.defer="respuesta_ejecutivo" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-30 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Escribe aquí la Respuesta del Ejecutivo">{{$respuesta_ejecutivo}}</textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <small class="text-red-600 font-bold">{{ $errors->first('respuesta_ejecutivo') }}</small>--}}
{{--                <div>--}}
{{--                    <label for="retroalimentacion" class="block text-sm font-medium text-gray-700">--}}
{{--                        Retroalimentación--}}
{{--                    </label>--}}
{{--                    <div class="mt-1">--}}
{{--                        <textarea id="retroalimentacion" name="retroalimentacion" wire:model.defer="retroalimentacion" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-48 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Escribe aquí la retroalimentación">{{$retroalimentacion}}</textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <small class="text-red-600 font-bold">{{ $errors->first('retroalimentacion') }}</small>--}}
{{--                <div></div>--}}
{{--                <div>--}}
{{--                    <label for="comentario_calidad" class="block text-sm font-medium text-gray-700">--}}
{{--                        Comentario Calidad--}}
{{--                    </label>--}}
{{--                    <div class="mt-1">--}}
{{--                        <textarea id="comentario_calidad" name="comentario_calidad" wire:model.defer="comentario_calidad" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-48 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Escribe aquí el comentario de calidad">{{$comentario_calidad}}</textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <small class="text-red-600 font-bold">{{ $errors->first('comentario_calidad') }}</small>--}}
{{--                <div></div>--}}
{{--                <button type="submit"  wire:click="save" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                    <!-- Heroicon name: check -->--}}
{{--                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />--}}
{{--                    </svg>--}}
{{--                    Guardar--}}
{{--                </button>--}}
{{--                @if(Auth::user()->perfil  == 1 && $marca_ici == 0)--}}
{{--                    <button type="submit"  wire:click="ici" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                        <!-- Heroicon name: check -->--}}
{{--                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />--}}
{{--                        </svg>--}}
{{--                        Discrepancia--}}
{{--                    </button>--}}
{{--                @endif--}}

{{--                --}}{{--                                @if(Auth::user()->perfil  == 1 && $marca_ici == 1)--}}
{{--                --}}{{--                                    <div>--}}
{{--                --}}{{--                                        <button wire:click="resetici" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">--}}
{{--                --}}{{--                                            <!-- Heroicon name: check -->--}}


{{--                --}}{{--                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                --}}{{--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />--}}
{{--                --}}{{--                                            </svg>--}}
{{--                --}}{{--                                            Reset Discrepancia--}}
{{--                --}}{{--                                        </button>--}}
{{--                --}}{{--                                    </div>--}}
{{--                --}}{{--                                @endif--}}


{{--                <div wire:loading>--}}
{{--                    Guardando...--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />--}}
{{--            </svg>--}}
{{--            Fecha Grabación Adjunta: {{ $grabacion ? $grabacion->created_at : '-'}}--}}
{{--        </div>--}}
{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />--}}
{{--            </svg>--}}
{{--            Fecha Evaluación: {{$evaluacion->created_at}}--}}
{{--        </div>--}}
{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />--}}
{{--            </svg>--}}
{{--            Fecha Modificación: {{$evaluacion->updated_at}}--}}
{{--        </div>--}}
{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />--}}
{{--            </svg>--}}
{{--            PENC: {{$evaluacion->penc}}--}}
{{--        </div>--}}
{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />--}}
{{--            </svg>--}}
{{--            PEC Usuario: {{$evaluacion->pecu}}--}}
{{--        </div>--}}
{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />--}}
{{--            </svg>--}}
{{--            PEC Negocio: {{$evaluacion->pecn}}--}}
{{--        </div>--}}
{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />--}}
{{--            </svg>--}}
{{--            PEC Cumplimiento: {{$evaluacion->pecc}}--}}
{{--        </div>--}}
{{--        <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--            <!-- Heroicon name: calendar -->--}}
{{--            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />--}}
{{--            </svg>--}}
{{--            Puntaje Final: {{$evaluacion->pf}}--}}
{{--        </div>--}}
{{--        @if($evaluacion->ici)--}}
{{--            <div class="mt-2 flex items-center text-sm text-gray-500">--}}
{{--                <!-- Heroicon name: calendar -->--}}
{{--                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />--}}
{{--                </svg>--}}
{{--                % de Discrepancia: {{$evaluacion->ici}}--}}
{{--            </div>--}}
{{--            --}}{{--            <p class="text-gray-500 font-bold">% de Discrepancia: </p>&nbsp <p> {{$evaluacion->ici}}</p>--}}
{{--        @endif--}}
{{--    </div>--}}

{{--    <div class="w-3/4 p-6 bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg overflow-y-scroll h-screen">--}}
{{--        <div>--}}
{{--            <form wire:submit.prevent="save">--}}

{{--                <div class="mt-10 sm:mt-0">--}}
{{--                    <div class="md:grid md:grid-cols-2 md:gap-6">--}}
{{--                        <div class="mt-5 md:mt-0 md:col-span-1 ">--}}
{{--                            <div class="shadow overflow-hidden sm:rounded-md">--}}
{{--                                <div class="px-4 py-5 bg-green-50 space-y-6 sm:p-6">--}}
{{--                                    <p class="font-bold text-xl">Atributos PENC</p>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">1 - Cumple con Scripts de saludo y despedida - ({{$saludo1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            @if($evaluacion->sub_estudio == 'N2')--}}
{{--                                                <div class="flex items-start">--}}
{{--                                                    <div class="flex items-center h-5">--}}
{{--                                                        <input id="saludo2" name="saludo2" wire:model.defer="saludo2" wire:click="xsaludo" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo2}}>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="ml-3 text-sm">--}}
{{--                                                        <label for="saludo2" class="font-medium text-gray-700">No agradece el tiempo de espera durante la transferencia desde el front</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="saludo3" name="saludo3" wire:model.defer="saludo3" wire:click="xsaludo" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="saludo3" class="font-medium text-gray-700">No realiza la presentación según script</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="saludo4" name="saludo4" wire:model.defer="saludo4" wire:click="xsaludo" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="saludo4" class="font-medium text-gray-700">No realiza la despedida según script</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">2 - Maneja los silencios y/o tiempos de espera - ({{$manejosilencios1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="manejosilencios2" name="manejosilencios2" wire:model.defer="manejosilencios2" wire:click="xmanejosilencios" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$manejosilencios2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="manejosilencios2" class="font-medium text-gray-700">Deja al cliente en espera sin retomar antes de 30 segundos</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="manejosilencios3" name="manejosilencios3" wire:model.defer="manejosilencios3" wire:click="xmanejosilencios" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$manejosilencios3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="manejosilencios3" class="font-medium text-gray-700">No informa previamente al cliente que necesita dejarlo en espera</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="manejosilencios4" name="manejosilencios4" wire:model.defer="manejosilencios4" wire:click="xmanejosilencios" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$manejosilencios4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="manejosilencios4" class="font-medium text-gray-700">No Agradece la espera en caso de Hold/Mute extendido</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">3 - Su expresión oral es acorde a la atención de clientes - ({{$expresionoral1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="expresionoral2" name="expresionoral2" wire:model.defer="expresionoral2" wire:click="xexpresionoral" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$expresionoral2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="expresionoral2" class="font-medium text-gray-700">Errores en el vocabulario utilizado (semántica)</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="expresionoral3" name="expresionoral3" wire:model.defer="expresionoral3" wire:click="xexpresionoral" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$expresionoral3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="expresionoral3" class="font-medium text-gray-700">Faltas en la modulación y/o adaptación del ritmo</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="expresionoral4" name="expresionoral4" wire:model.defer="expresionoral4" wire:click="xexpresionoral" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$expresionoral4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="expresionoral4" class="font-medium text-gray-700">Utiliza muletillas en exceso y/o es poco formal</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">4 - Demuestra seguridad y buen manejo de la información - ({{$seguridad1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="seguridad2" name="seguridad2" wire:model.defer="seguridad2" wire:click="xseguridad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$seguridad2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="seguridad2" class="font-medium text-gray-700">Falla durante la explicación de antecedentes y/o cond. comerciales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="seguridad3" name="seguridad3" wire:model.defer="seguridad3" wire:click="xseguridad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$seguridad3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="seguridad3" class="font-medium text-gray-700">Falla durante la argumentación para retener</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="seguridad4" name="seguridad4" wire:model.defer="seguridad4" wire:click="xseguridad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$seguridad4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="seguridad4" class="font-medium text-gray-700">Falla durante el acuerdo de cierre o pasos operacionales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">5 - Claridad para comunicarse y expresar ideas - ({{$claridad1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="claridad2" name="claridad2" wire:model.defer="claridad2" wire:click="xclaridad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$claridad2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="claridad2" class="font-medium text-gray-700">Falla durante la explicación de antecedentes y/o cond. comerciales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="claridad3" name="claridad3" wire:model.defer="claridad3" wire:click="xclaridad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$claridad3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="claridad3" class="font-medium text-gray-700">Falla durante la argumentación para retener</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="claridad4" name="claridad4" wire:model.defer="claridad4" wire:click="xclaridad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$claridad4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="claridad4" class="font-medium text-gray-700">Falla durante el acuerdo de cierre o pasos operacionales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}


{{--                                        </div>--}}
{{--                                    </fieldset>--}}

{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">6 - Es Cordial y demuestra preocupación por el Cliente - ({{$cordialidad1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="cordialidad2" name="cordialidad2" wire:model.defer="cordialidad2" wire:click="xcordialidad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="cordialidad2" class="font-medium text-gray-700">Es cortante, irónico o poco amable con el cliente</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="cordialidad3" name="cordialidad3" wire:model.defer="cordialidad3" wire:click="xcordialidad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="cordialidad3" class="font-medium text-gray-700">No intenta reducir la emocionalidad negativa del cliente</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="cordialidad4" name="cordialidad4" wire:model.defer="cordialidad4" wire:click="xcordialidad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="cordialidad4" class="font-medium text-gray-700">No retiene información o antecedentes entregados por el cliente</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="cordialidad5" name="cordialidad5" wire:model.defer="cordialidad5" wire:click="xcordialidad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad5}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="cordialidad5" class="font-medium text-gray-700">No confirma que el cliente comprendió la información entregada</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                             <div class="mt-5 shadow overflow-hidden sm:rounded-md">--}}
{{--                                <div class="px-4 py-5 bg-yellow-50 space-y-6 sm:p-6">--}}
{{--                                    <p class="font-bold text-xl">Errores Criticos que afectan a Entel</p>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">11 - Cumple los protocolos regulados por Subtel/Sernac - ({{$pecc_protocolosubtel1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecc_protocolosubtel2" name="pecc_protocolosubtel2" wire:model.defer="pecc_protocolosubtel2" wire:click="xprotocolosubtel" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecc_protocolosubtel2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecc_protocolosubtel2" class="font-medium text-gray-700">No valida o comprueba RUT del Titular</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecc_protocolosubtel3" name="pecc_protocolosubtel3" wire:model.defer="pecc_protocolosubtel3" wire:click="xprotocolosubtel" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecc_protocolosubtel3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecc_protocolosubtel3" class="font-medium text-gray-700">Realiza gestión con una persona distinta al titular</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecc_protocolosubtel4" name="pecc_protocolosubtel4" wire:model.defer="pecc_protocolosubtel4" wire:click="xprotocolosubtel" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecc_protocolosubtel4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecc_protocolosubtel4" class="font-medium text-gray-700">No indica reserva de número en caso de renunciar a la línea</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">12 - Cumple con los procedimientos establecidos por Entel - ({{$pecn_procedimientos1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos2" name="pecn_procedimientos2" wire:model.defer="pecn_procedimientos2" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos2" class="font-medium text-gray-700">Comete fraude al cliente y/o a Entel</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos3" name="pecn_procedimientos3" wire:model.defer="pecn_procedimientos3" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos3" class="font-medium text-gray-700">Descalifica o cuestiona a Entel frente al cliente</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos4" name="pecn_procedimientos4" wire:model.defer="pecn_procedimientos4" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos4" class="font-medium text-gray-700">Entrega información confidencial</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos5" name="pecn_procedimientos5" wire:model.defer="pecn_procedimientos5" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos5}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos5" class="font-medium text-gray-700">No registra ticket de mal ingreso por parte del front</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos6" name="pecn_procedimientos6" wire:model.defer="pecn_procedimientos6" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos6}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos6" class="font-medium text-gray-700">No registra en sistema de Entel gestiones realizadas</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos7" name="pecn_procedimientos7" wire:model.defer="pecn_procedimientos7" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos7}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos7" class="font-medium text-gray-700">No utiliza todas las herramientas de retencion disponibles</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos8" name="pecn_procedimientos8" wire:model.defer="pecn_procedimientos8" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos8}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos8" class="font-medium text-gray-700">Realiza descuento, carga o beneficio fuera de procedimiento</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecn_procedimientos9" name="pecn_procedimientos9" wire:model.defer="pecn_procedimientos9" wire:click="xprocedimientos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_procedimientos9}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecn_procedimientos9" class="font-medium text-gray-700">No prioriza las herramientas de retención según procedimiento</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">13 - Cumple con los protocolos de la plataforma - ({{$pecu_protocoloplataforma1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_protocoloplataforma2" name="pecu_protocoloplataforma2" wire:model.defer="pecu_protocoloplataforma2" wire:click="xprotocoloplataforma" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_protocoloplataforma2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_protocoloplataforma2" class="font-medium text-gray-700">Desatiende el llamado o es poco profesional</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_protocoloplataforma3" name="pecu_protocoloplataforma3" wire:model.defer="pecu_protocoloplataforma3" wire:click="xprotocoloplataforma" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_protocoloplataforma3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_protocoloplataforma3" class="font-medium text-gray-700">Es grosero con el cliente durante la atención</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            @if($evaluacion->sub_estudio == 'N2')--}}
{{--                                                <div class="flex items-start">--}}
{{--                                                    <div class="flex items-center h-5">--}}
{{--                                                        <input id="pecu_protocoloplataforma4" name="pecu_protocoloplataforma4" wire:model.defer="pecu_protocoloplataforma4" wire:click="xprotocoloplataforma" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_protocoloplataforma4}}>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="ml-3 text-sm">--}}
{{--                                                        <label for="pecu_protocoloplataforma4" class="font-medium text-gray-700">No libera la linea una vez finalizada la llamada</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_protocoloplataforma5" name="pecu_protocoloplataforma5" wire:model.defer="pecu_protocoloplataforma5" wire:click="xprotocoloplataforma" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_protocoloplataforma5}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_protocoloplataforma5" class="font-medium text-gray-700">Transfiere o deriva incorrectamente</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            @if($evaluacion->sub_estudio == 'N3')--}}
{{--                                                <div class="flex items-start">--}}
{{--                                                    <div class="flex items-center h-5">--}}
{{--                                                        <input id="pecu_protocoloplataforma6" name="pecu_protocoloplataforma6" wire:model.defer="pecu_protocoloplataforma6" wire:click="xprotocoloplataforma" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_protocoloplataforma6}}>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="ml-3 text-sm">--}}
{{--                                                        <label for="pecu_protocoloplataforma6" class="font-medium text-gray-700">No Realiza callback comprometido</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mt-5 md:mt-0 md:col-span-1 ">--}}
{{--                            <div class="shadow overflow-hidden sm:rounded-md">--}}
{{--                                <div class="px-4 py-5 bg-blue-50 space-y-6 sm:p-6">--}}
{{--                                    <p class="font-bold text-xl">Gestiones</p>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">7 - Analiza correctamente los antecedentes - ({{$pecu_antecedentes1}})</legend>--}}

{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_antecedentes2" name="pecu_antecedentes2" wire:model.defer="pecu_antecedentes2" wire:click="xantecedentes" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_antecedentes2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_antecedentes2" class="font-medium text-gray-700">No valida correctamente las restricciones previas para gestionar</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_antecedentes3" name="pecu_antecedentes3" wire:model.defer="pecu_antecedentes3" wire:click="xantecedentes" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_antecedentes3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_antecedentes3" class="font-medium text-gray-700">Revisión incorrecta de condiciones comerciales del plan/bolsa/vas</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_antecedentes4" name="pecu_antecedentes4" wire:model.defer="pecu_antecedentes4" wire:click="xantecedentes" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_antecedentes4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_antecedentes4" class="font-medium text-gray-700">Revisión incorrecta de Nivel de Uso/Consumo y servicios asociados.</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_antecedentes5" name="pecu_antecedentes5" wire:model.defer="pecu_antecedentes5" wire:click="xantecedentes" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_antecedentes5}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_antecedentes5" class="font-medium text-gray-700">Revisión incorrecta del detalle de la información contenida en la boleta</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_antecedentes6" name="pecu_antecedentes6" wire:model.defer="pecu_antecedentes6" wire:click="xantecedentes" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_antecedentes6}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_antecedentes6" class="font-medium text-gray-700">Revisión incorrecta de gestiones anteriores</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_antecedentes7" name="pecu_antecedentes7" wire:model.defer="pecu_antecedentes7" wire:click="xantecedentes" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_antecedentes7}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_antecedentes7" class="font-medium text-gray-700">No valida o cumple con restricciones a la gestión de Renuncia/Retención</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">8 - Entrega información Completa - ({{$pecu_infocompleta1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocompleta2" name="pecu_infocompleta2" wire:model.defer="pecu_infocompleta2" wire:click="xinfocompleta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocompleta2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocompleta2" class="font-medium text-gray-700">Falla durante la explicación de condiciones comerciales actuales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocompleta3" name="pecu_infocompleta3" wire:model.defer="pecu_infocompleta3" wire:click="xinfocompleta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocompleta3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocompleta3" class="font-medium text-gray-700">Falla durante la argumentación para retener</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocompleta4" name="pecu_infocompleta4" wire:model.defer="pecu_infocompleta4" wire:click="xinfocompleta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocompleta4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocompleta4" class="font-medium text-gray-700">Falla durante la explicación de desc. o compensaciones</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocompleta5" name="pecu_infocompleta5" wire:model.defer="pecu_infocompleta5" wire:click="xinfocompleta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocompleta5}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocompleta5" class="font-medium text-gray-700">Falla sobre las modificaciones comerciales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocompleta6" name="pecu_infocompleta6" wire:model.defer="pecu_infocompleta6" wire:click="xinfocompleta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocompleta6}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocompleta6" class="font-medium text-gray-700">Falla durante el acuerdo de cierre o resumen final</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">9 - Entrega información Correcta - ({{$pecu_infocorrecta1}})</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocorrecta2" name="pecu_infocorrecta2" wire:model.defer="pecu_infocorrecta2" wire:click="xinfocorrecta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocorrecta2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocorrecta2" class="font-medium text-gray-700">Falla durante la explicación de condiciones comerciales actuales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocorrecta3" name="pecu_infocorrecta3" wire:model.defer="pecu_infocorrecta3" wire:click="xinfocorrecta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocorrecta3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocorrecta3" class="font-medium text-gray-700">Falla durante la argumentación para retener</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocorrecta4" name="pecu_infocorrecta4" wire:model.defer="pecu_infocorrecta4" wire:click="xinfocorrecta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocorrecta4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocorrecta4" class="font-medium text-gray-700">Falla durante la explicación de desc. o compensaciones</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocorrecta5" name="pecu_infocorrecta5" wire:model.defer="pecu_infocorrecta5" wire:click="xinfocorrecta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocorrecta5}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocorrecta5" class="font-medium text-gray-700">Falla sobre las modificaciones comerciales</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_infocorrecta6" name="pecu_infocorrecta6" wire:model.defer="pecu_infocorrecta6" wire:click="xinfocorrecta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocorrecta6}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_infocorrecta6" class="font-medium text-gray-700">Falla durante el acuerdo de cierre o resumen final </label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">10 - Gestiona correctamente en sistema los cambios o solicitudes - ({{$pecu_gestiona1}})</legend>--}}

{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_gestiona2" name="pecu_gestiona2" wire:model.defer="pecu_gestiona2" wire:click="xgestiona" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_gestiona2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_gestiona2" class="font-medium text-gray-700">Falla durante la generación de descuento o compensaciones</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_gestiona3" name="pecu_gestiona3" wire:model.defer="pecu_gestiona3" wire:click="xgestiona" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_gestiona3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_gestiona3" class="font-medium text-gray-700">Falla durante la modificación comercial</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="pecu_gestiona4" name="pecu_gestiona4" wire:model.defer="pecu_gestiona4" wire:click="xgestiona" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_gestiona4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="pecu_gestiona4" class="font-medium text-gray-700">Falla durante el ingreso de tickets a otras áreas de Entel</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-5 shadow overflow-hidden sm:rounded-md">--}}
{{--                                <div class="px-4 py-5 bg-gray-50 space-y-6 sm:p-6">--}}
{{--                                    <p class="font-bold text-xl">Caracterización</p>--}}
{{--                                    <fieldset>--}}
{{--                                        <legend class="text-base font-medium text-gray-900">14 - Caracterización de la Interacción</legend>--}}
{{--                                        <div class="mt-2 space-y-2">--}}
{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="caracterizacion1" name="caracterizacion1" wire:model.defer="caracterizacion1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$caracterizacion1}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="caracterizacion1" class="font-medium text-gray-700">Cliente es retenido o desiste de continuar con la renunciar</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="caracterizacion2" name="caracterizacion2" wire:model.defer="caracterizacion2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$caracterizacion2}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="caracterizacion2" class="font-medium text-gray-700">Cliente insatisfecho con Entel</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="caracterizacion3" name="caracterizacion3" wire:model.defer="caracterizacion3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$caracterizacion3}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="caracterizacion3" class="font-medium text-gray-700">Cliente con oferta de la competencia</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="caracterizacion4" name="caracterizacion4" wire:model.defer="caracterizacion4" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$caracterizacion4}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="caracterizacion4" class="font-medium text-gray-700">Cliente justifica su renuncia por situación económica</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="caracterizacion5" name="caracterizacion5" wire:model.defer="caracterizacion5" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$caracterizacion5}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="caracterizacion5" class="font-medium text-gray-700">Cliente menciona cambio en sus condiciones de vida y/o uso del servicio</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="caracterizacion6" name="caracterizacion6" wire:model.defer="caracterizacion6" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$caracterizacion6}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="caracterizacion6" class="font-medium text-gray-700">Cliente no tiene intención de renunciar sino que busca beneficios</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="flex items-start">--}}
{{--                                                <div class="flex items-center h-5">--}}
{{--                                                    <input id="caracterizacion7" name="caracterizacion7" wire:model.defer="caracterizacion7" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$caracterizacion7}}>--}}
{{--                                                </div>--}}
{{--                                                <div class="ml-3 text-sm">--}}
{{--                                                    <label for="caracterizacion7" class="font-medium text-gray-700">Mal Ingreso en 1° nivel</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
