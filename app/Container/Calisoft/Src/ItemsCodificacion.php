<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Database\Eloquent\Model;

class ItemsCodificacion extends Model
{
    protected $primaryKey = "PK_id";
    protected $table="TBL_ItemsCodificacion";
    protected $fillable = ['item','valor'];
}
