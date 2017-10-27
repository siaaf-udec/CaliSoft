<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class NotaCodificacion extends Model
{
    protected $table="TBL_NotaCodificacion";
    protected $primaryKey="PK_id";
    protected $fillable=['nota','total','acertadas','FK_ScriptsId','FK_ItemsId'];
    protected $hidden=['created_at', 'updated_at'];

    public function scripts()
    {
        return $this->belongsTo(Script::class,'FK_ScriptsId','PK_id');
    }
    public function itemsCodificacion()
    {
        return $this->belongsTo(ItemsCodificacion::class,'FK_ItemsId','PK_id');
    }
}
