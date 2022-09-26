<div id="cambiar-ejecutivo" class="{{  }} fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="cambiar_ejecutivo_overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-xs z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-xs">(Esc)</span>
        </div>
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <form class="w-full" method="POST" action="DUMMY">
{{--            <form class="w-full" method="POST" action="{{ route('evaluacion.cambiar_ejecutivo', [$modal['evaluacion_id']]) }}">--}}
                @csrf
                <input type="hidden" name="cambiar_ejecutivo_evaluacion_id" value="DUMMY">

                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p id="cambiar_ejecutivo_titulo" class="text-base font-bold mb-4 text-2xl">DUMMY</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <div class="flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="cambiar_ejecutivo_nombre">
                            Nombre
                        </label>
                    </div>
                    <div class="w-2/3">
                        <input oninput="validarNombreCambiarEjecutivo(this)" class="bg-gray-50 appearance-none border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="cambiar_ejecutivo_nombre" id="cambiar_ejecutivo_nombre" type="text" value="DUMMY">
                    </div>
                </div>

                <div class="flex md:items-center mb-6">
                    <div class="w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="cambiar_ejecutivo_rut">
                            RUT
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-50 appearance-none border-2 border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="cambiar_ejecutivo_rut" id="cambiar_ejecutivo_rut" type="text" value="DUMMY">
                    </div>
                </div>


                <!--Footer-->
                <div class="space-x-2 flex justify-end pt-2">
                    <button type="button" class="modal-close px-3 bg-red-500 py-1.5 rounded-lg text-white hover:bg-indigo-400">Cancelar</button>
                    <button id="cambiar_ejecutivo_guardar" type="submit" class="px-3 bg-green-500 py-1.5 rounded-lg text-white hover:bg-green-400 guardar-inactivo" disabled>Guardar</button>
{{--                    <button id="cambiar_ejecutivo_guardar" type="submit" class="px-3 bg-green-500 py-1.5 rounded-lg text-white hover:bg-green-400 @if($modal['nombre_ejecutivo']) guardar-activo @else guardar-inactivo @endif" @if(!$modal['nombre_ejecutivo']) disabled @endif>Guardar</button>--}}
                </div>


            </form>
        </div>
    </div>
    <style>

    </style>
    <script>
        var cambiarEjecutivoNombre= document.getElementById("cambiar_ejecutivo_nombre");
        var cambiarEjecutivoBoton = document.getElementById("cambiar_ejecutivo_guardar");

        function validarNombreCambiarEjecutivo(object) {
            if (object.value === "") {
                desactivarGuardarCambiarEjecutivo();
            } else {
                activarGuardarCambiarEjecutivo();
            }
        }

        function activarGuardarCambiarEjecutivo() {
            cambiarEjecutivoBoton.classList.remove("guardar-inactivo");
            cambiarEjecutivoBoton.classList.add("guardar-activo");
            cambiarEjecutivoBoton.disabled = false;
        }

        function desactivarGuardarCambiarEjecutivo() {
            cambiarEjecutivoBoton.classList.remove("guardar-activo");
            cambiarEjecutivoBoton.classList.add("guardar-inactivo");
            cambiarEjecutivoBoton.disabled = true;
        }
    </script>
</div>

