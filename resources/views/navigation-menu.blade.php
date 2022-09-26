{{--
Plantilla: navigation-menu
Versión 5
--}}

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2)
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Asignaciones</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- User Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Estudios
                                </div>
                                @foreach(App\Models\Estudio::all() as $estudio)
                                    @if($estudio->id == 3)
                                        <div x-data="{ opensm: false }"  @mouseover.away="opensm = false">
                                            <div class="cursor-pointer block hover:bg-gray-100 px-4 py-2 text-sm text-gray-700" @mouseover="opensm = true">
                                                {{ $estudio->name }}
                                            </div>
                                            <div x-show="opensm"
                                                 x-transition:enter="transition ease-out duration-200"
                                                 x-transition:enter-start="transform opacity-0 scale-95"
                                                 x-transition:enter-end="transform opacity-100 scale-100"
                                                 x-transition:leave="transition ease-in duration-75"
                                                 x-transition:leave-start="transform opacity-100 scale-100"
                                                 x-transition:leave-end="transform opacity-0 scale-95"
                                                 class="relative z-50 mt-2 rounded-md shadow-lg"
                                                 style="display: none;"
                                                 @click="opensm = false">
                                                <x-jet-dropdown-link class="border-l-8 border-gray-300 bg-gray-100 hover:bg-gray-200 hover:border-gray-400" href="{{ route('asignaciones.subestudio', [$estudio->id, 'ventas']) }}">
                                                    Ventas
                                                </x-jet-dropdown-link>
                                                <x-jet-dropdown-link class="border-l-8 border-gray-300 bg-gray-100 hover:bg-gray-200 hover:border-gray-400" href="{{ route('asignaciones.subestudio', [$estudio->id, 'no-ventas']) }}">
                                                    No Ventas
                                                </x-jet-dropdown-link>
                                            </div>
                                        </div>

                                    @else
                                        <x-jet-dropdown-link href="{{ route('asignaciones.estudio', [$estudio->id]) }}">
                                            {{ $estudio->name }}
                                        </x-jet-dropdown-link>
                                    @endif
                                @endforeach
                            </x-slot>
                        </x-jet-dropdown>
                    </div>

                    @if(Auth::user()->perfil == 1)
                        <x-jet-nav-link href="{{ route('calidad.index') }}" :active="request()->routeIs('calidad.index')">
                            {{ __('Calidad') }}
                        </x-jet-nav-link>
                    @endif

                    @if(Auth::user()->perfil == 1)
                        <x-jet-nav-link href="{{ route('avances.index') }}" :active="request()->routeIs('avances.index')">
                            {{ __('Avances') }}
                        </x-jet-nav-link>
                    @endif

                    @if(Auth::user()->perfil == 1)
                        <x-jet-nav-link href="{{ route('evaluacions.reportes') }}" :active="request()->routeIs('evaluacions.reportes')">
                            {{ __('Reportes') }}
                        </x-jet-nav-link>
                    @endif

                    @if(Auth::user()->perfil == 2)
                        <x-jet-nav-link href="{{ route('mis-evaluaciones.index') }}" :active="request()->routeIs('mis-evaluaciones.index')">
                            {{ __('Mis Evaluaciones') }}
                        </x-jet-nav-link>
                    @endif

                    @if(Auth::user()->esAdmin() || Auth::user()->esSupervisor())
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>Avanzado</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    @if(Auth::user()->esSupervisor())
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Supervisión
                                        </div>
                                        <x-jet-dropdown-link href="{{ route('supervision.bloqueos') }}">
                                            Desbloquear evaluación
                                        </x-jet-dropdown-link>
                                    @endif
                                    @if(Auth::user()->esAdmin())
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Administracion
                                            </div>
                                            <x-jet-dropdown-link href="{{ route('mantener.ponderadores') }}">
                                                Modificar ponderadores
                                            </x-jet-dropdown-link>
                                    @endif

                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif
                </div>
                @endif
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())

                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

{{--                ESTO DEBE SER ELIMINADO ALO PASAR A TESTING--}}
                @if(Auth::user()->id == 1)
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                Perfil {{ Auth::user()->perfil }}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::user()->perfil == 2)
                            <x-jet-dropdown-link href="{{ route('perfil', [1]) }}">Perfil 1</x-jet-dropdown-link>
                            @endif
                            @if(Auth::user()->perfil == 1)
                            <x-jet-dropdown-link href="{{ route('perfil', [2]) }}">Perfil 2</x-jet-dropdown-link>
                            @endif
                        </x-slot>
                    </x-jet-dropdown>
                </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 pt-2 text-xs text-gray-500 italic font-bold">
                                {{ strtoupper(Auth::user()->name) }}
                            </div>
                            <div class="block px-4 pb-2 text-xs text-gray-400 -mt-1">
                                Gestionar cuenta
                            </div>
                            <hr>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                Ver perfil
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Desconectarse
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                {{-- Notificaciones--}}
                @if(Auth::user()->perfil == 1)
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="96">
                        <x-slot name="trigger">
                            <button class=" hover:bg-gray-200 h-7 inline-block rounded-full">
                                <svg fill="none" viewBox="0 0 24 24" stroke="#666" class="h-7 -mr-1 align-text-top animate-swing origin-top inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                @php
                                    $cuentaSinLeer = Notificacion::contarSinLeer();
                                    $notificacionesParaMostrar = Notificacion::obtenerSinLeer(8);
                                    //dd(Notificacion::obtenerSinLeer(8));
                                @endphp
                                <sup class="text-md font-normal {{ $cuentaSinLeer > 0 ? 'bg-red-700' : 'bg-gray-500' }} px-1.5 py-0.5 text-white -ml-2 rounded-full">{{ $cuentaSinLeer }}</sup>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <div class="block px-4 py-2 text-sm text-gray-500">
                                Primeras <strong>{{ $notificacionesParaMostrar->count() }}</strong> Notificaciones
                            </div>


                                @if($cuentaSinLeer > 0)
                                    @foreach($notificacionesParaMostrar as $notificacion)
                                        <x-jet-dropdown-link href="{{ route('evaluacions.index.notify', [$notificacion->evaluacion->id]) }}">
                                            <div class="inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                                </svg>
                                            </div>
                                            <div class="inline-block">
                                                <div class="-mt-1"><strong>{{ $notificacion->evaluacion->asignacion->agente->name }}</strong></div>
                                                <div class="-mt-1 text-gray-400">{{ ucfirst(diferenciaFechas($notificacion->created_at)) }}</div>
                                            </div>
                                        </x-jet-dropdown-link>
                                    @endforeach
                                        @if($cuentaSinLeer > 8)
                                        <div class="italic block px-4 py-2 text-sm text-gray-500">
                                            {{ $cuentaSinLeer - 8 }} notificaciones más...
                                        </div>
                                        @endif
                                @else
                                    <div class="block px-4 py-2 text-sm text-gray-500 text-center">
                                        <i>No hay notificaciones.</i>
                                    </div>
                                @endif



                            <x-jet-dropdown-link href="{{ route('usuario.notificaciones') }}" class="text-center">
                                <strong>Ver todas las notificaciones</strong>
                            </x-jet-dropdown-link>

                        </x-slot>
                    </x-jet-dropdown>

                </div>
                @endif

            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
