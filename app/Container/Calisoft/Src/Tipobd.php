<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Database\Eloquent\Model;

class Tipobd extends Model
{
    protected $primaryKey = 'PK_id';
    protected $table = 'TBL_TipoBd';
    protected $fillable = ['nombre'];

    public function archivobd(){
        return $this->hasOne(ArchivoSql::class,'FK_TipoBdId','PK_id');
    }
}

