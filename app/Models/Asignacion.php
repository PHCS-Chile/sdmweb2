<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignacion
 * @package App\Models
 * @version 2
 */
class Asignacion extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $dateFormat = 'd-m-Y H:i:s';

    public function contarSinConversacion()
    {
        $enBlanco = 0;
        foreach ($this->evaluacions as $evaluacion) {
            if ($evaluacion->estado_conversacion == Grabacion::NO_RECORRIDA) {
                ++$enBlanco;
            } else {
                $conversacion = Grabacion::where('evaluacion_id', $evaluacion->id)->get();
                if (!$conversacion) {
                    ++$enBlanco;
                }
            }
        }
        return $enBlanco;
    }





    public function getIncompletasAttribute(){
        return $this->evaluacions->where('estado_id','1');
    }

    public function getCompletasAttribute(){
        return $this->evaluacions->wherein('estado_id',['2','3','4','5']);
    }

    public function getChatenblancoAttribute(){
        return $this->evaluacions->whereNotNull('image_path')->where('estado_id','1');
    }

    public function getAgentesAttribute(){
        return $this->evaluacions->groupBy('rut_ejecutivo');
    }

    public function getAgentescompletasAttribute(){
        return $this->evaluacions->wherein('estado_id',['2','3','4','5'])->groupBy('rut_ejecutivo');
    }

    public function getBaseAttribute(){
        return $this->evaluacions;
    }

    public function getServicioAttribute(){
        return $this->agente->servicio->name;
    }

    public function contarEstadosConversacion($estado)
    {
        return $this->evaluacions->where('estado_conversacion', $estado)->count();
    }

    public function ejecutivos()
    {
        $ejecutivos = [];
        foreach ($this->evaluacions as $evaluacion) {
            if (!in_array($evaluacion->nombre_ejecutivo, $ejecutivos)) {
                $ejecutivos[] = $evaluacion->nombre_ejecutivo;
            }
        }
        return $ejecutivos;

    }

    public function agente()
    {
        return $this->belongsTo(Agente::class);
    }

    public function evaluacions()
    {
        return $this->hasMany(Evaluacion::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function estudio()
    {
        return $this->belongsTo(Estudio::class);
    }


}
