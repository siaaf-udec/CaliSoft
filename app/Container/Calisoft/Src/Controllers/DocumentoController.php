<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Container\Calisoft\Src\Documento;
use App\Container\Calisoft\Src\Requests\DocumentosIndexRequest;
use App\Container\Calisoft\Src\Requests\DocumentosStoreRequest;
use App\Container\Calisoft\Src\Requests\DocumentosUpdateRequest;
use App\Container\Calisoft\Src\TiposDocumento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student', [
            'except' => ['index'],
        ]);
    }

    public function index(DocumentosIndexRequest $request)
    {
        $proyecto = auth()->user()->proyectos()->first();
        return $proyecto->documentos->load('tipo');
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(DocumentosUpdateRequest $request, Documento $documentacion)
    {
        $documentacion->fill($request->all());
        $documentacion->save();
    }

    public function destroy(Documento $documentacion)
    {
        Storage::disk('docuEst')->delete($documentacion->url);
        $documentacion->delete();

    }

    public function getTipos()
    {
        return $tdocumento = TiposDocumento::all();
    }

    public function postfile(DocumentosStoreRequest $request)
    {

        $fileInput  = $request->file('file');
        $tipoInput  = $request->FK_TipoDocumentoId;
        $idProyecto = auth()->user()->proyectos()->first();
        $fileName   = rand(1000, 9999) . '_' . $fileInput->getClientOriginalName();

        if (Input::hasFile('file')) {

            Storage::disk('docuEst')->put($fileName, File::get($fileInput));

            return Documento::create([
                'url'                => $fileName,
                'FK_ProyectoId'      => $idProyecto->PK_id,
                'FK_TipoDocumentoId' => $request->FK_TipoDocumentoId,
            ]);
        }
    }

    public function getfile($file)
    {
        return response()->file("storage/uploads/documentos/" . $file);
        //return Storage::url("uploads/documentos/" . $file);
    }

    public function download($file)
    {
        return response()->download("storage/uploads/documentos/" . $file);
    }
}
