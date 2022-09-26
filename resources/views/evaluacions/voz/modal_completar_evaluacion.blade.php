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
            <form class="w-full" method="POST" action="{{ route('evaluacion.completar', [$modal['evaluacion_id']]) }}">
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


                <div class="flex items-center mb-6 space-x-2">
                    <div class="w-1/3">
                        <label class="block text-gray-500 font-bold text-right mb-1 pr-2" for="fecha_grabacion-{{ $modal['evaluacion_id'] }}">
                            Fecha de grabación
                        </label>
                    </div>
                    <div class="w-1/3 relative">
                        <span class="text-gray-300 absolute left-1 top-0 text-xs">
                            Fecha (DD/MM/AAAA)
                        </span>
                        <input oninput="validarFecha(this)" class="bg-gray-50 appearance-none border border-gray-400 rounded w-full pt-4 pb-1 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 placeholder-gray-300" name="fecha_grabacion" id="fecha_grabacion-{{ $modal['evaluacion_id'] }}" type="text" value="{{ $modal['fecha_grabacion'] ? date_format(date_create($modal['fecha_grabacion']), 'd/m/Y') : "" }}">
                    </div>
                    <div class="w-1/6 relative">
                        <label class="text-gray-300 absolute left-1 top-0 text-xs" for="hora_grabacion-{{ $modal['evaluacion_id'] }}">
                            Hora (0-23)
                        </label>
                        <input oninput="validarHora(this)" min="0" max="23" class="w-24 bg-gray-50 appearance-none border border-gray-400 rounded pt-4 pb-1 px-4 text-gray-700 focus:outline-none focus:bg-white focus:border-purple-500 placeholder-gray-300" name="hora_grabacion" id="hora_grabacion-{{ $modal['evaluacion_id'] }}" type="number" value="{{ $modal['fecha_grabacion'] ? intval(date_format(date_create($modal['fecha_grabacion']), 'H')) : "" }}">
                    </div>
                    <div class="w-1/6 relative">
                        <label class="text-gray-300 absolute left-1 top-0 text-xs" for="minutos_grabacion-{{ $modal['evaluacion_id'] }}">
                            Minuto (0-59)
                        </label>
                        <input oninput="validarMinutos(this)" min="0" max="60" class="w-24 bg-gray-50 appearance-none border border-gray-400 rounded pt-4 pb-1 px-4 text-gray-700 focus:outline-none focus:bg-white focus:border-purple-500 placeholder-gray-300" name="minutos_grabacion" id="minutos_grabacion-{{ $modal['evaluacion_id'] }}" type="number" value="{{ $modal['fecha_grabacion'] ? intval(date_format(date_create($modal['fecha_grabacion']), 'i')) : "" }}">
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="movil">
                            Móvil
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-50 appearance-none border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="movil" id="movil" type="number" value="{{ $modal['movil'] }}">
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="connid">
                            ConnID
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-50 appearance-none border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="connid" id="connid" type="text" value="{{ $modal['connid'] }}">
                    </div>
                </div>


            <!--Footer-->
                <div class="space-x-2 flex justify-end pt-2">
                    <button type="button" class="modal-close px-3 bg-red-500 py-1.5 rounded-lg text-white hover:bg-indigo-400">Cancelar</button>
                    <button type="submit" class="px-3 bg-green-500 py-1.5 rounded-lg text-white hover:bg-green-400">Guardar</button>
                </div>

                <script>


                    function validarHora(object)
                    {
                        if (object.value > 23)
                            object.value = 23
                        if (object.value < 0)
                            object.value = 0
                    }

                    function validarMinutos(object)
                    {
                        if (object.value > 59)
                            object.value = 59
                        if (object.value < 0)
                            object.value = 0
                    }

                    function validarFecha(object)
                    {
                        if (object.value.replace(/^[\d\/]*$/, "").length > 0) {
                            object.value = object.value.substring(0, object.value.length - 1);
                        }
                    }

                </script>

            </form>
        </div>
    </div>
</div>

