<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    protected $dateFormat = 'd-m-Y H:i:s';

    const SUPERVISOR = 1;
    const ENCUESTADOR = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function evaluacionsici()
    {
        return $this->hasMany(Evaluacion::class)->whereNotNull('ici')->where('asignacion_id');
    }

    public function evaluacionsicipromedio()
    {
        return $this->hasMany(Evaluacion::class)->whereNotNull('ici')->avg('ici');
    }

    public function evaluacions()
    {
        return $this->hasMany(Evaluacion::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function esSupervisor()
    {
        return $this->perfil == 1;
    }

    public function esAdmin()
    {
        return $this->id = 1;
    }

}
