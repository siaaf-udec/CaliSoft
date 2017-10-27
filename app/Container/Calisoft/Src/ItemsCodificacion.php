<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Database\Eloquent\Model;

class ItemsCodificacion extends Model
{
    protected $primaryKey = "PK_id";
    protected $table="TBL_ItemsCodificacion";
    protected $fillable = ['item','valor'];

    public function notaCodificacion()
    {
        return $this->hasMany(NotaCodificacion::class,'FK_ItemsId','PK_Id');
    }
}
