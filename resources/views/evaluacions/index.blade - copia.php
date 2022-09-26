{{--
Plantilla: Evaluaciones (plantilla general)
Versión 4
--}}
<x-app-layout>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    @if($errors->any())
        <div id="session-status" class="bg-red-600" style="position: fixed; left: 0; right: 0; top: 0; transition: opacity 1s ease-out;">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span class="flex p-2 rounded-lg bg-red-800">
                          <!-- Heroicon name: speakerphone -->
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                          </svg>
                        </span>
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden">Error</span>
                            <span class="hidden md:inline text-white">
                                {{ implode('', $errors->all(':message')) }}
                            </span>
                        </p>
                    </div>
                    <div class="hidden order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                        <a href="#" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-red-600 bg-white hover:bg-red-50">
                            Learn more
                        </a>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                        <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                            <span class="sr-only">Dismiss</span>
                            <!-- Heroicon name: x -->
                            <a href="{{route('asignacions.ejecutivoevaluaciones', ['asignacionid' => $evaluacionfinal->asignacion_id, 'rutejecutivo' => $evaluacionfinal->rut_ejecutivo])}}">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                document.getElementById("session-status").style.opacity=0;
            }, 4000);
        </script>
    @endif

    @if (session('status'))
        <div class="alert alert-success"></div>
        <div id="session-status" class="bg-green-600" style="position: fixed; left: 0; right: 0; top: 0; transition: opacity 1s ease-out;">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span class="flex p-2 rounded-lg bg-green-800">
                          <!-- Heroicon name: speakerphone -->
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                          </svg>
                        </span>
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden">Error</span>
                            <span class="hidden md:inline text-white">{{ session('status') }}</span>
                        </p>
                    </div>
                    <div class="hidden order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                        <a href="#" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-green-600 bg-white hover:bg-green-50">
                            Learn more
                        </a>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                        <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                            <span class="sr-only">Dismiss</span>
                            <!-- Heroicon name: x -->
                            <a href="{{route('asignacions.ejecutivoevaluaciones', ['asignacionid' => $evaluacionfinal->asignacion_id, 'rutejecutivo' => $evaluacionfinal->rut_ejecutivo])}}">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                document.getElementById("session-status").style.opacity=0;
            }, 4000);
        </script>
    @endif

    @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2)
    <data></data>
    <div class="p-6">
        <div class=" p-5 bg-white  shadow-xl sm:rounded-lg ">


            <div class="md:grid md:grid-cols-1 md:gap-6">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="flex-1 min-w-0">
                        <form action="{{ route('evaluacions.atras_desbloqueando', $evaluacionfinal->id) }}" method="GET">
                            <input type="hidden" name="url" value="{{ url()->previous() }}">
                            <input type="hidden" name="formulario" value="1">
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                                Monitoreo - {{$evaluacionfinal->asignacion->agente->servicio->name}} {{$evaluacionfinal->asignacion->agente->habilidad}}
                                <button type="submit" role="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                    <i class="fas fa-arrow-left fa-fw fa-lg mr-2"></i> Volver a Base del Agente
                                </button>
                            </h2>
                        </form>
                        <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: briefcase -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                                </svg>
                                ID Evaluación: {{$evaluacionfinal->id}}
                            </div>
                            <div class="hidden mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: briefcase -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                </svg>
                                Centro/Habilidad: {{$evaluacionfinal->asignacion->agente->servicio->name}} - {{$evaluacionfinal->asignacion->agente->habilidad}}
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: location-marker -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                Movil: {{$evaluacionfinal->movil}}
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: currency-dollar -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd" />
                                    <path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                                </svg>
                                ConnID: {{$evaluacionfinal->connid}}
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: calendar -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                Fecha Chat: {{$evaluacionfinal->fecha_grabacion}}
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: calendar -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                Fecha Evaluación: {{$evaluacionfinal->created_at}}
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: calendar -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                Fecha Modificación: {{$evaluacionfinal->updated_at}}
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: calendar -->
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-500 font-bold">Estado de Evaluación: </p>&nbsp <p> {{$evaluacionfinal->estado->name}}</p>&nbsp&nbsp
                                <p class="text-gray-500 font-bold">PENC: </p>&nbsp <p> {{$evaluacionfinal->penc}}</p>&nbsp&nbsp
                                <p class="text-gray-500 font-bold">PEC Usuario: </p>&nbsp <p> {{$evaluacionfinal->pecu}}</p>&nbsp&nbsp
                                <p class="text-gray-500 font-bold">PEC Negocio: </p>&nbsp <p> {{$evaluacionfinal->pecn}}</p>&nbsp&nbsp
                                <p class="text-gray-500 font-bold">PEC Cumplimiento: </p>&nbsp <p> {{$evaluacionfinal->pecc}}</p>&nbsp&nbsp
                                @if($evaluacionfinal->ici)
                                    <p class="text-gray-500 font-bold">% de Discrepancia: </p>&nbsp <p> {{$evaluacionfinal->ici}}</p>
                                @endif
                            </div>



                            @if(Auth::user()->perfil  == 2)
                            <form action="{{route('evaluacions.guardaeval', $evaluacionfinal->id)}}" method="POST">
                                @csrf


                                <button type="submit" name="descartarEval" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <!-- Heroicon name: check -->

                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                    </svg>
                                    Descartar Evaluación
                                </button>
                                @if($evaluacionfinal->estado_id > 1)
                                <button type="submit" name="enviarRevision" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    <!-- Heroicon name: check -->
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Enviar a Revisión
                                </button>
                                @endif
                            </form>

                            @endif
                            @if(Auth::user()->perfil  == 1)
                                <form action="{{route('evaluacions.guardaeval', $evaluacionfinal->id)}}" method="POST">
                                    @csrf
                                    <div class="flex flex-row inline-flex items-center border-1 m-2">
                                    <div><p class="text-gray-600 font-bold">Cambia de estado: &nbsp&nbsp</p></div>
                                    <div class="text-sm text-gray-500">
                                        <select id="cambioestado" name="cambioestado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($estados as $estado)
                                                <option value="{{$estado->id}}" {{ ( $estado->name == $evaluacionfinal->estado->name) ? 'selected' : '' }}>{{$estado->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                        &nbsp&nbsp
                                    <div>
                                        <button type="submit" name="form3" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Guardar
                                        </button>
                                    </div>
                                    </div>
                                </form>
                            @endif
                            <span class="text-right w-full -mb-4 text-gray-800 text-xs">Bloqueada para <strong>{{ App\Models\User::find($bloqueo->user_id)->name }}</strong> hasta las <strong>{{ $bloqueo->created_at->add(new DateInterval('PT' . \App\Models\Bloqueo::DURACION . 'M'))->format('H:i') }}</strong></span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="flex space-x-4 pt-6 px-6">
        <div class="flex-1 w-1/4 py-8 px-6 bg-white shadow-xl sm:rounded-lg overflow-y-scroll h-screen">

{{--            <h3 class="font-bold">Audio de la conversacion</h3>--}}
{{--            <audio controls>--}}
{{--                <source src="d:\efetepe\dummy.mp3" type="audio/mpeg">--}}
{{--                Your browser does not support the audio element.--}}
{{--            </audio>--}}
{{--            <hr class="mt-3 mb-3">--}}
            @if ($pauta == 1)
                @if ($evaluacionfinal->image_path)
                    {!! $evaluacionfinal->image_path !!}
                @else
                    <form action="{{route('evaluacions.guardaeval', $evaluacionfinal->id)}}" method="POST">
                        @csrf
                        <p class="text-red-600 font-bold">No hay un Chat ingresado.</p>
                        Inserta el texto aca y haz click en guardar

                        <div class="mt-1">
                            <textarea id="textochatinput" name="textochatinput" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Inserta el Texto copiado desde Copycat aquí"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Recuerda que el texto tiene que tener las etiquetas html como por ejemplo < div >
                        </p>
                        <button type="submit" name="form1" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Guardar
                        </button>

                    </form>
                @endif
            @elseif ($pauta == 2)
                <h3 class="font-bold">Audio de la conversacion</h3>
                @if (!$grabacion)
                    <p>Esta evaluación aún no tiene asociada una grabación.</p>
                    <br>
                    <form action="{{ route('evaluacions.grabacion', [$evaluacionfinal->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="evaluacionid" value="{{ $evaluacionfinal->id }}">
                        Elegir una grabación para subir:
                        <input type="file" name="grabacion" id="grabacion">
                        <button type="submit"  class="mt-5 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Guardar Grabacion
                        </button>
                    </form>
                @else
                    <audio controls>
                        <source src="{{ asset('storage/uploads/' . $grabacion->nombre) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <form action="{{ route('evaluacions.eliminar_grabacion', [$evaluacionfinal->id]) }}" method="post" onsubmit="return confirm('¿Seguro que quieres eliminar la grabación? ESTA ACCIÓN ES IRREVERSIBLE!');">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="mt-5 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-700 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Eliminar Grabacion
                        </button>
                    </form>
                @endif
                <hr class="mt-3 mb-3">
            @endif
        </div>
        <div class="w-3/4 p-6 bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg overflow-y-scroll h-screen">
            @if ($pauta == 1)
                @livewire('pauta-digital', ['evaluacionid' => $evaluacionfinal->id])
            @elseif ($pauta == 2)
                @livewire('pauta-call-voz', ['evaluacionid' => $evaluacionfinal->id])
            @endif
        </div>
    </div>
    @endif


</x-app-layout>



