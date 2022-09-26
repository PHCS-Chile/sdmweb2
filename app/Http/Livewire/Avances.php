<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Estado;
use App\Models\Evaluacion;
use App\Models\Periodo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Avances extends Component
{
    use WithPagination;
    public $estados, $usuarios, $periodos, $filtroPeriodo, $asignacion1, $asignacion2, $filtroEstado, $filtroUsuario, $pagination=25;

    public function mount(){
        $this->filtroPeriodo = Periodo::where('visible',1)->latest()->first()->id;
        $this->periodos = Periodo::all();
        $this->estados = Estado::where('tipo',1)->get();
        $this->usuarios = User::where('perfil', 2)->where('visible',true)->get();
    }

    public function completasmes($usuario_id){
        $evaluaciones = Evaluacion::where('user_id',$usuario_id)->where('asignacion_id','>=',$this->asignacion1)->where('asignacion_id','<=',$this->asignacion2)->wherein('estado_id',[2,3,4,5])->get();
        return $evaluaciones->count();
    }

    public function completashoy($usuario_id){
        $evaluaciones = Evaluacion::where('user_id',$usuario_id)->where('asignacion_id','>=',$this->asignacion1)->where('asignacion_id','<=',$this->asignacion2)->wherein('estado_id',[2,3,4,5])->wheredate('fecha_completa',today()->format('d-m-Y'))->get();
        return $evaluaciones->count();
    }

    public function render()
    {
        $asignaciones = Asignacion::where('periodo_id',$this->filtroPeriodo)->orderBy('id')->get();
        $this->asignacion1 = $asignaciones->first()->id;
        $this->asignacion2 = $asignaciones->last()->id;

        $evaluaciones = Evaluacion::where('estado_id','>=',2)->where('estado_id','<=',5)->where('asignacion_id','>=',$this->asignacion1)->where('asignacion_id','<=',$this->asignacion2);

        if($this->filtroEstado){
            $evaluaciones->where('estado_id',$this->filtroEstado);
        }

        if($this->filtroUsuario){
            $evaluaciones->where('user_id',$this->filtroUsuario);
        }

        return view('livewire.avances', [
            'evaluaciones' => $evaluaciones->orderBy('fecha_completa','desc')->paginate(40),
        ]);
    }
}
