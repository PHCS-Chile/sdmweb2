<div>
    <data></data>
    <script src="{{ asset('js/clipboard.js') }}" type="text/javascript"></script>
    @if($switch == 1)
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
                                            Monitoreo - {{$evaluacionfinal->asignacion->agente->servicio->name . " " . $evaluacionfinal->asignacion->agente->habilidad}}
                                        </h2>
                                    </div>
                                    <div class="mt-1 flex items-center text-xs text-gray-500">
                                        <!-- Heroicon name: briefcase -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                                        </svg>
                                        ID Evaluación: {{$evaluacionfinal->id}}
                                    </div>
                                    <div class="hidden mt-1 flex items-center text-xs text-gray-500">
                                        <!-- Heroicon name: briefcase -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                        </svg>
                                        Centro/Habilidad: {{$evaluacionfinal->asignacion->agente->servicio->name}} - {{$evaluacionfinal->asignacion->agente->habilidad}}
                                    </div>
                                    <div class="block">
                                        <input id="ctc_movil" value="{{$evaluacionfinal->movil}}" class="sr-only">
                                        <button class="ctc mt-1 flex items-center text-xs text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl p-1 shadow-md transition-all focus: border-transparent" data-clipboard-target="#ctc_movil" onclick="CopyToClipboard('ctc_movil')">
                                            <!-- Heroicon name: location-marker -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                            </svg>
                                            Movil:&nbsp; <span id="ctc_movil" class="text-gray-500">{{$evaluacionfinal->movil}}</span>
                                        </button>
                                        <div id="ctc_movil_alert" class="transition duration-350 ease-in-out hidden shadow-md rounded-md flex fixed items-center bg-green-500 text-white text-xs px-3 py-3" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                            </svg>
                                            <p>Teléfono copiado al portapapeles.</p>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <input id="ctc_connid" value="{{$evaluacionfinal->connid}}" class="sr-only">
                                        <button class="ctc mt-1 flex items-center text-xs text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl p-1 shadow-md transition-all focus: border-transparent" data-clipboard-target="#ctc_connid" onclick="CopyToClipboard('ctc_connid')">
                                            <!-- Heroicon name: currency-dollar -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd" />
                                                <path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                                            </svg>
                                            ConnID:&nbsp; <span id="ctc_connid" class="text-gray-500">{{Str::limit($evaluacionfinal->connid,30)}}</span>
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
                                        Fecha Grabación: {{$evaluacionfinal->fecha_grabacion}}
                                    </div>
                                    @if(Auth::user()->perfil == 2)
                                        <div class="mt-1 flex items-center text-xs text-gray-500">
                                            <!-- Heroicon name: calendar -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-gray-500 font-bold">Estado de Evaluación: </p>&nbsp <p> {{$evaluacionfinal->estado->name}}</p>&nbsp&nbsp
                                        </div>

                                    @endif
                                    @if(Auth::user()->perfil  == 1)
                                        <div class="flex items-center text-xs text-gray-500">
                                            <!-- Heroicon name: calendar -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            <form action="{{route('evaluacions.guardaeval', $evaluacionfinal->id)}}" method="POST">
                                                @csrf
                                                <div class="flex flex-row inline-flex items-center border-1">
                                                    <h2 class="font-bold text-sm mt-2">Estado:</h2>
                                                    {{--                                                <div><p class="text-gray-600 font-bold">Cambia de estado: &nbsp&nbsp</p></div>--}}
                                                    <div class="text-xs text-gray-500">
                                                        <select id="cambioestado" name="cambioestado" class="mt-1 block w-full py-1 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                                                            @foreach($estados as $estado)
                                                                <option value="{{$estado->id}}" {{ ( $estado->name == $evaluacionfinal->estado->name) ? 'selected' : '' }}>{{$estado->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    &nbsp&nbsp
                                                    <div>
                                                        <button type="submit" name="form3" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
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
                                        @if(App\Models\Estudio::tipoConversacion($evaluacionfinal->asignacion->estudio_id) == 'chat')
                                            <div class="w-2/4">
                                                <div class="flex flex-col">
                                                    <h2 class="font-bold text-base">Estado de Chat</h2>
                                                    <i class="text-gray-500">{{App\Models\Estado::where('id', $evaluacionfinal->estado_conversacion)->first()->name}}</i>
                                                    @if(count($grabaciones->where('url', NULL)) == 0)
                                                        <div class="flex flex-col mt-3">
                                                            <h3 class="font-bold text-sm">Link externo</h3>
                                                            @livewire('vinculos', ['evaluacionId' => $evaluacionfinal->id])
                                                        </div>
                                                    @endif
                                                </div>                                                
                                            </div>
                                        @elseif(App\Models\Estudio::tipoConversacion($evaluacionfinal->asignacion->estudio_id) == 'grabacion')
                                            <div class="w-2/4">
                                                <div class="flex flex-col">
                                                    <h2 class="font-bold text-base">Audio de la conversacion</h2>

                                                    @if(count($grabaciones->where('url', NULL)) > 0)
                                                        <audio src="" controls id="reproductor">
                                                            {{--                                        <source src="{{ asset('storage/uploads/' . $grabacion_activa->nombre) }}" type="audio/mpeg">--}}
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    @else
                                                        <i class="text-gray-500">Sin grabación.</i>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col mt-3">
                                                    <h3 class="font-bold text-sm">Link externo</h3>
                                                    @livewire('vinculos', ['evaluacionId' => $evaluacionfinal->id])
                                                </div>
                                            </div>
                                            <div class="w-2/4">
                                                <div class="flex flex-col">
                                                    @if(count($grabaciones->where('nombre', '<>', '')) > 0)
                                                        <h2 class="font-bold text-sm">Grabaciones:</h2>
                                                        <div class="">
                                                            <form class="flex space-x-2" action="{{ route('evaluacions.eliminar_grabacion', [$evaluacionfinal->id]) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar la grabación? ESTA ACCIÓN ES IRREVERSIBLE!');">
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
                                                        <form  class="flex" action="{{ route('evaluacions.grabacion', [$evaluacionfinal->id]) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="evaluacionid" value="{{ $evaluacionfinal->id }}">
                                                            <input class="w-64 inline-flex text-sm py-1" type="file" name="grabacion" id="grabacion" accept=".mp3,.wav,.ogg,.m4a">
                                                            <button type="submit"  class="inline-flex items-center px-4 py-0 border border-transparent rounded-md shadow-sm text-xs text-white bg-green-700 hover:bg-green-500 focus:outline-none transition-colors duration-150 sm:text-xs font-medium">
                                                                Subir
                                                            </button>
                                                        </form>
                                                    </div>                                                
                                                </div>
                                            </div>
                                        @endif
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
                                                <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacionfinal->id) }}" method="GET">
                                                    <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                    <input type="hidden" name="formulario" value="2">
                                                    <button type="submit" role="button" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                        Base Agente
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="w-px-150 pb-0.5">
                                                <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacionfinal->id) }}" method="GET">
                                                    <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                    <input type="hidden" name="formulario" value="3">
                                                    <button type="submit" role="button" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                        Calidad
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="w-px-150 pb-0.5">
                                                <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacionfinal->id) }}" method="GET">
                                                    <input type="hidden" name="url" value="{{ url()->previous() }}">
                                                    <input type="hidden" name="formulario" value="4">
                                                    <button type="submit" role="button" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                        Reportes
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="w-px-150 pb-0.5">
                                                <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacionfinal->id) }}" method="GET">
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
                                                <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacionfinal->id) }}" method="GET">
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
                                            <button modal-target="historial" class="modal-open inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Historial
                                            </button>
                                        </div>
                                        @if(Auth::user()->perfil  == 1)
                                            <div class="w-px-150 p-0.5">
                                                <button modal-target="respuestas-centro" class="modal-open inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Respuestas del centro
                                                </button>
                                            </div>
                                        @endif
                                        <form action="{{route('evaluacions.guardaeval', $evaluacionfinal->id)}}" method="POST">
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
                                            
                                            @if(Auth::user()->perfil  == 2)
                                                @if($evaluacionfinal->estado_id > 1)
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
                        @if($evaluacionfinal->user_completa)
                        <div class="align-baseline text-left w-full -mb-4 text-gray-800 text-xs">Evaluada por <strong>{{ $evaluacionfinal->user_completa }}</strong> el <strong>{{ date('d-m-Y H:i', strtotime($evaluacionfinal->fecha_completa)) }}</strong></div>
                        @endif
                        <div class="align-baseline text-right w-full -mb-4 text-gray-800 text-xs">
                            Bloqueada para <strong>{{ App\Models\User::find($bloqueo->user_id)->name }}</strong> hasta las <strong>{{ $bloqueo->created_at->add(new DateInterval('PT' . \App\Models\Bloqueo::DURACION . 'M'))->format('H:i') }}</strong>
                            <button type="submit" role="button" wire:click="cambiaheader" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                <svg sidebar-toggle-item class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button> 
                        </div>
                        
                    </div>

                </div>
            </div>

        </div>
    </div>
    @else
    <div class="p-6 w-px-150 pb-0.5">              
        <button type="submit" role="button" wire:click="cambiaheader" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2">
            <svg sidebar-toggle-item class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>     
    </div>
    @endif
    
    <!-- Inicializacion de campos 'copy to clipboard' -->
    <script>
        new ClipboardJS('.ctc');
    </script>
</div>
