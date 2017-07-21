<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Container\Calisoft\Src\Documentos;
use App\Container\Calisoft\Src\TiposDocumento;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectoId = auth()->user()->proyectos()->first();
        $documents  = Documentos::where('FK_ProyectoId', $proyectoId->pivot->FK_ProyectoId)->get();
        return $documents;
        //$docs = Documentos::All();
        //  return view('student.student-subir-documentacion',compact('docs'));
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

        $path  = storage_path() . '/uploads/';
        $files = $request->file('file');
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);
        }

        /*$this->validate($request, [
    'FK_ProyectoId'      => 'required|integer',
    'FK_TipoDocumentoId' => 'required|integer',

    ]);

    return Documentos::create([
    'url'                => $request->url,
    'FK_ProyectoId'      => $request->FK_ProyectoId,
    'FK_TipoDocumentoId' => $request->FK_TipoDocumentoId,
    ]);*/
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
    public function update(Request $request, Documentos $documentacion)
    {
        $this->validate($request, [
            'url'                => 'required|string',
            'FK_ProyectoId'      => 'required|integer',
            'FK_TipoDocumentoId' => 'required|integer',
        ]);
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

    public function postfile()
    {
        $fileInput  = Input::file('file');
        $tipoInput  = Input::get('FK_TipoDocumentoId');
        $idProyecto = auth()->user()->proyectos()->first();

        if (Input::hasFile('file')) {

            $path     = storage_path() . '/uploads/documentos/';
            $fileName = Hash::make($fileInput->getClientOriginalName());

            $id = auth()->user()->id;
            //$usuario = User::find($id);

            $file                     = new Documentos;
            $file->url                = $fileName;
            $file->FK_ProyectoId      = $idProyecto->PK_id;
            $file->FK_TipoDocumentoId = $tipoInput;

            //$file->user()->associate($usuario);

            if ($fileInput->move($path, $fileName . '.' . $fileInput->guessExtension())) {
                $file->save();

            }

        }

    }

    public function getfile()
    {
        return view('student.student-subir-documentacion');
    }

    public function download($file)
    {
        return response()->download("../storage/uploads/documentos/" . $file);

        //$publicacion = Documentos::find($file);
        //$rutaarchivo = '../storage/uploads/' . $publicacion->url . '.pdf';
        //return response()->download($rutaarchivo);

        //$pathtoFile = storage_path() . '\uploads\am_fundamentals.pdf.pdf';
        //return response()->download($pathtoFile);

    }

}
