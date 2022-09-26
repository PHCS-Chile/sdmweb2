{{--
Plantilla: Evaluaciones (plantilla general)
Versión 5
--}}
<x-app-layout>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <script>
        function esconderAlerta(containerid) {
            document.getElementById(containerid + "_alert").style.display = "none";
        }

        function CopyToClipboard(containerid) {
            document.getElementById(containerid + "_alert").style.display = "flex";
            setTimeout(function() {
                esconderAlerta(containerid);
            }, 1000);
        }

    </script>
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
                document.getElementById("session-status").style.display = 'none';
            }, 4000);
        </script>
    @endif
    @livewire('evaluacion-header', [
        'bloqueo' => $bloqueo,
        'modales' => $modales,
        'evaluacionfinal' => $evaluacionfinal,
        'estados' => $estados,
        'grabaciones' => $grabaciones,
    ])

    @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2)

    <div class="flex space-x-4 pt-6 px-6">
        <div class="flex-1 w-1/4 py-8 px-6 bg-white shadow-xl sm:rounded-lg overflow-y-scroll h-screen">

                @if($evaluacionfinal->estado_conversacion > 7)
                    @foreach($grabaciones->all() as $posicion => $grabacion)
                        {!!$grabacion->url !!}
                    @endforeach

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

        </div>
        <div class="w-3/4 p-6 bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg overflow-y-scroll h-screen">
            @livewire('pauta-digital', ['evaluacionid' => $evaluacionfinal->id])
        </div>
    </div>
    @endif


</x-app-layout>



