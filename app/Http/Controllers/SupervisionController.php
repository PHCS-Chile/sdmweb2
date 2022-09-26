<?php

namespace App\Http\Controllers;

use App\Models\Bloqueo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupervisionController extends Controller
{
    public function validarUsuario()
    {
        if (Auth::user()->perfil != 1) {
            abort(403, 'No permitido.');
        }
    }

    public function bloqueos()
    {
        $this->validarUsuario();
        $ultimosBloqueos = Bloqueo::where('tipo', 1)
            ->where('created_at', '>',DB::raw("CAST('" . Carbon::now()->subHours(2)->format('d-m-Y H:i:s') . "' AS DATETIME)"))
            ->where('activo', true)
            ->groupBy('evaluacion_id')
            ->select([DB::raw('MAX(id) as id')])
            ->get()->pluck('id')->all();
        $bloqueos = Bloqueo::whereIn('id', $ultimosBloqueos)->get();
        return view('supervision.bloqueados', compact('bloqueos'));
    }

    public function desbloquear(Request $request)
    {
        $this->validarUsuario();
        $bloqueo = Bloqueo::find($request->bloqueo_id);
        $bloqueo->activo = false;
        $bloqueo->save();
        return back()->with('message', 'Evaluación ' . $bloqueo->evaluacion->id . ' desbloqueada.');
    }

}
