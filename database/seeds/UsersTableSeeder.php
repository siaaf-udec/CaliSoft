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
            'name' => 'Code Freestyle',
            'email' => 'root@app.com',
            'role' => 'admin',
            'password' => bcrypt('root')
        ]);
    }
}
