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
        DB::table('tbl_usuarios')->insert([
            'nombre' => 'Code Freestyle',
            'email' => 'root@app.com',
            'role' => 'admin',
            'password' => bcrypt('root')
        ]);
    }
}
