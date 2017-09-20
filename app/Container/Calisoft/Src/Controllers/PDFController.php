<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Proyecto;
use PDF;

class PDFController extends Controller
{
    
    public function modelacion(Proyecto $proyecto) {
        $data = $proyecto->load('documentos.evaluaciones', 'documentos.tipo');
        $pdf = PDF::loadView('pdf.modelacion', [ 'proyecto' => $data ]);
        return $pdf->stream('modelacion.pdf');
    }
}
