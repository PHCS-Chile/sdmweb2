<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
{{--            {!! Breadcrumbs::render('asignacion-agrupado', $asignacion) !!}--}}
        </div>
    </div>

    {{-- Contenido --}}
    <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
        <div class="flex flex-row items-center mb-4">
            <strong class="inline-flex mr-10 flex-1" style="font-size: 26px; font-weight: 600">
                Modificar Ponderadores
            </strong>
        </div>
    </div>

    <div class="flex max-w-7xl mx-auto">

        <div class="w-1/4 sm:px-6 lg:px-8 pt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <strong>Estudios</strong>

                    @foreach($estudios as $estudio)
                    <div class="mt-4">
                        <div class="mt-2 text-sm">
                            <label class="inline-flex items-center">
                                <input type="radio" class="disabled:opacity-50 form-radio" name="estudio" wire:model="estudio" value="{{ $estudio->id }}">
                                <p class="ml-2">{{ $estudio->name }}</p>
                            </label>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="w-3/4 sm:px-6 lg:px-8 pt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name Interno
                                </th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Atributo
                                </th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ponderador<br>Puntaje
                                </th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ponderador<br>Calidad
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($atributos['objetos'] as $atributo)
                                    <tr class="group @if($atributo->check_primario == 1) bg-gray-200 @endif">
                                        <td class="px-3 whitespace-nowrap group-hover:bg-blue-100">
                                            <div class="flex items-center">
                                                <div class="">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        #{{ $atributo->id }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 whitespace-nowrap group-hover:bg-blue-100">
                                            <div class="flex items-center">
                                                <div class="">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $atributo->name_interno }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 whitespace-nowrap group-hover:bg-blue-100">
                                            <div class="flex items-center">
                                                <div class="">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ strlen($atributo->name) > 50 ? substr($atributo->name, 0, 50) . "..." : $atributo->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 whitespace-nowrap group-hover:bg-blue-100">
                                            <div class="flex items-center">
                                                <div class="">
                                                    @if(isset($atributos['ponderador'][$atributo->id]) && Auth::user()->id < 3)
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <label class="sr-only" for="ponderador-{{ $atributo->id }}"></label>
                                                        <input wire:model.lazy="atributos.ponderador.{{ $atributo->id }}" id="ponderador-{{ $atributo->id }}" class="w-20 py-1 border-2 border-gray-300 bg-white px-2 rounded-lg text-xs focus:outline-none" type="number" placeholder="Ej. 1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="@if(in_array($atributo->id, $modificados['ponderador'])) opacity-100 @else opacity-0 @endif inline text-green-500 h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    @else
                                                    <div class="text-sm bg-gray-400 font-medium text-gray-900"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 whitespace-nowrap group-hover:bg-blue-100">
                                            <div class="flex items-center">
                                                <div class="">
                                                    @if(isset($atributos['ponderador_ici'][$atributo->id]))
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <label class="sr-only" for="ponderador_ici-{{ $atributo->id }}"></label>
                                                        <input wire:model.lazy="atributos.ponderador_ici.{{ $atributo->id }}" id="ponderador_ici-{{ $atributo->id }}" class="w-20 py-1 border-2 border-gray-300 bg-white px-2 rounded-lg text-xs focus:outline-none" type="number" placeholder="Ej. 1" disabled>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="@if(in_array($atributo->id, $modificados['ponderador_ici'])) opacity-100 @else opacity-0 @endif inline text-green-500 h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    @else
                                                    <div class="h-7 text-sm bg-gray-400 font-medium text-gray-900"></div>
                                                    @endif
                                                </div>
                                            </div>
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
