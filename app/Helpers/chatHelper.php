<?php
/*
 * Ayudas para creacion de chats de prueba.
 * Esto deberá ser implementado de otro modo en la versión final
 * @version 1 (210608)
 */

if (! function_exists('crearBurbuja')) {

    function crearBurbuja($mensaje, $esCliente=False)
    {
        ob_start();
        ?><div class="msg">
            <div class="bubble<?php if ($esCliente) echo " alt" ?>">
                <div class="txt">
                    <span class="name<?php if ($esCliente) echo " alt" ?>"><?php echo ($esCliente ? "Cliente" : "BOT"); ?></span>
                    <span class="timestamp"></span><span class="message"><?php echo $mensaje ?></span>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
