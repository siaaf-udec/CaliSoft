<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\User;
use PDF;

class PDFController extends Controller
{
    /**
     * Reporte de evluacion de diagramas
     *
     * @param Proyecto $proyecto
     * @return Illuminate\Http\Response
     */
    public function modelacion(Proyecto $proyecto) {
        $data = $proyecto->load('documentos.evaluaciones', 'documentos.tipo');
        $pdf = PDF::loadView('pdf.modelacion', [ 'proyecto' => $data ]);
        return $pdf->stream('modelacion.pdf');
    }

    /**
     * Reporte de usuarios registrados en la plataforma
     *
     * @return Illuminate\Http\Response
     */
    public function usuarios() {
        $pdf = PDF::loadView('pdf.usuarios', [ 'usuarios' => User::limit(50)->get() ]);
        return $pdf->stream('usuarios.pdf');
    }
}
