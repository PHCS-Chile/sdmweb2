<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloqueo extends Model
{
    use HasFactory;

    protected $dateFormat = 'd-m-Y H:i:s';
    const DURACION = 60;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class);
    }

    public static function nuevo($user_id, $evaluacion_id, $tipo): Bloqueo
    {
        $bloqueo = new Bloqueo();
        $bloqueo->user_id = $user_id;
        $bloqueo->evaluacion_id = $evaluacion_id;
        $bloqueo->tipo = $tipo;
        $bloqueo->activo = true;
        $bloqueo->save();
        return $bloqueo;
    }

}
