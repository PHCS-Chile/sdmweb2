<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Estado;
use App\Models\Evaluacion;
use App\Models\Periodo;
use App\Models\Estudio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MisEvaluaciones extends Component
{
    use WithPagination;
    public $estados, $usuarios, $estudios, $usuariosresumen, $periodos, $filtroEstudio, $filtroPeriodo, $asignacion1, $asignacion2, $filtroEstado, $filtroUsuario, $pagination=25;

    public function mount(){
        $this->filtroPeriodo = Periodo::where('visible',1)->latest()->first()->id;
        $this->periodos = Periodo::all();
        $this->estados = Estado::where('tipo',1)->get();
        $this->usuarios = User::where('perfil', 2)->get();
        $this->estudios = Estudio::all();
    }

    public function promedioici($usuario_id){
        $evaluaciones = Evaluacion::where('user_id',$usuario_id)->where('asignacion_id','>=',$this->asignacion1)->where('asignacion_id','<=',$this->asignacion2)->whereNotNull('ici')->get()->avg('ici');
        return $evaluaciones;
    }

    public function cuentaici($usuario_id){
        $evaluaciones = Evaluacion::where('user_id',$usuario_id)->where('asignacion_id','>=',$this->asignacion1)->where('asignacion_id','<=',$this->asignacion2)->whereNotNull('ici')->get();
        return $evaluaciones->count();
    }


    public function render()
    {
        //$asignaciones = Asignacion::where('periodo_id',$this->filtroPeriodo)->get()->toArray();
        //$this->asignacion1 = $asignaciones[array_key_first($asignaciones)]['id'];
        //$this->asignacion2 = $asignaciones[array_key_last($asignaciones)]['id'];

        $asignaciones = Asignacion::where('periodo_id',$this->filtroPeriodo)->orderBy('id');

        if($this->filtroEstudio > 0){
            $asignaciones->where('estudio_id',$this->filtroEstudio);
        }

        $this->asignacion1 = $asignaciones->get()->first()->id;
        $this->asignacion2 = $asignaciones->get()->last()->id;

        $evaluaciones = Evaluacion::where('estado_id','>=',2)->where('estado_id','<=',5)->where('asignacion_id','>=',$this->asignacion1)->where('asignacion_id','<=',$this->asignacion2)->where('user_completa', Auth::user()->name); //Auth::user()->name

        if($this->filtroEstado){
            $evaluaciones->where('estado_id',$this->filtroEstado);
        }

        if($this->filtroUsuario){
            $evaluaciones->where('user_id',$this->filtroUsuario);
        }

        return view('livewire.mis-evaluaciones', [
            'evaluaciones' => $evaluaciones->orderBy('fecha_completa','desc')->paginate(40),
        ]);
    }
}
