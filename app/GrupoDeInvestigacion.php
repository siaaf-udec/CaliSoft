<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoDeInvestigacion extends Model
{
    protected $table = "TBL_GruposDeInvestigacion";
    protected $primaryKey = "PK_id";

    protected $fillable = ["nombre"];
}
