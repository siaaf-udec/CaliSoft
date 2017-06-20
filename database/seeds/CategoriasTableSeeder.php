<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TBL_Categorias')->insert([
            [
                'nombre' => 'sistemas de información',
                'plataforma' => 80,
                'modelado'=>20,
                'clases'=>15,
                'uso'=>15,
                'despliegue'=>15,
                'sequencia'=>15,
                'actividades'=>15,
                'entidad_relacion'=>25
                
            ],[
                'nombre' => 'sistemas de embebidos',
                'plataforma' => 80,
                'modelado'=>20,
                'clases'=>15,
                'uso'=>15,
                'despliegue'=>15,
                'sequencia'=>15,
                'actividades'=>15,
                'entidad_relacion'=>25
            ],
            [
                'nombre' => 'sistema artificial',
                'plataforma' => 80,
                'modelado'=>20,
                'clases'=>40,
                'uso'=>15,
                'despliegue'=>15,
                'sequencia'=>60,
                'actividades'=>15,
                'entidad_relacion'=>25
            ]
        ]);
    }
}
