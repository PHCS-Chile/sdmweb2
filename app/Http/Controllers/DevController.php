<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function cambiarPerfil($perfil)
    {
        if (Auth::user()->id == 1) {
            $user = User::find(1);
            $user->perfil = $perfil;
            $user->save();
            return back()->with('status', 'Perfil de usuario cambiado.');
        }
        return back();
    }
}
