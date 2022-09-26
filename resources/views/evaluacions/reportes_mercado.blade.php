{{--
Plantilla: evaluacions/reportes_mercado (nombre temporal)
Versión 3
--}}

<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Inicio') }}</h2>
    </x-slot>

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {!! Breadcrumbs::render('reportes', $mercadoSeleccionado) !!}
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

    <form class="w-full py-6 px-10" method="POST" action="{{ route('evaluacions.reportes_filtrado') }}">

        <div class="block">

            @csrf
            <input type="hidden" name="filter" value="1">
            <input id="panel_activo" type="hidden" name="panel_activo" value="{{ empty($panelActivo) ? 1 : $panelActivo }}">

            <div class="inline-block mb-2">
                <label for="periodo" class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">Periodo</label>
                <select id="periodo" name="periodo" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($periodos as $periodo)
                        <option {{ $periodo->id == $periodoSeleccionado ? 'selected' : '' }} value="{{ $periodo->id }}">{{ $periodo->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inline-block mb-2">
                <label for="mercado" class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">Mercado</label>
                <select id="mercado" name="mercado" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($mercados as $mercado)
                        <option {{ $mercado['id'] === $mercadoSeleccionado ? 'selected' : '' }} value="{{ $mercado['id'] }}">{{ $mercado['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inline-block mb-2">
                <label for="estudio" class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">Estudio</label>
                <select id="estudio" name="estudio" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($estudios as $estudio)
                        <option {{ $estudio->id == $estudioSeleccionado ? 'selected' : '' }} value="{{ $estudio->id }}">{{ $estudio->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inline-block mb-2">
                <label for="servicio" class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">Servicio</label>
                <select id="servicio" name="servicio" class="block mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($servicios as $servicio)
                        <option {{ $servicio->id == $servicioSeleccionado ? 'selected' : '' }} value="{{ $servicio->id }}">{{ $servicio->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inline-block align-bottom mb-2">
                <button id="submit" type="submit" class="block border border-transparent ease-in-out transition px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-800 2xl:group-hover:bg-red-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
            </div>

            <div class="float-right inline-block shadow overflow-hidden border-b border-gray-200 sm:rounded-lg align-bottom">
                <table class="mt-2 divide-y divide-gray-200 block">
                    <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="pl-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Por Revisar</th>
                        <th scope="col" class="pl-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Revisados</th>
                        <th scope="col" class="pl-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Para Enviar</th>
                        <th scope="col" class="pl-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enviadas</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-gray-600 font-bold text-center text-lg pl-3 py-1 whitespace-nowrap">{{$evaluaciones->where('estado_id',3)->count()}}</td>
                        <td class="text-gray-600 font-bold text-center text-lg pl-3 py-1 whitespace-nowrap">{{$evaluaciones->where('estado_id',5)->count()}}</td>
                        <td class="text-gray-600 font-bold text-center text-lg pl-3 py-1 whitespace-nowrap">{{$evaluaciones->where('estado_reporte',12)->count()}}</td>
                        <td class="text-gray-600 font-bold text-center text-lg pl-3 py-1 whitespace-nowrap">{{$evaluaciones->where('estado_reporte',13)->count()}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </form>


    <style>
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
        .tab.active {
            --tw-text-opacity: 1;
            color: rgba(59, 130, 246, var(--tw-text-opacity));
            border-bottom-width: 2px;
            font-weight: 500;
            --tw-border-opacity: 1;
            border-color: rgba(59, 130, 246, var(--tw-border-opacity));
        }
    </style>

    <div class="w-full max-w-sm py-6 contents">
        <div class="bg-white px-10">
            <nav class="tabs flex flex-col sm:flex-row">
                <button data-target="panel-1" id="tab_1" class="tab {{ $panelActivo == 1 ? 'active' : '' }} text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                    Pendientes ({{ $evaluaciones->where('estado_reporte', 11)->count() }})
                </button>
                <button data-target="panel-2" id="tab_2" class="tab {{ $panelActivo == 2 ? 'active' : '' }} ext-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                    Revisados Para Enviar ({{ $evaluaciones->where('estado_reporte', 12)->count() }})
                </button>
                <button data-target="panel-3" id="tab_3" class="tab {{ $panelActivo == 3 ? 'active' : '' }} text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                    Revisados Enviados ({{ $evaluaciones->where('estado_reporte', 13)->count() }})
                </button>
            </nav>
        </div>

        <div id="panels" class="px-10">

            @foreach([1 => 11, 2 => 12, 3 => 13] as $panel => $estadoReporte)

            <div class="panel-{{ $panel }} tab-content {{ $panel == $panelActivo ? 'active' : '' }} pt-5 pb-14">
                <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="pl-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Agente
                                </th>
                                <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                @if($panel == 3)
                                <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Reporte
                                </th>
                                @endif
                                <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha conversación
                                </th>
                                <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Móvil
                                </th>
                                <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha evaluación
                                </th>
                                <th scope="col" class="pl-4 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($evaluaciones as $evaluacion)
                                @if($evaluacion->estado_reporte == $estadoReporte)
                                <tr>
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
                                    @if($panel == 3)
                                    <td class="pl-4 py-1 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-800">
                                                {!! ucfirst($evaluacion->reportes->first()->etiqueta) ?: '<i style="color: gray">ID: ' . $evaluacion->reportes->first()->id . '</i>' !!}
                                            </span>
                                        </div>
                                    </td>
                                    @endif
                                    <td class="pl-4 py-1 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ formatoFecha($evaluacion->fecha_grabacion) }}
                                        </div>
                                    </td>
                                    <td class="pl-4 py-1 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $evaluacion->movil }}
                                        </div>
                                    </td>
                                    <td class="pl-4 py-1 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $evaluacion->fecha_completa ? formatoFecha($evaluacion->fecha_completa) : '' }}
                                        </div>
                                    </td>
                                    <td class="flex">
                                        <a class="inline-flex items-center h-6 px-1 m-0.5 text-sm text-indigo-100 transition-colors duration-150 bg-blue-500 rounded focus:shadow-outline hover:bg-blue-700" href="{{ route('evaluacions.index', [$evaluacion->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    @if($panel == 2)
                        <form class="text-right" action="{{ route('evaluacions.crear_reporte') }}" method="POST" onsubmit="return confirm('Está seguro que desea crear un reporte a partir de estas evaluaciones?')">
                            @csrf
                            <input type="hidden" name="evaluaciones" value="{{ implode(",", $evaluaciones->where('estado_reporte', 12)->pluck('id')->all()) }}">
                            <div class="flex flex-row-reverse content-evenly text-right mt-2">
                                @if($todoFiltrado)
                                <button type="submit" class="ml-1 inline-flex items-center px-2 py-1 text-sm text-green-500 border border-green-500 transition-colors duration-150 bg-transparent rounded focus:shadow-outline hover:text-white hover:bg-green-500">
                                @else
                                <button type="" class="cursor-not-allowed ml-1 inline-flex items-center px-2 py-1 text-sm text-gray-400 border border-gray-300 transition-colors duration-150 bg-transparent rounded focus:shadow-outline hover:bg-gray-100" disabled>
                                @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg> Crear Reporte
                                </button>
                                <label for="etiqueta" class="sr-only">Etiqueta</label>
                                @if($todoFiltrado)
                                <input autocomplete="off" placeholder="Etiqueta (opcional)..." type="text" name="etiqueta" id="etiqueta" class="placeholder-gray-300 text-md inline-flex align-middle border py-1 border-gray-300 bg-white px-5 rounded-lg text-xs-sm focus:outline-none">
                                @else
                                <input autocomplete="off" placeholder="Etiqueta (opcional)..." type="text" name="etiqueta" id="etiqueta" class="cursor-not-allowed placeholder-gray-300 text-md inline-flex align-middle border py-1 border-gray-300 bg-white px-5 rounded-lg text-xs-sm focus:outline-none" disabled>
                                @endif
                            </div>
                            <div class="content-evenly text-right mt-2">
                                @if(!$todoFiltrado)
                                <p class="text-red-500 text-xs italic">No ha filtrado por todos los criterios.</p>
                                @endif
                                @if($evaluaciones->where('estado_reporte', 12)->count() == 0)
                                <p class="text-red-500 text-xs italic">No hay evaluaciones en la lista.</p>
                                @endif
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            @endforeach

        </div>
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        const tabs = document.querySelectorAll(".tabs");
        const tab = document.querySelectorAll(".tab");
        const panel = document.querySelectorAll(".tab-content");

        function onTabClick(event) {

            // deactivate existing active tabs and panel

            for (let i = 0; i < tab.length; i++) {
                tab[i].classList.remove("active");
            }

            for (let i = 0; i < panel.length; i++) {
                panel[i].classList.remove("active");
            }


            // activate new tabs and panel
            event.target.classList.add('active');
            $('#panel_activo').val(event.target.id.substring(4));
            let classString = event.target.getAttribute('data-target');
            console.log(classString);
            document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active");
        }

        for (let i = 0; i < tab.length; i++) {
            tab[i].addEventListener('click', onTabClick, false);
        }
    </script>
    <script>
        $('#mercados').change(function () {
            window.location.href = '{{ url('reportes') }}/' + $('#mercados').val();
        });
    </script>

    @endif
</x-app-layout>



