<?php

use Illuminate\Database\Seeder;

class TipoNomenclaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TBL_TipoNomenclatura')->insert([
          [
            'nombre' => 'Base de Datos',
            'estandar' => 'BDS_',
            'valor' => '3',
          ],
          [
            'nombre' => 'Esquemas',
            'estandar' => 'SCH_',
            'valor' => '4',
          ],
          [
            'nombre' => 'Tablas',
            'estandar' => 'TBL_',
            'valor' => '4',
          ],
          [
            'nombre' => 'Vistas',
            'estandar' => 'VWS_',
            'valor' => '4',
          ],
          [
            'nombre' => 'Llaves Primarias',
            'estandar' => 'FK_',
            'valor' => '5',
          ],
          [
            'nombre' => 'Llaves Foraneas',
            'estandar' => 'FK_',
            'valor' => '5',
          ],
          [
            'nombre' => 'Campo Descripcion',
            'estandar' => 'PGS_',
            'valor' => '3',
          ],
          [
            'nombre' => 'Campo ValorMoneda',
            'estandar' => 'CTB_',
            'valor' => '3',
          ],
          [
            'nombre' => 'Campo Observaciones',
            'estandar' => 'PSN_',
            'valor' => '3',
          ],
        ]);
    }
}
