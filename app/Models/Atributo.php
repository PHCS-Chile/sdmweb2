<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Atributo
 * @package App\Models
 * @version 2
 */
class Atributo extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $dateFormat = 'd-m-Y H:i:s';
}
