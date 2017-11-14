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
    public function modelacion(Proyecto $proyecto)
    {
        $documentos = $proyecto->documentos()->with('tipo', 'evaluaciones.componente', 'evaluaciones.evaluador')->get();
        $pdf = PDF::loadView('pdf.modelacion', compact('proyecto', 'documentos'));
        return $pdf->stream('modelacion.pdf');
    }

    /**
     * Reporte de usuarios registrados en la plataforma
     *
     * @return Illuminate\Http\Response
     */
    public function usuarios()
    {
        $pdf = PDF::loadView('pdf.usuarios', ['usuarios' => User::limit(50)->get()]);
        return $pdf->stream('usuarios.pdf');
    }
    public function scripts(Proyecto $proyecto)
    {
        $scripts = $proyecto->scripts()->with('items')->get();
        $pdf = PDF::loadView('pdf.codificacion', compact('proyecto', 'scripts'));
        return $pdf->stream('codificacion.pdf');
    }
}
