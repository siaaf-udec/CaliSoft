<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposDocumento extends Model
{

    /**
     * The name of the table.
     *
     * @var string
     */
    protected $table = 'TBL_TiposDocumento';

    /**
     * The name of the primary key.
     *
     * @var string
     */
    protected $primaryKey= 'PK_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'required'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function componentes(){
        return $this->hasMany(Componente::class, 'FK_TipoDocumentoId', 'PK_id');
    }

}
