<div class="@if($modal['id']) opacity-100 fixed @else opacity-0 hidden @endif w-full h-full top-0 left-0 flex items-center justify-center transition-all">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <button wire:click="cerrarModal" class="absolute top-0 right-0 flex flex-col items-center mt-4 mr-4 text-white text-xs">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
        </button>
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-base font-bold">{{ $modal['titulo'] }}</p>
                <button wire:click="cerrarModal" class="cursor-pointer">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </button>
            </div>

            @if($modal['id'] == 'historial')
                @if(count($modal['contenido']) > 0)
                    @foreach($modal['contenido'] as $cambio)
                        <p><strong>{{ \App\Models\User::find($cambio->user_id)->name }}</strong>: {{ $cambio->detalle }}</p>
                    @endforeach
                @else
                    <p><i class="text-gray-500">Sin cambios.</i></p>
                @endif
            @elseif($modal['id'] == 'centro')
                <div class="h-96 overflow-y-scroll">
                    @if(count($modal['contenido']) > 0)
                        @foreach($modal['contenido'] as $respuesta)
                            <p class=" @if($respuesta->respuesta_text != $respuestas[$respuesta->atributo_id]) text-red-600 @endif "><strong>{{ $respuesta->atributo->name }}</strong>: {{ $respuesta->respuesta_text }}</p>
                        @endforeach
                    @else
                        <p><i class="text-gray-500">Sin respuestas del centro.</i></p>
                    @endif
                </div>
            @elseif($modal['id'] == 'ici')
                <div class="h-96 overflow-y-scroll">
                    @if(count($modal['contenido']) > 0)
                        @foreach($modal['contenido'] as $respuesta)
                            <p class=" @if($respuesta->respuesta_text != $respuestas[$respuesta->atributo_id]) text-red-600 @endif "><strong>{{ $respuesta->atributo->name }}</strong>: {{ $respuesta->respuesta_text }}</p>
                        @endforeach
                    @else
                        <p><i class="text-gray-500">Sin respuestas del centro.</i></p>
                    @endif
                </div>
            @endif

            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button wire:click="cerrarModal" class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Cerrar</button>
            </div>
        </div>
    </div>
</div>

