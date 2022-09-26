{{--
Plantilla: evaluacions/reportes
Versión 2
--}}

<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Inicio') }}</h2>
    </x-slot>

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
{{--            {!! Breadcrumbs::render('asignaciones', $estudio, $periodo) !!}--}}
        </div>
    </div>

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
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
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

    {{-- Contenido TODO: Revisar consistencia de tags HTML --}}
    @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2)

        <div class="w-full max-w-sm py-6">
            <div class="flex items-center">
                <div class="md:w-1/3">
                    <label for="mercados" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Mercados</label>
                </div>
                <div class="md:w-2/3">
                    <select id="mercados" name="mercados" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option disabled selected>Elegir mercado...</option>
                    @foreach($mercados as $mercado)
                        <option value="{{ $mercado->mercado }}">{{ $mercado->mercado }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script>
            $('#mercados').change(function () {
                window.location.href = '{{ url('reportes') }}/' + $('#mercados').val();
            });
        </script>

    @endif
</x-app-layout>



