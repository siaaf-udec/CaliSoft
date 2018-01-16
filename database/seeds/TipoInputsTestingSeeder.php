<?php

use Illuminate\Database\Seeder;

class TipoInputsTestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TBL_Inputs_types')->insert([
            [
                'nombre' => 'Email'
            ],
            [
                'nombre' => 'Nombre persona'
            ],
            [
                'nombre' => 'Nombre objeto'
            ],
            [
                'nombre' => 'Contraseña'
            ],
            [
                'nombre' => 'Descripcion'
            ],
            [
                'nombre' => 'Url'
            ]
        ]);
    }
}
