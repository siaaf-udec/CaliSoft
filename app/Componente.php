<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TiposDocumento;

class Componente extends Model
{

    protected $table = "TBL_ComponentesDocumento";
    protected $primaryKey = "PK_id";

    protected $fillable = ['nombre', 'required', 'descripcion', 'FK_TipoDocumentoId'];

    public function documento(){
        return $this->belongsTo(TiposDocumento::class, 'FK_TipoDocumentoId', 'PK_id');
    }

    public function vista(){
        return DB::table('TBL_ComponentesDocumento')
        ->join('TBL_TiposDocumento','TBL_ComponentesDocumento.FK_TipoDocumentoId','=','TBL_TiposDocumento.PK_id')

        ->select('tbl_componentesdocumento.nombre',
				'tbl_componentesdocumento.required',
				'tbl_componentesdocumento.descripcion',
				'tbl_tiposdocumento.nombre')
        ->get();
        
    }

    public function vistaTiposDocumentos(){
        return DB::table('TBL_TiposDocumento')
        ->select('TBL_TiposDocumento.Pk_id',
                'TBL_TiposDocumento.nombre')
        ->get();
        
    }


}
