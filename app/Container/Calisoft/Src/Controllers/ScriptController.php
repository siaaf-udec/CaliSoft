<?php

namespace App\Container\Calisoft\Src\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Script;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Container\Calisoft\Src\Requests\DocumentosScriptsStoreRequest;



class ScriptController extends Controller
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
        return $proyecto->scripts;
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show(Script $scripts)
    {
        //
    }


    
    public function destroy(Script $documentacion_script)
    {
        Storage::disk('docuScript')->delete($documentacion_script->url);
        $documentacion_script->delete();
    }
    
    public function postfile(DocumentosScriptsStoreRequest $request)
    {

        $fileInput  = $request->file('file');
        $idProyecto = auth()->user()->proyectos()->first();
        $fileName   = rand(1000, 9999) . '_' . $fileInput->getClientOriginalName();

        if (Input::hasFile('file')) {

            Storage::disk('docuScript')->put($fileName, File::get($fileInput));

            return Script::create([
                'url'                => $fileName,
                'FK_ProyectoId'      => $idProyecto->PK_id,
            ]);
        }
    }

}
