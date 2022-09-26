{{--
Plantilla: supervision.bloqueados
Versión 1
--}}

<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Inicio') }}</h2>
    </x-slot>

    {{-- Breadcrumb --}}
{{--    <div class="breadcrumb">--}}
{{--        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--            {!! Breadcrumbs::render('reportes', $mercadoSeleccionado) !!}--}}
{{--        </div>--}}
{{--    </div>--}}

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
    @if(Auth::user()->perfil == 1)

        <div class="w-full py-6 px-10">
            <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">

            <div class="block">
                <strong class="flex flex-row inline-flex mr-10" style="font-size: 26px; font-weight: 600">Evaluaciones bloqueadas</strong>
            </div>

            <div class="block mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID Evaluación
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estudio
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Bloqueada por
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tiempo
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($bloqueos as $bloqueo)
                                    <tr>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $bloqueo->evaluacion_id }}</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $bloqueo->evaluacion->asignacion->estudio->name }}</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $bloqueo->user->name }}</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                              {{ ucfirst(diferenciaFechas($bloqueo->created_at)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            <form action="{{ route('supervision.desbloquear') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="bloqueo_id" value="{{ $bloqueo->id }}">
                                                <button type="submit" name="descartarEval" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-600 hover:bg-blue-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                                    </svg>
                                                    Desbloquear
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>

    @endif
</x-app-layout>



