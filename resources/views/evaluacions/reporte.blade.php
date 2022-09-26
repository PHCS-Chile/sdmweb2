<x-app-layout>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>


@php

$saludo1 = '';
$saludo2 = '';
$saludo3 = '';
$saludo4 = '';
$saludo5 = '';
$saludo6 = '';
$frases1 = '';
$frases2 = '';
$frases3 = '';
$frases4 = '';
$frases5 = '';
$cordialidad1 = '';
$cordialidad2 = '';
$cordialidad3 = '';
$cordialidad4 = '';
$cordialidad5 = '';
$gestionplanillas1 = '';
$gestionplanillas2 = '';
$gestionplanillas3 = '';
$gestionplanillas4 = '';
$gestionplanillas5 = '';
$ortografia1 = '';
$ortografia2 = '';
$ortografia3 = '';
$ortografia4 = '';
$ortografia5 = '';
$ortografia6 = '';
$ortografia7 = '';
$personalizacion1 = '';
$personalizacion2 = '';
$personalizacion3 = '';
$personalizacion4 = '';
$seguridad1 = '';
$seguridad2 = '';
$seguridad3 = '';
$manejosilecios1 = '';
$manejosilecios2 = '';
$manejosilecios3 = '';
$manejosilecios4 = '';
$aseguramiento1 = '';
$aseguramiento2 = '';
$aseguramiento3 = '';
$ofrecimiento1 = '';
$ofrecimiento2 = '';
$ofrecimiento3 = '';
$ofrecimiento4 = '';
$ofrecimiento5 = '';
$motivo = '';
$gestion1 = '';
$gestion2 = '';
$gestion3 = '';
$deteccion1 = '';
$deteccion2 = '';
$deteccion3 = '';
$deteccion4 = '';
$infocorrecta1 = '';
$infocorrecta2 = '';
$infocorrecta3 = '';
$infocorrecta4 = '';
$procedimiento1 = '';
$procedimiento2 = '';
$procedimiento3 = '';
$procedimiento4 = '';
$resolucion1 = '';
$resolucion2 = '';
$resolucion3 = '';
$pecu_deteccion = '';
$pecu_infocorrecta = '';
$pecu_procedimiento = '';
$pecu_pocoprofesional = '';
$pecu_manipulacliente = '';
$pecu_cierreinteraccion = '';
$pecu_provocacierre = '';
$pecn_beneficio = '';
$pecn_fraude = '';
$pecn_nosondea = '';
$pecn_tipificacion = '';
$pecn_factibilidad = '';
$pecn_otragestion = '';
$pecc_infoconfidencial = '';
$pecc_novalidadatos = '';
$pecc_cierre = '';
$pecc_infoerronea = '';
$asistentevirtual1 = '';
$asistentevirtual2 = '';
$asistentevirtual3 = '';
$gestionesanteriores1 = '';
$gestionesanteriores2 = '';
$gestionesanteriores3 = '';
$usuarios1 = '';
$usuarios2 = '';
$usuarios3 = '';
$comentario_interno = '';
$retroalimentacion = '';
    foreach($respuestas as $respuesta){
    if($respuesta->atributo_id == 1){$saludo1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 2){$saludo2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 3){$saludo3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 4){$saludo4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 5){$saludo5 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 6){$saludo6 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 7){$frases1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 8){$frases2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 9){$frases3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 10){$frases4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 11){$frases5 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 12){$cordialidad1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 13){$cordialidad2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 14){$cordialidad3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 15){$cordialidad4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 16){$cordialidad5 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 17){$gestionplanillas1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 18){$gestionplanillas2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 19){$gestionplanillas3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 20){$gestionplanillas4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 21){$gestionplanillas5 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 22){$ortografia1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 23){$ortografia2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 24){$ortografia3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 25){$ortografia4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 26){$ortografia5 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 27){$ortografia6 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 28){$ortografia7 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 29){$personalizacion1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 30){$personalizacion2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 31){$personalizacion3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 32){$personalizacion4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 33){$seguridad1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 34){$seguridad2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 35){$seguridad3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 36){$manejosilecios1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 37){$manejosilecios2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 38){$manejosilecios3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 39){$manejosilecios4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 40){$aseguramiento1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 41){$aseguramiento2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 42){$aseguramiento3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 43){$ofrecimiento1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 44){$ofrecimiento2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 45){$ofrecimiento3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 46){$ofrecimiento4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 47){$ofrecimiento5 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 48){$motivo = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 49){$gestion1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 50){$gestion2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 51){$gestion3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 52){$deteccion1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 53){$deteccion2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 54){$deteccion3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 55){$deteccion4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 56){$infocorrecta1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 57){$infocorrecta2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 58){$infocorrecta3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 59){$infocorrecta4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 60){$procedimiento1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 61){$procedimiento2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 62){$procedimiento3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 63){$procedimiento4 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 64){$resolucion1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 65){$resolucion2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 66){$resolucion3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 67){$pecu_deteccion = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 68){$pecu_infocorrecta = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 69){$pecu_procedimiento = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 70){$pecu_pocoprofesional = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 71){$pecu_manipulacliente = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 73){$pecu_cierreinteraccion = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 74){$pecu_provocacierre = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 75){$pecn_beneficio = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 76){$pecn_fraude = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 77){$pecn_nosondea = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 78){$pecn_tipificacion = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 79){$pecn_factibilidad = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 80){$pecn_otragestion = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 81){$pecc_infoconfidencial = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 82){$pecc_novalidadatos = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 83){$pecc_cierre = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 84){$pecc_infoerronea = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 85){$asistentevirtual1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 86){$asistentevirtual2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 87){$asistentevirtual3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 88){$gestionesanteriores1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 89){$gestionesanteriores2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 90){$gestionesanteriores3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 91){$usuarios1 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 92){$usuarios2 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 93){$usuarios3 = $respuesta->respuesta_text;}
    if($respuesta->atributo_id == 94){$comentario_interno = $respuesta->respuesta_memo;}
    if($respuesta->atributo_id == 95){$retroalimentacion = $respuesta->respuesta_memo;}
}

@endphp

    <div class="p-6">
        <div class=" p-5 bg-white  shadow-xl sm:rounded-lg ">


            <div class="md:grid md:grid-cols-1 md:gap-6">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="flex-1 min-w-0">
                        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                            Monitoreo - {{$evaluacionfinal->asignacion->agente->servicio->name}} {{$evaluacionfinal->asignacion->agente->habilidad}}
                        </h2>
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
                                <p class="text-gray-500 font-bold">PEC Cumplimiento: </p>&nbsp <p> {{$evaluacionfinal->pecc}}</p>
                            </div>

                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="flex space-x-4 pt-6 px-6">

        <div class="flex-1 w-1/4 py-8 px-6 bg-white shadow-xl sm:rounded-lg overflow-y-scroll h-screen">
            
                {!! $evaluacionfinal->image_path !!}
            
        </div>
        <div class="w-3/4 p-6 bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg overflow-y-scroll h-screen">
            
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-2 md:gap-6">
                            <div class="mt-5 md:mt-0 md:col-span-1 ">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-green-50 space-y-6 sm:p-6">
                                        <p class="font-bold text-xl">Atributos PENC</p>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">1 - Cumple con Scripts de saludo y despedida - ({{$saludo6}})</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="saludo1" name="saludo1" wire:model.lazy="saludo1" type="checkbox" value="checked" disabled="true" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo1}}>
                                                    </div>                                                                   
                                                    <div class="ml-3 text-sm">
                                                        <label for="saludo1" class="font-medium text-gray-700">No saluda o indica nombre al iniciar la conversación</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="saludo2" name="saludo2" wire:model.lazy="saludo2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="saludo2" class="font-medium text-gray-700">No usa preguntas o frases de conexión inicial</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="saludo3" name="saludo3" wire:model.lazy="saludo3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="saludo3" class="font-medium text-gray-700">No Valida contexto indicado previamente</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="saludo4" name="saludo4" wire:model.lazy="saludo4" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo4}}>
                                                    </div>                                        
                                                    <div class="ml-3 text-sm">
                                                        <label for="saludo4" class="font-medium text-gray-700">No se despide y/o realiza de forma poco cordial</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="saludo5" name="saludo5" wire:model.lazy="saludo5" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$saludo5}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="saludo5" class="font-medium text-gray-700">No agradece contacto al despedirse</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">2 - Se comunica de forma simple y cercana - ({{$frases5}})</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="frases1" name="frases1" wire:model.lazy="frases1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$frases1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="frases1" class="font-medium text-gray-700">Utiliza frases formales y/o poco cercanas</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="frases2" name="frases2" wire:model.lazy="frases2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$frases2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="frases2" class="font-medium text-gray-700">Utiliza conceptos técnicos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="frases3" name="frases3" wire:model.lazy="frases3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$frases3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="frases3" class="font-medium text-gray-700">Utiliza frases coloquiales y/o abreviaturas</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="frases4" name="frases4" wire:model.lazy="frases4" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$frases4}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="frases4" class="font-medium text-gray-700">Utiliza más de un emoticón por comentario</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">3 - Utiliza Frases de Cordialidad y de reducción de conflicto - ({{$cordialidad5}})</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cordialidad1" name="cordialidad1" wire:model.lazy="cordialidad1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cordialidad1" class="font-medium text-gray-700">No utiliza frases para expresar disposición para atender</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cordialidad2" name="cordialidad2" wire:model.lazy="cordialidad2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cordialidad2" class="font-medium text-gray-700">No utiliza frases para manifestar interés frente a dificultades</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cordialidad3" name="cordialidad3" wire:model.lazy="cordialidad3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cordialidad3" class="font-medium text-gray-700">No pide disculpas en caso de reclamos de nuestra responsabilidad</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cordialidad4" name="cordialidad4" wire:model.lazy="cordialidad4" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$cordialidad4}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cordialidad4" class="font-medium text-gray-700">No reduce el conflicto frente a cliente alterados</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">4 - Gestión de información y uso de Plantillas - ({{$gestionplanillas5}})</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="gestionplanillas1" name="gestionplanillas1" wire:model.lazy="gestionplanillas1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$gestionplanillas1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="gestionplanillas1" class="font-medium text-gray-700">No Entrega la información de manera ordenada</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="gestionplanillas2" name="gestionplanillas2" wire:model.lazy="gestionplanillas2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$gestionplanillas2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="gestionplanillas2" class="font-medium text-gray-700">Vuelve a solicitar la misma información mas de una vez</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="gestionplanillas3" name="gestionplanillas3" wire:model.lazy="gestionplanillas3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$gestionplanillas3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="gestionplanillas3" class="font-medium text-gray-700">Usa plantillas o imágenes en exceso</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="gestionplanillas4" name="gestionplanillas4" wire:model.lazy="gestionplanillas4" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$gestionplanillas4}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="gestionplanillas4" class="font-medium text-gray-700">Usa plantillas o información irrelevantes para la gestión</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">5 - Mantiene una buena redacción y ortografía - ({{$ortografia7}})</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ortografia1" name="ortografia1" wire:model.lazy="ortografia1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ortografia1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ortografia1" class="font-medium text-gray-700">Errores semánticos y/o sintácticos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ortografia2" name="ortografia2" wire:model.lazy="ortografia2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ortografia2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ortografia2" class="font-medium text-gray-700">Mal uso de reglas de puntuación (puntos y coma)</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ortografia3" name="ortografia3" wire:model.lazy="ortografia3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ortografia3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ortografia3" class="font-medium text-gray-700">Errores de escrituras y aplicación de reglas ortográficas (español)</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ortografia4" name="ortografia4" wire:model.lazy="ortografia4" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ortografia4}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ortografia4" class="font-medium text-gray-700">Escritura incorrecta de palabras técnicas o de origen extranjero</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ortografia5" name="ortografia5" wire:model.lazy="ortografia5" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ortografia5}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ortografia5" class="font-medium text-gray-700">Mal uso del acento diacrítico</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ortografia6" name="ortografia6" wire:model.lazy="ortografia6" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ortografia6}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ortografia6" class="font-medium text-gray-700">Uso incorrecto de Mayúsculas/Minúsculas</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">6 - Se refiere al Cliente por su nombre - ({{$personalizacion4}})</legend>
                                            <div class="hidden mt-4">
                                                <span class="text-gray-700">Personalizacion Padre</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="personalizacion4" wire:model.lazy="personalizacion4" value="Si" {{ $personalizacion4 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Si</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="personalizacion4" wire:model.lazy="personalizacion4" value="No" {{ $personalizacion4 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="personalizacion4" wire:model.lazy="personalizacion4" value="No Aplica" {{ $personalizacion4 == "No Aplica" ? 'checked' : '' }}>
                                                        <p class="ml-2">No Aplica</p>
                                                    </label>
                                                </div>
                                                <small class="text-red-600 font-bold">{{ $errors->first('personalizacion4') }}</small>
                                            </div>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="personalizacion1" name="personalizacion1" wire:model.lazy="personalizacion1" wire:click="xpersonalizacion" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$personalizacion1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="personalizacion1" class="font-medium text-gray-700">No personaliza durante la conversación</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="personalizacion2" name="personalizacion2" wire:model.lazy="personalizacion2" wire:click="xpersonalizacion" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$personalizacion2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="personalizacion2" class="font-medium text-gray-700">Trata al cliente por un nombre/usuario erróneo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="personalizacion3" name="personalizacion3" wire:model.lazy="personalizacion3" wire:click="xpersonalizacion" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$personalizacion3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="personalizacion3" class="font-medium text-yellow-500">No Aplica</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">7 - Proyecta seguridad y dominio de la información - ({{$seguridad3}})</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="seguridad1" name="seguridad1" wire:model.lazy="seguridad1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$seguridad1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="seguridad1" class="font-medium text-gray-700">Proyecta inseguridad o falta de conocimientos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="seguridad2" name="seguridad2" wire:model.lazy="seguridad2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$seguridad2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="seguridad2" class="font-medium text-gray-700">Se autocorrige o se contradice en la conversación</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">8 - Maneja correctamente los tiempos de espera - ({{$manejosilecios4}})</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="manejosilecios1" name="manejosilecios1" wire:model.lazy="manejosilecios1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$manejosilecios1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="manejosilecios1" class="font-medium text-gray-700">No menciona la necesidad de dejar en espera</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="manejosilecios2" name="manejosilecios2" wire:model.lazy="manejosilecios2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$manejosilecios2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="manejosilecios2" class="font-medium text-gray-700">No retoma la conversación en los tiempos definidos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="manejosilecios3" name="manejosilecios3" wire:model.lazy="manejosilecios3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$manejosilecios3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="manejosilecios3" class="font-medium text-gray-700">No agradece el tiempo de espera</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">9 - Realiza aseguramiento de lo informado - ({{$aseguramiento3}})</legend>
                                            <div class="hidden mt-4">
                                                <span class="text-gray-700">Aseguramiento Padre</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="aseguramiento3" wire:model.lazy="aseguramiento3" value="Si" {{ $aseguramiento3 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Si</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="aseguramiento3" wire:model.lazy="aseguramiento3" value="No" {{ $aseguramiento3 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="aseguramiento3" wire:model.lazy="aseguramiento3" value="No Aplica" {{ $aseguramiento3 == "No Aplica" ? 'checked' : '' }}>
                                                        <p class="ml-2">No Aplica</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('aseguramiento3') }}</small>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aseguramiento1" name="aseguramiento1" wire:model.lazy="aseguramiento1" wire:click="xaseguramiento" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$aseguramiento1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aseguramiento1" class="font-medium text-gray-700">No realiza aseguramiento de lo informado</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aseguramiento2" name="aseguramiento2" wire:model.lazy="aseguramiento2" wire:click="xaseguramiento" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$aseguramiento2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aseguramiento2" class="font-medium text-yellow-500">No Aplica</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">10 - Ofrece nuevos productos/servicios - ({{$ofrecimiento5}})</legend>
                                            <div class="hidden mt-4">
                                                <span class="text-gray-700">Ofrecimiento Padre</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="ofrecimiento5" wire:model.lazy="ofrecimiento5" value="Si" {{ $ofrecimiento5 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Si</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="ofrecimiento5" wire:model.lazy="ofrecimiento5" value="No" {{ $ofrecimiento5 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="ofrecimiento5" wire:model.lazy="ofrecimiento5" value="No Aplica" {{ $ofrecimiento5 == "No Aplica" ? 'checked' : '' }}>
                                                        <p class="ml-2">No Aplica</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('ofrecimiento5') }}</small>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ofrecimiento1" name="ofrecimiento1" wire:model.lazy="ofrecimiento1" wire:click="xofrecimiento" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ofrecimiento1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ofrecimiento1" class="font-medium text-gray-700">No realiza ofrecimiento comercial a titular</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ofrecimiento2" name="ofrecimiento2" wire:model.lazy="ofrecimiento2" wire:click="xofrecimiento" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ofrecimiento2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ofrecimiento2" class="font-medium text-gray-700">No argumenta o intenta revertir objeciones</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ofrecimiento3" name="ofrecimiento3" wire:model.lazy="ofrecimiento3" wire:click="xofrecimiento" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ofrecimiento3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ofrecimiento3" class="font-medium text-gray-700">Realiza ofrecimiento comercial a usuario no autorizado</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="ofrecimiento4" name="ofrecimiento4" wire:model.lazy="ofrecimiento4" wire:click="xofrecimiento" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$ofrecimiento4}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="ofrecimiento4" class="font-medium text-yellow-500">No Aplica</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-1 ">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-yellow-50 space-y-6 sm:p-6">
                                        <p class="font-bold text-xl">Atributos PEC</p>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Usuario</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecu_deteccion" name="pecu_deteccion" wire:model.lazy="pecu_deteccion" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_deteccion}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecu_deteccion" class="font-medium text-gray-700">Error grave en la detección de necesidades y en el analisis de la información</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecu_infocorrecta" name="pecu_infocorrecta" wire:model.lazy="pecu_infocorrecta" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_infocorrecta}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecu_infocorrecta" class="font-medium text-gray-700">Error grave en la gestión por Info incorrecta o incompleta</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecu_procedimiento" name="pecu_procedimiento" wire:model.lazy="pecu_procedimiento" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_procedimiento}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecu_procedimiento" class="font-medium text-gray-700">Error grave en la gestión por no resolver o resolver de forma errónea</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecu_pocoprofesional" name="pecu_pocoprofesional" wire:model.lazy="pecu_pocoprofesional" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_pocoprofesional}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecu_pocoprofesional" class="font-medium text-gray-700">Atención Irrespetuosa y Gestión poco Profesional</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecu_manipulacliente" name="pecu_manipulacliente" wire:model.lazy="pecu_manipulacliente" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_manipulacliente}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecu_manipulacliente" class="font-medium text-gray-700">Manipula al Cliente para concretar venta</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecu_cierreinteraccion" name="pecu_cierreinteraccion" wire:model.lazy="pecu_cierreinteraccion" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_cierreinteraccion}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecu_cierreinteraccion" class="font-medium text-gray-700">Cierre anticipado de la Interacción</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecu_provocacierre" name="pecu_provocacierre" wire:model.lazy="pecu_provocacierre" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecu_provocacierre}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecu_provocacierre" class="font-medium text-gray-700">Provoca o incita el cierre por inactividad</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Negocio</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecn_beneficio" name="pecn_beneficio" wire:model.lazy="pecn_beneficio" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_beneficio}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecn_beneficio" class="font-medium text-gray-700">Entrega Beneficio o Excepción comercial fuera de Procedimiento</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecn_fraude" name="pecn_fraude" wire:model.lazy="pecn_fraude" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_fraude}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecn_fraude" class="font-medium text-gray-700">Fraude</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecn_nosondea" name="pecn_nosondea" wire:model.lazy="pecn_nosondea" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_nosondea}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecn_nosondea" class="font-medium text-gray-700">No Sondea motivo de renuncia o no Retiene</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecn_tipificacion" name="pecn_tipificacion" wire:model.lazy="pecn_tipificacion" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_tipificacion}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecn_tipificacion" class="font-medium text-gray-700">No Tipifica en sistema o lo realiza de manera incorrecta.</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecn_factibilidad" name="pecn_factibilidad" wire:model.lazy="pecn_factibilidad" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_factibilidad}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecn_factibilidad" class="font-medium text-gray-700">Validación de Factibilidad Técnica y Comercial</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecn_otragestion" name="pecn_otragestion" wire:model.lazy="pecn_otragestion" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecn_otragestion}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecn_otragestion" class="font-medium text-gray-700">Otra Gestión Indebida</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Cumplimiento</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecc_infoconfidencial" name="pecc_infoconfidencial" wire:model.lazy="pecc_infoconfidencial" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecc_infoconfidencial}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecc_infoconfidencial" class="font-medium text-gray-700">Entrega información confidencial</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecc_novalidadatos" name="pecc_novalidadatos" wire:model.lazy="pecc_novalidadatos" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecc_novalidadatos}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecc_novalidadatos" class="font-medium text-gray-700">No valida correctamente los datos personales del Cliente</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecc_cierre" name="pecc_cierre" wire:model.lazy="pecc_cierre" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecc_cierre}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecc_cierre" class="font-medium text-gray-700">No realiza cierre de negocio según procedimiento</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="pecc_infoerronea" name="pecc_infoerronea" wire:model.lazy="pecc_infoerronea" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$pecc_infoerronea}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="pecc_infoerronea" class="font-medium text-gray-700">Omite o Indica erróneamente información que es regulada legalmente</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="pt-6"></div>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-50 space-y-6 sm:p-6">
                                        <p class="font-bold text-xl">Caracterización Complementaria</p>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Asistente Virtual</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="asistentevirtual1" name="asistentevirtual1" wire:model.lazy="asistentevirtual1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$asistentevirtual1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="asistentevirtual1" class="font-medium text-gray-700">No comprende el motivo del Cliente</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="asistentevirtual2" name="asistentevirtual2" wire:model.lazy="asistentevirtual2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$asistentevirtual2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="asistentevirtual2" class="font-medium text-gray-700">Cliente insiste mas de una vez en contacto con ejecutivo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="asistentevirtual3" name="asistentevirtual3" wire:model.lazy="asistentevirtual3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$asistentevirtual3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="asistentevirtual3" class="font-medium text-gray-700">Deriva de forma incorrecta al ejecutivo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Gestiones anteriores</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="gestionesanteriores1" name="gestionesanteriores1" wire:model.lazy="gestionesanteriores1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$gestionesanteriores1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="gestionesanteriores1" class="font-medium text-gray-700">Abandonos previos por parte de otros ejecutivos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="gestionesanteriores2" name="gestionesanteriores2" wire:model.lazy="gestionesanteriores2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$gestionesanteriores2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="gestionesanteriores2" class="font-medium text-gray-700">Abandonos previos por parte del Cliente</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="gestionesanteriores3" name="gestionesanteriores3" wire:model.lazy="gestionesanteriores3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$gestionesanteriores3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="gestionesanteriores3" class="font-medium text-gray-700">Más de una conversación reciente por el mismo motivo (NO FCR)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Usuarios</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="usuarios1" name="usuarios1" wire:model.lazy="usuarios1" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$usuarios1}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="usuarios1" class="font-medium text-gray-700">Cliente molesto por la atención de la asistente virtual</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="usuarios2" name="usuarios2" wire:model.lazy="usuarios2" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$usuarios2}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="usuarios2" class="font-medium text-gray-700">Cliente molesto por la atención de los ejecutivos del canal</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="usuarios3" name="usuarios3" wire:model.lazy="usuarios3" type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$usuarios3}}>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="usuarios3" class="font-medium text-gray-700">Cliente solicita ser contactado telefónicamente</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>




                                    </div>

                                </div>
                                <div class="pt-6">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div>
                                                <label for="comentario_interno" class="block text-sm font-medium text-gray-700">
                                                    Comentario Interno
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="comentario_interno" name="comentario_interno" wire:model.lazy="comentario_interno" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-30 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Escribe aquí la descripción del caso">{{$comentario_interno}}</textarea>
                                                </div>
                                            </div>


                                            <div>
                                                <label for="retroalimentacion" class="block text-sm font-medium text-gray-700">
                                                    Retroalimentación
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="retroalimentacion" name="retroalimentacion" wire:model.lazy="retroalimentacion" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 h-48 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Escribe aquí la retroalimentación">{{$retroalimentacion}}</textarea>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('retroalimentacion') }}</small>
                                            <div></div>
                                            <button type="submit"  wire:click="save" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <!-- Heroicon name: check -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                Guardar Evaluación
                                            </button>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mb-10 pt-6">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="mt-5 md:mt-0 md:col-span-1 ">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <p class="font-bold text-xl">Gestión 1</p>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Motivo del Llamado</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="motivo" wire:model.lazy="motivo" value="Reclamo" {{ $motivo == "Reclamo" ? 'checked' : '' }}>
                                                        <p class="ml-2">Reclamo</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="motivo" wire:model.lazy="motivo" value="Consulta" {{ $motivo == "Consulta" ? 'checked' : '' }}>
                                                        <p class="ml-2">Consulta</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="motivo" wire:model.lazy="motivo" value="Requerimiento" {{ $motivo == "Requerimiento" ? 'checked' : '' }}>
                                                        <p class="ml-2">Requerimiento</p>
                                                    </label>
                                                </div>
                                                <small class="text-red-600 font-bold">{{ $errors->first('motivo') }}</small>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="gestion1" class="block text-sm font-medium text-gray-700">Tipo de Gestión</label>
                                                <select id="gestion1" name="gestion1" wire:model.lazy="gestion1" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @foreach($gestiones as $gestion)
                                                        <option value="{{$gestion->name}}" {{ ( $gestion->name == $gestion1) ? 'selected' : '' }}>
                                                            {{$gestion->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('gestion1') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Detección de necesidades/sondeo/analisis/revisión</span>                                    
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="deteccion1" wire:model.lazy="deteccion1" value="Si" {{ $deteccion1 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="deteccion1" wire:model.lazy="deteccion1" value="No" {{ $deteccion1 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('deteccion1') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Entrega de información correcta y completa</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="infocorrecta1" wire:model.lazy="infocorrecta1" value="Si" {{ $infocorrecta1 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="infocorrecta1" wire:model.lazy="infocorrecta1" value="No" {{ $infocorrecta1 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('infocorrecta1') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Gestiona según proced. en sistema</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="procedimiento1" wire:model.lazy="procedimiento1" value="Si" {{ $procedimiento1 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="procedimiento1" wire:model.lazy="procedimiento1" value="No" {{ $procedimiento1 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('procedimiento1') }}</small>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="resolucion1" class="block text-sm font-medium text-gray-700">Ejecutivo Resuelve el problema de origen en línea</label>
                                                <select id="resolucion1" name="resolucion1" wire:model.lazy="resolucion1" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @foreach($resoluciones as $resolucion)
                                                        <option value="{{$resolucion->name}}" {{ ( $resolucion->name == $resolucion1) ? 'selected' : '' }}>
                                                            {{$resolucion->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('resolucion1') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-1 ">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <p class="font-bold text-xl">Gestión 2</p>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="gestion2" class="block text-sm font-medium text-gray-700">Tipo de Gestión</label>
                                                <select id="gestion2" name="gestion2" wire:model.lazy="gestion2" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @foreach($gestiones as $gestion)
                                                        <option value="{{$gestion->name}}" {{ ( $gestion->name == $gestion2) ? 'selected' : '' }}>
                                                            {{$gestion->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('gestion2') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Detección de necesidades/sondeo/analisis/revisión</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="deteccion2" wire:model.lazy="deteccion2" value="Si" {{ $deteccion2 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="deteccion2" wire:model.lazy="deteccion2" value="No" {{ $deteccion2 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('deteccion2') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Entrega de información correcta y completa</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="infocorrecta2" wire:model.lazy="infocorrecta2" value="Si" {{ $infocorrecta2 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="infocorrecta2" wire:model.lazy="infocorrecta2" value="No" {{ $infocorrecta2 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('infocorrecta2') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Gestiona según proced. en sistema</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="procedimiento2" wire:model.lazy="procedimiento2" value="Si" {{ $procedimiento2 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="procedimiento2" wire:model.lazy="procedimiento2" value="No" {{ $procedimiento2 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('procedimiento2') }}</small>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="resolucion2" class="block text-sm font-medium text-gray-700">Ejecutivo Resuelve el problema de origen en línea</label>
                                                <select id="resolucion2" name="resolucion2" wire:model.lazy="resolucion2" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @foreach($resoluciones as $resolucion)
                                                        <option value="{{$resolucion->name}}" {{ ( $resolucion->name == $resolucion2) ? 'selected' : '' }}>
                                                            {{$resolucion->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('resolucion2') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-1 ">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <p class="font-bold text-xl">Gestión 3</p>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="gestion3" class="block text-sm font-medium text-gray-700">Tipo de Gestión</label>
                                                <select id="gestion3" name="gestion3" wire:model.lazy="gestion3" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @foreach($gestiones as $gestion)
                                                        <option value="{{$gestion->name}}" {{ ( $gestion->name == $gestion3) ? 'selected' : '' }}>
                                                            {{$gestion->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('gestion3') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Detección de necesidades/sondeo/analisis/revisión</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="deteccion3" wire:model.lazy="deteccion3" value="Si" {{ $deteccion3 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="deteccion3" wire:model.lazy="deteccion3" value="No" {{ $deteccion3 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('deteccion3') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Entrega de información correcta y completa</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="infocorrecta3" wire:model.lazy="infocorrecta3" value="Si" {{ $infocorrecta3 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="infocorrecta3" wire:model.lazy="infocorrecta3" value="No" {{ $infocorrecta3 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('infocorrecta3') }}</small>
                                            <div class="mt-4">
                                                <span class="text-gray-700">Gestiona según proced. en sistema</span>
                                                <div class="mt-2 text-sm">
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="procedimiento3" wire:model.lazy="procedimiento3" value="Si" {{ $procedimiento3 == "Si" ? 'checked' : '' }}>
                                                        <p class="ml-2">Sí</p>
                                                    </label>
                                                    <label class="inline-flex items-center ml-6">
                                                        <input type="radio" class="form-radio" name="procedimiento3" wire:model.lazy="procedimiento3" value="No" {{ $procedimiento3 == "No" ? 'checked' : '' }}>
                                                        <p class="ml-2">No</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('procedimiento3') }}</small>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="resolucion3" class="block text-sm font-medium text-gray-700">Ejecutivo Resuelve el problema de origen en línea</label>
                                                <select id="resolucion3" name="resolucion3" wire:model.lazy="resolucion3" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @foreach($resoluciones as $resolucion)
                                                        <option value="{{$resolucion->name}}" {{ ( $resolucion->name == $resolucion3) ? 'selected' : '' }}>
                                                            {{$resolucion->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-red-600 font-bold">{{ $errors->first('resolucion3') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            
        </div>
    </div>
    


</x-app-layout>



