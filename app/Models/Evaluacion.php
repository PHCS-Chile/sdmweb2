<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Evaluacion
 *
 * @package App\Models
 * @version 5
 */
class Evaluacion extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    protected $dateFormat = 'd-m-Y H:i:s';

    const EC_LEVE = 1;
    const EC_INTERMEDIO = 2;
    const EC_GRAVE = 3;


    public static function servicioHabilidad($evaluacion_id, $separador=" - ", $inicio=false)
    {
        $evaluacion = Evaluacion::find($evaluacion_id);
        $servicio_name = $evaluacion->asignacion->agente->servicio->name;
        $habilidad = $evaluacion->asignacion->agente->habilidad;
        $salida = $servicio_name . $separador . $habilidad;
        if ($inicio) {
            $salida = $inicio . " - " . $salida;
        }
        return $salida;
    }

    public static function habilidad($evaluacion_id)
    {
        return Evaluacion::find($evaluacion_id)->asignacion->agente->servicio->name;
    }

    public function atributos()
    {
        return Atributo::where('pauta_id', $this->getPauta()->id)->get();
    }

    public function respuesta($atributo_id)
    {
        return $this->respuestas->firstWhere('atributo_id', $atributo_id);
    }

    public function getPauta()
    {
        return $this->asignacion->estudio->pauta;
    }

    public function enBlanco()
    {
        return $this->estado_id == Estado::EVALUACION_EN_BLANCO || $this->estado_id == Estado::EVALUACION_EN_EVALUACION;
    }

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function estaCompleta()
    {
        return $this->estado_id > 1 && $this->estado_id < 6;
    }

    public function reportes()
    {
        return $this->belongsToMany(Reporte::class);
    }

    public function bloqueo()
    {
        return $this->hasMany(Bloqueo::class);
    }

    public function esDummy()
    {
        return $this->estaIncompleta() && $this->estado_id == 1 && $this->estado_conversacion == 7;
    }

    public function estaIncompleta()
    {
        return $this->fecha_grabacion == NULL || $this->connid == NULL || $this->movil == NULL;
    }

    public function cambiarEstado($estado)
    {
        Log::log($this->id, Log::ACCION_CAMBIO_ESTADO, [$this->estado_id, $estado]);
        $this->estado_id = $estado;
        if (Auth::user()->perfil == 1 && $estado == 5) {
            Notificacion::limpiarNotificaciones($this->id);
        } elseif ($estado == 3) {
            Notificacion::notificar($this->id);
        }
    }

    public function todosLosEjecutivos()
    {
        $ejecutivos = [];
        foreach ($this->evaluacions as $evaluacion) {
            if ($evaluacion->nombre_ejecutivo && !in_array($evaluacion->nombre_ejecutivo, $ejecutivos)) {
                array_push($ejecutivos, $evaluacion->nombre_ejecutivo);
            }
        }
        return $ejecutivos;
    }

    public function puedeEditar($user)
    {
        if ($user->esSupervisor()) {
            return in_array($this->estado_id, [1, 20, 2, 3]);
        } else {
            return in_array($this->estado_id, [1, 20]);
        }
    }

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

}
