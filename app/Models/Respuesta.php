<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Respuesta
 * @package App\Models
 * @version 2
 */
class Respuesta extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    const PH = 1;
    const ICI = 2;
    const CENTRO = 3;

    protected $dateFormat = 'd-m-Y H:i:s';

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class);
    }

    public function atributo()
    {
        return $this->belongsTo(Atributo::class);
    }

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

}
