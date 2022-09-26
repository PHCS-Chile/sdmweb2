<div id="{{ $modal['id'] }}" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-2xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-xs z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-xs">(Esc)</span>
        </div>
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <form class="w-full" method="POST" action="{{ route('evaluacion.reportar_grabacion', [$modal['evaluacion_id']]) }}">
                @csrf
                <input type="hidden" name="evaluacion_id" value="{{ $modal['evaluacion_id'] }}">

                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-base font-bold mb-4 text-2xl">{{ $modal['titulo'] }}</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <div>
                    <div class="form-check">
                        <input onchange="verificarCB{{ $modal['evaluacion_id'] }}()" class="problema-grabacion-cb form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="problemaGrabacion" value="inexistente" id="no-existe-{{ $modal['evaluacion_id'] }}" @if($modal['estado_conversacion'] == 9) checked @endif>
                        <label class="form-check-label inline-block text-gray-800" for="no-existe-{{ $modal['evaluacion_id'] }}">
                            No existe
                        </label>
                    </div>
                    <div class="form-check">
                        <input onchange="verificarCB{{ $modal['evaluacion_id'] }}()" class="problema-grabacion-cb form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="problemaGrabacion" value="problema" id="no-evaluable-{{ $modal['evaluacion_id'] }}" @if(in_array($modal['estado_conversacion'], [14, 15, 16])) checked @endif>
                        <label class="form-check-label inline-block text-gray-800" for="no-evaluable-{{ $modal['evaluacion_id'] }}">
                            No es posible evaluarla
                        </label>
                    </div>

                    <div class="ml-10 mt-4">
                        <div class="form-check pg-{{ $modal['evaluacion_id'] }} @if(!in_array($modal['estado_conversacion'], [14, 15, 16])) hidden @endif">
                            <input onchange="verificarCB{{ $modal['evaluacion_id'] }}()" class="pg-cb-{{ $modal['evaluacion_id'] }} form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="grabacionNoEvaluable" value="duracion" id="problema-duracion-{{ $modal['evaluacion_id'] }}" @if($modal['estado_conversacion'] == 14) checked @endif>
                            <label class="pg-label-{{ $modal['evaluacion_id'] }} form-check-label inline-block text-gray-800" for="problema-duracion-{{ $modal['evaluacion_id'] }}">
                                Duración superior a 30 minutos
                            </label>
                        </div>
                        <div class="form-check pg-{{ $modal['evaluacion_id'] }} @if(!in_array($modal['estado_conversacion'], [14, 15, 16])) hidden @endif">
                            <input onchange="verificarCB{{ $modal['evaluacion_id'] }}()" class="pg-cb-{{ $modal['evaluacion_id'] }} form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="grabacionNoEvaluable" value="incompleta" id="problema-incompleto-{{ $modal['evaluacion_id'] }}" @if($modal['estado_conversacion'] == 15) checked @endif>
                            <label class="pg-label-{{ $modal['evaluacion_id'] }} form-check-label inline-block text-gray-800" for="problema-incompleto-{{ $modal['evaluacion_id'] }}">
                                Está incompleta
                            </label>
                        </div>
                        <div class="form-check pg-{{ $modal['evaluacion_id'] }} @if(!in_array($modal['estado_conversacion'], [14, 15, 16])) hidden @endif">
                            <input onchange="verificarCB{{ $modal['evaluacion_id'] }}()" class="pg-cb-{{ $modal['evaluacion_id'] }} form-check-input appearance-none rounded-full h-4 w-4 border focus:outline-none border-gray-300 bg-white checked:bg-blue-600 transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="grabacionNoEvaluable" value="inaudible" id="problema-inaudible-{{ $modal['evaluacion_id'] }}" @if($modal['estado_conversacion'] == 16) checked @endif>
                            <label class="pg-label-{{ $modal['evaluacion_id'] }} form-check-label inline-block text-gray-800" for="problema-inaudible-{{ $modal['evaluacion_id'] }}">
                                No se entiende
                            </label>
                        </div>
                    </div>

                </div>


                <!--Footer-->
                <div class="space-x-2 flex justify-end pt-2">
                    <button type="button" class="modal-close px-3 bg-red-500 py-1.5 rounded-lg text-white hover:bg-indigo-400">Cancelar</button>
                    <button id="pg-guardar-{{ $modal['evaluacion_id'] }}" type="submit" class="px-3 bg-green-500 py-1.5 rounded-lg text-white guardar-inactivo" disabled>Guardar</button>
                </div>

            </form>
        </div>
    </div>

    <style>
        .guardar-activo {
            cursor: pointer;
            opacity: 1;
        }

        .guardar-inactivo {
            cursor: not-allowed;
            opacity: 0.3;
        }
    </style>

    <script>
        var pgNoExiste{{ $modal['evaluacion_id'] }} = document.getElementById("no-existe-{{ $modal['evaluacion_id'] }}");
        var pgNoEvaluable{{ $modal['evaluacion_id'] }} = document.getElementById("no-evaluable-{{ $modal['evaluacion_id'] }}");
        var guardar{{ $modal['evaluacion_id'] }} = document.getElementById("pg-guardar-{{ $modal['evaluacion_id'] }}");
        var pgChildren{{ $modal['evaluacion_id'] }} = document.getElementsByClassName("pg-{{ $modal['evaluacion_id'] }}");
        var pgChildrenCB{{ $modal['evaluacion_id'] }} = document.getElementsByClassName("pg-cb-{{ $modal['evaluacion_id'] }}");

        function activarGuardar{{ $modal['evaluacion_id'] }}() {
            guardar{{ $modal['evaluacion_id'] }}.classList.remove("guardar-inactivo");
            guardar{{ $modal['evaluacion_id'] }}.classList.add("guardar-activo");
            guardar{{ $modal['evaluacion_id'] }}.disabled = false;
        }

        function desactivarGuardar{{ $modal['evaluacion_id'] }}() {
            guardar{{ $modal['evaluacion_id'] }}.classList.remove("guardar-activo");
            guardar{{ $modal['evaluacion_id'] }}.classList.add("guardar-inactivo");
            guardar{{ $modal['evaluacion_id'] }}.disabled = true;
        }

        function activarHijos{{ $modal['evaluacion_id'] }}() {
            for (let i = 0; i < pgChildren{{ $modal['evaluacion_id'] }}.length; i++) {
                pgChildren{{ $modal['evaluacion_id'] }}[i].classList.remove("hidden");
            }
        }

        function desactivarHijos{{ $modal['evaluacion_id'] }}() {
            for (let i = 0; i < pgChildren{{ $modal['evaluacion_id'] }}.length; i++) {
                pgChildren{{ $modal['evaluacion_id'] }}[i].classList.add("hidden");
            }
        }

        function hijoMarcado{{ $modal['evaluacion_id'] }}() {
            for (let i = 0; i < pgChildrenCB{{ $modal['evaluacion_id'] }}.length; i++) {
                if (pgChildrenCB{{ $modal['evaluacion_id'] }}[i].checked) {
                    return true;
                }
            }
            return false;
        }

        function verificarCB{{ $modal['evaluacion_id'] }}() {

            if (pgNoExiste{{ $modal['evaluacion_id'] }}.checked) {
                desactivarHijos{{ $modal['evaluacion_id'] }}();
                activarGuardar{{ $modal['evaluacion_id'] }}();
            }
            if (pgNoEvaluable{{ $modal['evaluacion_id'] }}.checked) {
                activarHijos{{ $modal['evaluacion_id'] }}();
                desactivarGuardar{{ $modal['evaluacion_id'] }}();
                if (hijoMarcado{{ $modal['evaluacion_id'] }}()) {
                    activarGuardar{{ $modal['evaluacion_id'] }}();
                }
            }
        }
    </script>

</div>

