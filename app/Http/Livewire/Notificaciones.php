<?php

namespace App\Http\Livewire;

use App\Models\Notificacion;
use Livewire\Component;

/**
 * Class Notificaciones
 *
 * @package App\Http\Livewire
 * @version 2
 */
class Notificaciones extends Component
{

    public $pagination = 25;
    public $filtroLeida = 0;
    public $filtroEstudio;
    public $orden = 1;

    public function quitarNotificaciones($evaluacionId=null)
    {
        if ($evaluacionId) {
            $notificaciones = Notificacion::where('evaluacion_id', $evaluacionId)->where('activa', true)->get();
        } else {
            $notificaciones = Notificacion::where('activa', true)->get();
        }
        foreach ($notificaciones as $notificacion) {
            $notificacion->leida = true;
            $notificacion->save();
        }
        return redirect(route('usuario.notificaciones'));
    }

    public function render()
    {
        return view('livewire.notificaciones', [
            'notificaciones' => Notificacion::where('activa', true)
                ->when($this->filtroLeida != 99, function ($query) {
                    $query->where('leida', $this->filtroLeida == 1);
                })
                ->when($this->orden == 1, function ($query) {
                    $query->orderBy('id', 'ASC');
                })
                ->when($this->orden == 2, function ($query) {
                    $query->orderBy('id', 'DESC');
                })
                ->paginate($this->pagination)
        ]);
    }
}
