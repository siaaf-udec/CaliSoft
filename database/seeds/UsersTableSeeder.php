<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TBL_Usuarios')->insert([
            [
                'nombre' => 'Code Freestyle',
                'email' => 'root@app.com',
                'role' => 'admin',
                'password' => bcrypt('12345'),
                'state' => 'active'
            ],
            [
                'nombre' => 'Paisa',
                'email' => 'paisa@mail.com',
                'role' => 'evaluator',
                'password' => bcrypt('12345'),
                'state' => 'active',
            ],
            [
                'nombre' => 'Fredo',
                'email' => 'fredo@joya.joya',
                'role' => 'student',
                'password' => bcrypt('12345'),
                'state' => 'active'
            ]
        ]);
    }
}
