<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Escala
 * @package App\Models
 * @version 2
 */
class Escala extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $dateFormat = 'd-m-Y H:i:s';
}
