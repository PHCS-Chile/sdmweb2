<?php

namespace App\Http\Livewire;

use App;
use App\Models\Asignacion;
use App\Models\Estado;
use App\Models\Estudio;
use App\Models\Evaluacion;
use App\Models\Periodo;
use App\Models\Servicio;
use Barryvdh\DomPDF\PDF;
use DB;
use Livewire\Component;

/**
 * Class Reportes
 * @version 1
 */
class Reportes extends Component
{

    public $pagination = 25;
    public $marcarTodo;
    public $evaluacionesSeleccionadas = [];
    public $filtroPeriodo;
    public $filtroMercado;
    public $filtroEstudio;
    public $filtroServicio;
    public $evaluaciones;

    public $saltarRender = false;


    public function crearPDF()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdfContent = $pdf->loadView('pdf.reporte', [])->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "reporte.pdf",
            ['Content-Type' => 'application/pdf', 'filename' => 'reporte.pdf']
        );
    }


    public function marcarTodo()
    {
        for ($i = 0; $i < $this->pagination; ++$i) {
            $this->evaluacionesSeleccionadas[$i] = $this->marcarTodo == 'checked' ? 'checked' : null;
        }
        $this->saltarRender = true;
    }

    public function render()
    {
        if ($this->saltarRender) {
            $this->saltarRender = false;
            return '';
        }
        $this->evaluacionesSeleccionadas = [];
        return view('livewire.reportes', [
            'evaluaciones' => Evaluacion::where('id','>',1)
                ->when($this->filtroPeriodo, function ($query) {
                    $query->where(function ($query2) {
                        $query2->select('periodo_id')
                            ->from('asignacions')
                            ->whereColumn('evaluacions.asignacion_id', 'asignacions.id')
                            ->limit(1);
                    }, $this->filtroPeriodo);

                })
                ->when($this->filtroMercado, function ($query) {
                    $query->where(function ($query2) {
                        $query2->select('mercado')
                            ->from('agentes')
                            ->where('id', function ($query3) {
                                $query3->select('agente_id')
                                    ->from('asignacions')
                                    ->whereColumn('evaluacions.asignacion_id', 'asignacions.id')
                                    ->limit(1);
                            })
                            ->limit(1);
                    }, $this->filtroMercado);
                })
                ->when($this->filtroEstudio, function ($query) {
                    $query->where(function ($query2) {
                        $query2->select('estudio_id')
                            ->from('asignacions')
                            ->whereColumn('evaluacions.asignacion_id', 'asignacions.id')
                            ->limit(1);
                    }, $this->filtroEstudio);

                })
                ->when($this->filtroServicio, function ($query) {
                    $query->where(function ($query2) {
                        $query2->select('servicio_id')
                            ->from('agentes')
                            ->where('id', function ($query3) {
                                $query3->select('agente_id')
                                    ->from('asignacions')
                                    ->whereColumn('evaluacions.asignacion_id', 'asignacions.id')
                                    ->limit(1);
                            })
                            ->limit(1);
                    }, $this->filtroServicio);
                })
                    ->paginate($this->pagination),
            'estudios' => Estudio::all(),
            'periodos' => Periodo::all(),
            'servicios' => Servicio::all(),
            'estados' => Estado::all(),
        ]);
    }
}
