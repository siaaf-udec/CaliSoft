<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Container\Calisoft\Src\Documentos;
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

        $proyectoId = auth()->user()->proyectos()->first();
        //$documents  = Documentos::where('FK_ProyectoId', $proyectoId->pivot->FK_ProyectoId)->get();
        //return $documents;

        $tipo = $request->tipo;

        return Documentos::where('FK_ProyectoId', $proyectoId->pivot->FK_ProyectoId)
            ->with('tipoDocumento')
            ->when($tipo, function ($query) use ($tipo) {
                return $query->where('FK_TipoDocumentoIds', $tipo);
            })->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentosUpdateRequest $request, Documentos $documentacion)
    {
        $documentacion->fill($request->all());
        $documentacion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentos $documentacion)
    {
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

            return Documentos::create([
                'url'                => $fileName,
                'FK_ProyectoId'      => $idProyecto->PK_id,
                'FK_TipoDocumentoId' => $request->FK_TipoDocumentoId,
            ]);
        }
    }

    public function getfile($file)
    {
        //$url = Storage::disk('docuEst')->url($file);
        return response()->file("../storage/uploads/documentos/" . $file);
    }

    public function download($file)
    {
        return response()->download("../storage/uploads/documentos/" . $file);
        //return redirect()->route('../storage/uploads/documentos/8_am_fundamentals.pdf');
        //return redirect()->route("../storage/uploads/documentos/" . $file);
        //$publicacion = Documentos::find($file);
        //$rutaarchivo = '../storage/uploads/' . $publicacion->url . '.pdf';
        //return response()->download($rutaarchivo);

        //$pathtoFile = storage_path() . '\uploads\am_fundamentals.pdf.pdf';
        //return response()->download($pathtoFile);
    }
}
