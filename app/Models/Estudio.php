<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudio
 * @package App\Models
 * @version 2
 */
class Estudio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dateFormat = 'd-m-Y H:i:s';


    public static function obtenerEstados($id_estudio)
    {
        $estadosIds = [7];
        if (Estudio::tipoConversacion($id_estudio) == 'chat') {
            array_push($estadosIds, 17, 18, 19);
        } elseif (Estudio::tipoConversacion($id_estudio) == 'grabacion') {
            array_push($estadosIds, 8, 9, 14, 15, 16);
        }
        return Estado::whereIn('id', $estadosIds)->get();
    }

    public static function tipoConversacion($id_estudio)
    {
        if($id_estudio == 1){
            return 'chat';
        }elseif(in_array($id_estudio, [2, 3, 4, 5])){
            return 'grabacion';
        }
        return NULL;
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    public function pauta()
    {
        return $this->belongsTo(Pauta::class);
    }

    public function asignacions()
    {
        return $this->hasMany(Asignacion::class);
    }

}
