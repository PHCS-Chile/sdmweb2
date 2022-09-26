<style>
    html {
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
    }

    p, h2{
        color: #888;
        font-weight: 600;
        letter-spacing: 1px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    *, *:before, *:after {
        box-sizing: inherit;
    }

    .background {
        padding: 0 25px 25px;
        position: relative;
        width: 100%;
    }

    .background::after {
        content: '';
        background: #96cdeb;
        background: -moz-linear-gradient(top, #96cdeb 0%, #5ab5e4 100%);
        background: -webkit-linear-gradient(top, #96cdeb 0%,#5ab5e4 100%);
        background: linear-gradient(to bottom, #96cdeb 0%,#5ab5e4 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#96cdeb', endColorstr='#5ab5e4',GradientType=0 );
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    @media (min-width: 900px) {
        .background {
            padding: 0 0 25px;
        }
    }

    .container {
        margin: 0 auto;
        padding: 25px 0 0;
        max-width: 96%;
        width: 100%;
    }

    .panel {
        background-color: #fff;
        border-radius: 10px;
        padding: 25px 25px;
        position: relative;
        width: 100%;
        z-index: 10;
    }

</style>

<div class="background">
    <div class="container">

        <div class="panel">
            <img src="http://www.phcschile.com/phcssignature.jpg" alt="" class="pricing-header">
            <h2>Datos Identificación Evaluación</h2>
            <p>ID Evaluación:</p>
            <p>Habilidad:</p>
            <p>Fecha Evaluación:</p>
            <p>Centro:</p>
            <h2>Datos Identificación Llamada</h2>
            <p>Fecha Llamado:</p>
            <p>Fono Origen:</p>
            <p>ConnID:</p>
            <p>Nivel EC:</p>
            <h2>Gestión y Resolución</h2>
            <table>
                <tr>
                    <th></th>
                    <th>Centro</th>
                    <th>Auditoria</th>
                </tr>
                <tr>
                    <td>Motivo del Llamado:</td>
                    <td>Reclamo</td>
                    <td>Reclamo</td>
                </tr>
                <tr>
                    <td>Gestión:</td>
                    <td>Comunicación o Redes</td>
                    <td>Comunicación o Redes</td>
                </tr>
            </table>
            <h2>Atributos PENC</h2>
            <table>
                <tr>
                    <th></th>
                    <th>Centro</th>
                    <th>Auditoria</th>
                </tr>
                <tr>
                    <td>Protocolo de Saludo y Despedida:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Disposición para la atención:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Cordialidad y reducción de conflicto:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Manejo de Silencios:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Seguridad y Dominio:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Comunicación simple:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Educar al Cliente:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Aseguramiento:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Ofrecimiento Comercial:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Frases de Enganche:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
            </table>

            <h2>Atributos PEC Usuario</h2>
            <table>
                <tr>
                    <th></th>
                    <th>Centro</th>
                    <th>Auditoria</th>
                </tr>
                <tr>
                    <td>Error grave en detección de necesidades:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Error grave en gestión por Info incorrecta:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Error grave no resuelve:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Atendió de forma grosera:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Poco profesional:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Manipula al Cliente:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
            </table>
            <h2>Atributos PEC Negocio</h2>
            <table>
                <tr>
                    <th></th>
                    <th>Centro</th>
                    <th>Auditoria</th>
                </tr>
                <tr>
                    <td>No sondea:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Descalifica a Entel:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Beneficio fuera de procedimiento:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Fraude:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>No libera línea:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Validación factibilidad técnica:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Ingreso a Sistema:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Otra gestión indebida:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
            </table>
            <h2>Atributos PEC Cumplimiento</h2>
            <table>
                <tr>
                    <th></th>
                    <th>Centro</th>
                    <th>Auditoria</th>
                </tr>
                <tr>
                    <td>Niega Escalamiento:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Omite o Indica eróneamente info:</td>
                    <td>No</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Entrega info confidencial:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>Cierre de Negocios:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>No valida datos personales:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
                <tr>
                    <td>No coordina correctamente Despacho:</td>
                    <td>Si</td>
                    <td>Si</td>
                </tr>
            </table>
            <h2>Comentarios de la Evaluación</h2>
            <table>
                <tr>
                    <td>Descripción del Caso:</td>
                    <td>Cliente se comunica debido a que tiene problemas de internet (no carga).</td>
                </tr>
                <tr>
                    <td>Descripción Respuesta:</td>
                    <td>  Ejecutivo valida si la consulta es por la línea desde la que llama (sí) y nombre completo de titular. Verifica que cliente llamó antes y cliente informa que le solicitaron poner el equipo en modo avión/reiniciarlo, pero que el problema continúa. Ejecutivo consulta si su equipo es un “J4” (sí) y verifica que la línea está activa/tiene saldo. Valida comuna (Teno, Región del Maule), desde cuándo ocurre el problema (varios días), si ocurre en cualquier momento (sí) y si otros usuarios tienen la misma dificultad (sí, su esposo). Verifica que no hay inconvenientes en el sector, indica que generará un reinicio de señal y solicita que, luego de 5 minutos, cliente reinicie el equipo. Informa que puede reiniciar la señal desde la App y recomienda que el esposo de cliente lo solicite de esa forma. Finalmente, valida que la información esté clara, agradece y se despide.</td>
                </tr>
                <tr>
                    <td>Retroalimentación al Ejecutivo:</td>
                    <td>EC: No realiza pregunta de sondeo “¿El problema le ocurre en cualquier parte o en 1 lugar específico?”. Se considera crítico por detección de necesidades.

                        EC: Verifica que hubo un desregistro previo y no continúa con paso 5 del procedimiento, además, no verifica estado de datos en equipo de cliente ni informa que puede solicitar el

                        desregistro a través de Claudia/103, adicionalmente, indica que reiniciará la señal, pero no hay registro de Teardown en Panel 360. Se considera crítico por información incorrecta.

                        EC: No genera Teardown. Se considera crítico por no resolver.

                        EC: Entrega información de sistema a tercero, sin validar Rut de titular. Se considera crítico por no validar y por entregar información confidencial.

                        EC: No deja registro de la no venta, además, manipula la tipificación, registrando observaciones como “PROBO EN OTRO EQUIPO: NO/ ¿LE OCURRE EN LUGAR ESPECIFICO?: NO”, cuando</td>
                </tr>

            </table>
        </div>
    </div>
</div>
