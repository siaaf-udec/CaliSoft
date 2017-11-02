<?php

namespace App\Container\Calisoft\Src;


use Illuminate\Database\Eloquent\Model;
use Storage;


class Script extends Model
{
    protected $table = "TBL_Scripts";
    protected $primaryKey = "PK_id";
    protected $fillable = ['url','estado','FK_ProyectoId'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'FK_ProyectoId', 'PK_id');
    }
    public function items()
    {
        return $this->belongsToMany(ItemsCodificacion::class,'TBL_NotaCodificacion','FK_ScriptsId','FK_ItemsId')
            ->withTimestamps()
            ->withPivot('nota','total','acertadas');
    }
    
}
