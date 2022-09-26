<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agente
 * @package App\Models
 * @version 2
 */
class Agente extends Model
{
    protected $guarded = ['id'];
    protected $dateFormat = 'd-m-Y H:i:s';

    use HasFactory;


    const ACTIVO = 1;
    const DESACTIVADO_TEMPORALMENTE = 2;
    const INACTIVO = 3;

    public function asignacions()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

}
