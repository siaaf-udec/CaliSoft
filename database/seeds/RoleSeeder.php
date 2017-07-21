<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
          [
            'name' => 'admin',
            'display_name' => 'Administrador'
          ],
          [
            'name' => 'evaluator',
            'display_name' => 'Evaluador'
          ],
          [
            'name' => 'student',
            'display_name' => 'Estudiante'
          ]
        ]);
    }
}
