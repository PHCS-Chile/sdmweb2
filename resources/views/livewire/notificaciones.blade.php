{{--
Plantilla: livewire/notificaciones
Versión 2
--}}

<div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="px-8">

            <strong class="block mr-10 mb-7" style="font-size: 26px; font-weight: 600">Notificaciones</strong>

            <div class="mb-4 inline-block float-right ml-2">
                @if($notificaciones->count() > 0)
                <button onclick="confirm('Seguro que quieres elimiar todas las notificaciones?') || event.stopImmediatePropagation()" wire:click="quitarNotificaciones()" class="mt-7 inline-flex items-center px-2 py-2 rounded-md shadow-sm text-sm font-medium text-red-400 transition-all ease-in-out bg-white border border-red-400 hover:bg-red-600 hover:border-red-600 hover:text-white focus:outline-none">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                    Marcar todas como leidas
                </button>
                @else
                    <button class="cursor-not-allowed mt-7 inline-flex items-center px-2 py-2 rounded-md shadow-sm text-sm font-medium text-gray-400 transition-all ease-in-out bg-white border border-gray-400" disabled>
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                        Marcar todas como leidas
                    </button>
                @endif
            </div>

            <div class="mb-4 inline-block float-right ml-2">
                <label for="orden" class="opacity-0">Orden</label>
                <select id="orden" wire:model="orden" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="1">Antiguas primero</option>
                    <option value="2">Nuevas primero</option>
                </select>
            </div>

            <div class="mb-4 inline-block float-right ml-2">
                <label for="leidas" class="opacity-0">Estado</label>
                <select id="leidas" name="leidas" wire:model="filtroLeida" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="0">No Leídas</option>
                    <option value="1">Leídas</option>
                    <option value="99">Todas</option>
                </select>
            </div>

            <div class="mb-4 inline-block float-right ml-2">
                <label for="pagination">Mostrar</label>
                <select id="pagination" name="pagination" autocomplete="" wire:model="pagination" class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="25">25 Notificaciones</option>
                    <option value="50">50 Notificaciones</option>
                    <option value="100">100 Notificaciones</option>
                </select>
            </div>

            <div class="mb-4 inline-block">
                <label for="filtroEstudio">Estudio</label>
                <select id="filtroEstudio" name="filtroEstudio" wire:model="filtroEstudio" autocomplete=""  class="mt-1 block w-auto py-2 pl-2 pr-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="0">Todos</option>

                </select>
            </div>

        </div>

        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="pl-3 py-2 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Evaluación
                        </th>
                        <th scope="col" class="pl-3 py-2 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Estudio
                        </th>
                        <th scope="col" class="pl-4 py-2 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col" class="pl-4 py-2 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Antiguedad
                        </th>
                        <th scope="col" class="pl-4 py-2 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">

                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @if($notificaciones->count() > 0)
                    @foreach($notificaciones as $notificacion)
                        <tr class="hover:bg-gray-100">
                            <td class="pl-3 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $notificacion->evaluacion_id }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $notificacion->evaluacion->asignacion->estudio->name }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $notificacion->evaluacion->estado->name }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ diferenciaFechas($notificacion->updated_at) }}
                                </div>
                            </td>
                            <td class="pl-4 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    <a class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                        href="{{ route('evaluacions.index.notify', [$notificacion->evaluacion_id]) }}">Ver</a>
                                    <button wire:click="quitarNotificaciones({{ $notificacion->evaluacion->id }})" class="inline-flex items-center px-2 py-0.5 border border-transparent rounded-md shadow-sm text-xs font-bold border border-red-700 text-red-700 bg-white hover:bg-red-700 hover:text-white transition-all ease-in-out">
                                        Quitar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td></td>
                            <td><i class="text-gray-400 text-sm">No se han encontrado notificaciones sin leer</i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    <!-- More items... -->
                    </tbody>
                </table>
                <div class="mx-2">{{ $notificaciones->links() }}</div>
            </div>
        </div>
    </div>
</div>

