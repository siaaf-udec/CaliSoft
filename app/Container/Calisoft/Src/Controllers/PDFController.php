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

    public function basedatos(Proyecto $proyecto)
    {
        $sql = $proyecto->sql->load('componentes');
        $promedio = $sql->componentes->filter(function($componente, $index){
            return $componente->pivot->total > 0;
        })->avg("pivot.calificacion");

        $promedio = round($promedio,2);
        $pdf = PDF::loadView('pdf.basedatos', compact('proyecto', 'sql','promedio'));
        //return view('pdf.basedatos', compact('proyecto', 'sql'));
        return $pdf->stream('basedatos.pdf');
    }

    public function plataforma(Proyecto $proyecto) {
        $casos = $proyecto->casoPruebas()->with('pruebas')->get();
        $total = $casos->avg('calificacion');
        $pdf = PDF::loadView('pdf.plataforma', compact('casos', 'total', 'proyecto'));
        return $pdf->stream('plataforma.pdf');
    }
}
