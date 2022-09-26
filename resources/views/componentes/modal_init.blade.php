<style>
    .modal {
        transition: opacity 0.25s ease;
    }
    body.modal-active {
        overflow-x: hidden;
        overflow-y: visible !important;
    }
</style>
<script>
    // Apertura de los modales
    var modalActivo = "";
    var openmodal = document.querySelectorAll('.modal-open');
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            if (modalActivo === "") {
                var id = event.currentTarget.getAttribute("modal-target")
                abrirModal(id);
                modalActivo = id;
            } else {
                cerrarModal();
                modalActivo = "";
            }

        })
    }

    // Cerrar por click en el fondo
    const overlay = document.querySelector('.modal-overlay')
    var id = overlay.parentElement.parentElement.getAttribute("modal-target")
    overlay.addEventListener('click', cerrarModal)

    // Cerrar por click en la cruz
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', cerrarModal)
    }

    // Cerrar por ESC
    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            cerrarModal()
        }
    };


    function abrirModal (trigger) {
        const body = document.querySelector('body')
        const modal = document.querySelector('#' + trigger)
        modal.classList.remove('opacity-0')
        modal.classList.remove('pointer-events-none')
        body.classList.add('modal-active')
        modalActivo = trigger
    }

    function cerrarModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('#' + modalActivo)
        modal.classList.add('opacity-0')
        modal.classList.add('pointer-events-none')
        body.classList.remove('modal-active')
        modalActivo = ""
    }

</script>

