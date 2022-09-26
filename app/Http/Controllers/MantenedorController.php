<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MantenedorController extends Controller
{
    public function ponderadores()
    {
        return view('mantenedor.index', []);
    }
}
