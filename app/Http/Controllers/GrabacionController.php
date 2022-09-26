<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarLinkRequest;
use App\Http\Requests\SubirGrabacionRequest;
use App\Models\Evaluacion;
use App\Models\Grabacion;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class GrabacionController
 *
 * @package App\Http\Controllers
 * @version 5
 */
class GrabacionController extends Controller
{

    public function guardarLink(GuardarLinkRequest $request)
    {
        //dd($request);
        $grabacion = new Grabacion;
        $grabacion->evaluacion_id = $request->evaluacionid;
        $grabacion->tamano = 0;
        $grabacion->nombre = "";
        if(substr($request->url, 0, 8) == "https://"){
            $grabacion->url = $request->url;
        }else{
            $grabacion->url = substr($request->url, 0, 7) == "http://" ? $request->url : "http://" . $request->url;
        }
        $grabacion->save();
        $evaluacion = Evaluacion::where('id',$request->evaluacionid)->first();
        $evaluacion->estado_conversacion = 8;
        $evaluacion->save();

        return back()->with('success','Se ha guardado el link externo a la grabación.');
    }

    public function borrarLink(Request $request, $evaluacion_id, $grabacion_id)
    {
//        dd($request, $evaluacion_id);
        $grabacion = Grabacion::find($grabacion_id);
        $grabacion->delete();
        $cuentaLinks = Grabacion::where('evaluacion_id', $evaluacion_id)->where('nombre', '')->count();
        if ($cuentaLinks = 0) {
            $evaluacion = Evaluacion::find($evaluacion_id);
            $evaluacion->estado_conversacion = 7;
            $evaluacion->save();
        }

        return back()->with('message', 'Vínculo externo eliminado con éxito!');
    }

    public function subir(SubirGrabacionRequest $request)
    {

        $grabacion = new Grabacion;
        $evaluacion = Evaluacion::find($request->evaluacionid);
        if ($request->file()) {
            $name = sprintf("%s_%s(%s).%s",
                "E" . $request->evaluacionid,
                str_replace([' ', ':', '/'], ['_', '-', '-'],$evaluacion->fecha_grabacion),
                date("Ymd_his"),
                $request->file('grabacion')->getClientOriginalExtension()
            );
            //$name = $request->evaluacionid . "_grabacion." . $request->file('grabacion')->getClientOriginalExtension();

            $path = $request->file('grabacion')->storeAs('uploads', $name, 'public');
            $grabacion->evaluacion_id = $request->evaluacionid;
            $grabacion->nombre = $name;
            $grabacion->tamano = $request->file('grabacion')->getSize();
            $grabacion->save();

            $evaluacion = Evaluacion::where('id',$request->evaluacionid)->first();
            $evaluacion->estado_conversacion = 8;
            $evaluacion->save();

            return back()
                ->with('success','Se ha guardado la grabación.')
                ->with('file', $name);
        }
        return back()->withErrors(['msg', 'No se pudo subir la grabación (¿algo salió mal?)']);
    }

    public function embedw(Request $request)
    {
        $filePath = storage_path() . '/app/public/grabaciones/' . $request->evaluacionid . '_grabacion.mp3';
        try {
            $file = file_exists ( $filePath );
            $headers = array(
                'Content-type'          => 'application/',
                'Content-Disposition'   => 'inline; filename="' . $filename . '"'
            );
        }
        catch (FileNotFoundException $e) {
            return back()->withErrors([ "Grabación no existe" ]);
        }
        return response()->file( $filePath );
    }

    public function eliminar(Request $request)
    {
        $idGrabacion = substr($request->grabacionActiva, strpos($request->grabacionActiva, "_") + 1);
        $grabacion = Grabacion::find($idGrabacion);
        Storage::delete('uploads/' . $grabacion->nombre);
        $evaluacion = Evaluacion::where('id',$grabacion->evaluacion_id)->first();
        $grabacion->delete();
        $evaluacion->estado_conversacion = 7;
        $evaluacion->save();
        return back()->with('message', 'Grabación eliminada con éxito!');
    }



}
