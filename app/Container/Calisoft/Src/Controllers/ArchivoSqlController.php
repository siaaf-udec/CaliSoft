<?php

namespace App\Container\Calisoft\Src\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\ArchivoSql;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Container\Calisoft\Src\Requests\DocumentosSqlStoreRequest;

class ArchivoSqlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student', [
            'except' => ['index'],
        ]);
    }
    
    public function index()
    {
        $proyecto = auth()->user()->proyectos()->first();
        return $proyecto->archivobd()->with('tipobd')->get();

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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArchivoSql $documentacion_sql)
    {
        Storage::disk('sql')->delete($documentacion_sql->url);
        $documentacion_sql->delete();
    }
    public function postfile(DocumentosSqlStoreRequest $request)
    {

        $fileInput  = $request->file('file');
        $idProyecto = auth()->user()->proyectos()->first();
        $fileName   = rand(1000, 9999) . '_' . $fileInput->getClientOriginalName();

        if (Input::hasFile('file')) {

            Storage::disk('sql')->put($fileName, File::get($fileInput));

            return ArchivoSql::create([
                'url'                => $fileName,
                'FK_ProyectoId'      => $idProyecto->PK_id,
                'FK_TipoBdId'        => $request->FK_TipoBdId,
            ]);
        }
    }
}
