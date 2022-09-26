<?php
/*
 * Ayudas para manejo de fechas en español.
 * Si esto puede ser escrito utilizando sólo funciones date de PHP, tanto mejor.
 * @version 5
 */

if (! function_exists('mesEspanol')) {
    /**
     * Devuelve el nombre en español de un mes, según su posición en el año.
     *
     * @param $mes
     * @return string
     */
    function mesEspanol($mes)
    {
        $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
            'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
        return $meses[$mes - 1];
    }
}

if (! function_exists('mesEspanolCorto')) {
    /**
     * Devuelve el nombre en español de un mes, según su posición en el año, como un string de 3 letras.
     *
     * @param $mes
     * @return string
     */
    function mesEspanolCorto($mes)
    {
        $mes = intval($mes);
        $meses = ['ene', 'feb', 'mar', 'abr', 'may', 'jun',
            'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];
        return ucfirst($meses[$mes - 1]);
    }
}

if (! function_exists('crearPeriodos')) {
    /**
     * Crea un arreglo con todos pos periodos mes-año a partir dl mes y año indicados hasta la actualidad.
     *
     * @param $mesInicio    int El mes de inicio
     * @param $anoInicio    int El año de inicio
     * @return array        Un arreglo con los periodos
     */
    function crearPeriodos(int $mesInicio, int $anoInicio): array
    {
        $periodos = [];
        $mesActual = date('n');
        $anoActual = date('Y');
        if ($anoInicio . ajustarMes($mesInicio) <= $anoActual . ajustarMes($mesActual)) {
            $periodo = [$mesInicio, $anoInicio];
            while ($periodo[0] != $mesActual || $periodo[1] != $anoActual) {
                array_push($periodos, $periodo);
                $periodo = siguientePeriodo($periodo);
            }
            array_push($periodos, [$mesActual, $anoActual]);
        }
        return $periodos;
    }
}

if (! function_exists('siguientePeriodo')) {
    /**
     * Entrega un arreglo con el mes y año del siguiente período
     *
     * @param $periodo  array   Un arreglo de 2 elemento donde el primero es el mes y el segundo es el año.
     * @return array    Un arreglo correspondiendo al siguiente periodo.
     */
    function siguientePeriodo(array $periodo): array
    {
        if ($periodo[0] == 12) {
            return [1, $periodo[1] + 1];
        }
        return [$periodo[0] + 1, $periodo[1]];
    }
}

if (! function_exists('idDePeriodo')) {
    /**
     * Entrega un string con el id del periodo, según formato utilizado en la tabla de periodos. Por ejemplo, si
     * el año es el 2022 y el mes el 5, el id del periodo sería '2205'.
     *
     * @param   array   $periodo    Un arreglo de 2 elemento donde el primero es el mes y el segundo es el año.
     * @return  string  Un string con el id del periodo
     */
    function idDePeriodo(array $periodo): string
    {
        $mes = ajustarMes($periodo[0]);
        $ano = substr($periodo[1], 2);
        return $ano . $mes;
    }
}

if (! function_exists('ajustarMes')) {
    /**
     * Devuelve una representación del mes con un ancho de 2 caracteres. Por ejemplo, el mes 5 devolverá '05',
     * mientras que el mes 10 devolverá '10'.
     *
     * @param string $mes
     * @return string
     */
    function ajustarMes(string $mes): string
    {
        if (strlen($mes) == 1) {
            $mes = '0' . $mes;
        }
        return $mes;
    }
}

if (! function_exists('diferenciaFechas')) {
    /**
     * Devuelve una representación del mes con un ancho de 2 caracteres. Por ejemplo, el mes 5 devolverá '05',
     * mientras que el mes 10 devolverá '10'.
     *
     * @param DateTime $fechaReferencia
     * @return string
     */
    function diferenciaFechas(String $datetime): string
    {
        $date = new DateTime($datetime, new DateTimeZone('America/Santiago'));
        $now = new DateTime("now", new DateTimeZone('America/Santiago') );
        $interval = date_diff($date, $now);
        if ($interval->y > 0) {
            $msg = sprintf('hace %s año%s y %s mes%s', $interval->y, $interval->y == 1 ? '' : 's', $interval->m, $interval->m == 1 ? '' : 'es');
        } elseif ($interval->m > 0) {
            $msg = sprintf('hace %s mes%s y %s dia%s', $interval->m, $interval->m == 1 ? '' : 'es', $interval->d, $interval->d == 1 ? '' : 's');
        } elseif ($interval->d > 0) {
            $msg = sprintf('hace %s dia%s y %s hora%s', $interval->d, $interval->d == 1 ? '' : 's', $interval->h, $interval->h == 1 ? '' : 's');
        } elseif ($interval->h > 0) {
            $msg = sprintf('hace %s hora%s y %s minuto%s', $interval->h, $interval->h == 1 ? '' : 's', $interval->i, $interval->i == 1 ? '' : 's');
        } elseif ($interval->i > 0) {
            $msg = sprintf('hace %s minuto%s', $interval->i, $interval->i == 1 ? '' : 's');
        } elseif ($interval->s > 10) {
            $msg = sprintf('hace %s segundo%s', $interval->s, $interval->s == 1 ? '' : 's');
        } else {
            $msg = 'recién';
        }
        return $msg;
    }

    function plazoCumplido(String $datetime, $minutos): string
    {
        $date = new DateTime($datetime, new DateTimeZone('America/Santiago'));
        $now = new DateTime("now", new DateTimeZone('America/Santiago') );
        $interval = date_diff($date, $now);
        $elapsed = $interval->i;
        $elapsed += $interval->h * 60;
        $elapsed += $interval->d * 60 * 24;
        $elapsed += $interval->m * 60 * 24 * 30;
        $elapsed += $interval->y * 60 * 24 * 30 * 12;
        if ($minutos < $elapsed) {
            return true;
        }
        return false;
    }

}

if (! function_exists('formatoFecha')) {

    function formatoFecha(string $datetime)
    {

        $re = '/^(\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+).(\d+)$/m';
        $substDia = '$3';
        $dia = preg_replace($re, $substDia, $datetime);
        $substMes = '$2';
        $mes = mesEspanolCorto(preg_replace($re, $substMes, $datetime));
        $substResto = ', $1 ($4:$5)';
        $resto = preg_replace($re, $substResto, $datetime);
        return $dia . "-" . $mes . $resto;
    }
}
