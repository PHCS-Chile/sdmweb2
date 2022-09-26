<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    public function evaluaciones()
    {
        return $this->belongsToMany(Evaluacion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
