<?php

use Illuminate\Database\Seeder;


class TestValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TBL_TestValues')->insert([
            [ 'tipo' => 'sql', 'valor' => '0 OR 1=1' ],
            [ 'tipo' => 'sql', 'valor' => '" or ""="', ],
            [ 'tipo' => 'sql', 'valor' => '"x"; DROP TABLE members; --"' ],
            [ 'tipo' => 'sql', 'valor' => "\''; DROP TABLE users; --" ],
            [ 'tipo' => 'xss', 'valor' => "<body onload=alert('test1')>"],
            [ 'tipo' => 'xss', 'valor' => "<b onmouseover=alert('Wufff!')>click me!</b>"],
            [ 'tipo' => 'xss', 'valor' => '<img src="http://url.to.file.which/not.exist" onerror=alert(document.cookie);>'],
            [ 'tipo' => 'xss', 'valor' => "<IMG SRC=j&#X41vascript:alert('test2')>"]
        ]);
    }
}
