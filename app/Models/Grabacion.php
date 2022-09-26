<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grabacion extends Model
{
    use HasFactory;
    protected $dateFormat = 'd-m-Y H:i:s';
    protected $fillable = [];

    const NO_RECORRIDA = 7;
    const CON = 8;
    const SIN = 9;
    const NE_MUY_LARGO = 14;
    const NE_INCOMPLETO = 15;
    const NE_INAUDIBLE = 16;

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class);
    }
}
