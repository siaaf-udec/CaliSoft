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
                'nombre' => 'Email',
                'reglas' => 'required|email'
            ],
            [
                'nombre' => 'Nombre persona',
                'reglas' => 'required|min:6|alpha_spaces'
            ],
            [
                'nombre' => 'Nombre objeto',
                'reglas' => 'required|min:6'

            ],
            [
                'nombre' => 'Contraseña',
                'reglas' => 'required|min:6'
            ],
            [
                'nombre' => 'Descripcion',
                'reglas' => 'required|min:6'
            ],
            [
                'nombre' => 'Url',
                'reglas' => 'required|url'
            ]
        ]);
    }
}
