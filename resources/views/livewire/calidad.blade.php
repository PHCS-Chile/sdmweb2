<div>
    <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Evaluador
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Discrepancia % Promedio
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Base Revisada
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">


                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$usuario->name}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{number_format($this->promedioici($usuario->id),1)}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$this->cuentaici($usuario->id)}}

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- More items... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <div class="flex flex-row inline-flex items-center my-5">
                            <div>
                                <p class="ml-5 text-gray-600 font-bold">Periodo:&nbsp&nbsp</p>
                            </div>

                            <div>
                                <div class="text-sm text-gray-500">
                                    <select id="seleccionPeriodo" name="seleccionPeriodo" wire:model="filtroPeriodo" class="py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach($periodos as $periodo)
                                            <option value="{{$periodo->id}}">{{$periodo->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div wire:loading>
                            &nbsp&nbspCargando...
                        </div>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID Evaluacion
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <p>Usuario</p>
                                <div class="col-span-6 sm:col-span-3">

                                    <select id="filtroUsuario" name="filtroUsuario" autocomplete="" wire:model="filtroUsuario" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="0">Todos</option>
                                        @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <p>Estado</p>
                                <div class="col-span-6 sm:col-span-3">

                                    <select id="filtroEstado" name="filtroEstado" autocomplete="" wire:model="filtroEstado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="0">Todos</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nivel EC
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Evaluacion
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Discrepancia %
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Calidad
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Ir</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">ICI</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">


                            @foreach($evaluaciones as $evaluacion)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$evaluacion->id}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$evaluacion->user->name}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$evaluacion->estado->name}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @switch($evaluacion->nivel_ec)
                                            @case(1)
                                                <span>Leve</span>
                                                @break

                                            @case(2)
                                                <span>Intermedio</span>
                                                @break

                                            @case(3)
                                            <span>Grave</span>
                                            @break

                                            @default
                                                <span></span>
                                                @break
                                        @endswitch                                        
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{date('d-m-Y H:i', strtotime($evaluacion->fecha_completa))}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$evaluacion->ici}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @if($evaluacion->fecha_ici)
                                            {{date('d-m-Y H:i', strtotime($evaluacion->fecha_ici))}}
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('evaluacions.index', ['evaluacion_id'=>$evaluacion->id])}}" class="text-indigo-600 hover:text-indigo-900">Ir</a>
                                </td>
                                <td>
                                    @if(Auth::user()->perfil  == 1)
                                        @if($evaluacion->fecha_ici)
                                            <form method="POST" action="{{ route('evaluacions.resetici', [$evaluacion->id]) }}" onsubmit="return confirm('¿Seguro quieres borrar la ICI? (Acción irreversible)');">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-default">[ Eliminar ICI ]</button>
                                            </form>
                                        @else
                                            <span><i class="text-gray-300">Sin ICI</i></span>
                                        @endif
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        <!-- More items... -->
                        </tbody>
                    </table>
                    <div class="px-3 py-2">{{ $evaluaciones->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
