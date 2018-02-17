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
            
            // Nombres de persona Correctos
            [ 'tipo' => 'html', 'valor' => "Johan Camilo Suárez Campos",'valido' => 1, 'FK_InputType' => 1],
            [ 'tipo' => 'html', 'valor' => "Pepito Perez",'valido' => 1, 'FK_InputType' => 1],
            [ 'tipo' => 'html', 'valor' => "Stevenson Marquez Rangel",'valido' => "1", 'FK_InputType' => "1"],
            // Nombres de personas Incorrectos
            [ 'tipo' => 'html', 'valor' => "S",'valido' => "0", 'FK_InputType' => "1"],
            [ 'tipo' => 'html', 'valor' => "Stevenson Rangel 2018",'valido' => "0", 'FK_InputType' => "1"],
            [ 'tipo' => 'html', 'valor' => "Joh@n Súarez",'valido' => "0", 'FK_InputType' => "1"],
            // Emails Correctos
            [ 'tipo' => 'html', 'valor' => "Email@email.com",'valido' => "1", 'FK_InputType' => "2"],
            [ 'tipo' => 'html', 'valor' => "Prueba@Prueba.es",'valido' => "1", 'FK_InputType' => "2"],
            [ 'tipo' => 'html', 'valor' => "Raiz@surf.org",'valido' => "1", 'FK_InputType' => "2"],
            // Emails Incorrectos
            [ 'tipo' => 'html', 'valor' => "EMconslo.com",'valido' => "0", 'FK_InputType' => "2"],
            [ 'tipo' => 'html', 'valor' => "Windows@master",'valido' => "0", 'FK_InputType' => "2"],
            [ 'tipo' => 'html', 'valor' => "Línux@gmail.org",'valido' => "0", 'FK_InputType' => "2"],
            // PassWords Correctos
            [ 'tipo' => 'html', 'valor' => "prueba1234!",'valido' => "1", 'FK_InputType' => "3"],
            [ 'tipo' => 'html', 'valor' => "Contr@señ@090*",'valido' => "1", 'FK_InputType' => "3"],
            [ 'tipo' => 'html', 'valor' => "Nomelase",'valido' => "1", 'FK_InputType' => "3"],
            // PassWords Incorrectos
            [ 'tipo' => 'html', 'valor' => "as",'valido' => "0", 'FK_InputType' => "3"],
            [ 'tipo' => 'html', 'valor' => "J",'valido' => "0", 'FK_InputType' => "3"],
            [ 'tipo' => 'html', 'valor' => "123456789",'valido' => "0", 'FK_InputType' => "3"],
            // Teléfonos Correctos
            [ 'tipo' => 'html', 'valor' => "3144523889",'valido' => "1", 'FK_InputType' => "4"],
            [ 'tipo' => 'html', 'valor' => "7689540",'valido' => "1", 'FK_InputType' => "4"],
            [ 'tipo' => 'html', 'valor' => "3213431590",'valido' => "1", 'FK_InputType' => "4"],
            // Teléfonos Incorrectos
            [ 'tipo' => 'html', 'valor' => "301",'valido' => "0", 'FK_InputType' => "4"],
            [ 'tipo' => 'html', 'valor' => "2342342342342342342342342342342342342342",'valido' => "0", 'FK_InputType' => "4"],
            [ 'tipo' => 'html', 'valor' => "555",'valido' => "0", 'FK_InputType' => "4"],
            // URL Validas
            [ 'tipo' => 'html', 'valor' => "https://web.whatsapp.com/",'valido' => "1", 'FK_InputType' => "5"],
            [ 'tipo' => 'html', 'valor' => "https://www.dominio.es/",'valido' => "1", 'FK_InputType' => "5"],
            [ 'tipo' => 'html', 'valor' => "https://www.xlmrapid.net",'valido' => "1", 'FK_InputType' => "5"],
            // URL Incorrectas
            [ 'tipo' => 'html', 'valor' => "www.whatsapp.com",'valido' => "0", 'FK_InputType' => "5"],
            [ 'tipo' => 'html', 'valor' => "https://web.telegram",'valido' => "0", 'FK_InputType' => "5"],
            [ 'tipo' => 'html', 'valor' => "https://hostinger",'valido' => "0", 'FK_InputType' => "5"],
            // Creo que este no sería necesario ya que sólo evaluariamos atques xsm y sql
            // Texto Correcto
            [ 'tipo' => 'html', 'valor' => "Esto es un texto de prueba",'valido' => "1", 'FK_InputType' => "6"],
            [ 'tipo' => 'html', 'valor' => "El mismo texto de preuba para con números 1235456",'valido' => "1", 'FK_InputType' => "6"],
            [ 'tipo' => 'html', 'valor' => "Tambíen pueden ir unos $#: simbolos",'valido' => "1", 'FK_InputType' => "6"],
            // Texto Incorrecto
            [ 'tipo' => 'html', 'valor' => "<body onload=alert('test1')>",'valido' => "0", 'FK_InputType' => "6"],
            [ 'tipo' => 'html', 'valor' => "Joh@n Súarez",'valido' => "0", 'FK_InputType' => "6"],
            [ 'tipo' => 'html', 'valor' => '"x"; DROP TABLE members; --"','valido' => "0", 'FK_InputType' => "6"],
            
            // Ataques

            [ 'tipo' => 'sql', 'valor' => '0 OR 1=1' ,'valido' => "0", 'FK_InputType' => "7" ],
            [ 'tipo' => 'sql', 'valor' => '" or ""="', 'valido' => "0", 'FK_InputType' => "7"],
            [ 'tipo' => 'sql', 'valor' => '"x"; DROP TABLE members; --"' ,'valido' => "0", 'FK_InputType' => "7" ],
            [ 'tipo' => 'sql', 'valor' => "\''; DROP TABLE users; --" ,'valido' => "0", 'FK_InputType' => "7"],
            [ 'tipo' => 'xss', 'valor' => "<body onload=alert('test1')>" ,'valido' => "0", 'FK_InputType' => "7"],
            [ 'tipo' => 'xss', 'valor' => "<b onmouseover=alert('Wufff!')>click me!</b>",'valido' => "0", 'FK_InputType' => "7"],
            [ 'tipo' => 'xss', 'valor' => '<img src="http://url.to.file.which/not.exist" onerror=alert(document.cookie);>', 'valido' => "0", 'FK_InputType' => "7"],
            [ 'tipo' => 'xss', 'valor' => "<IMG SRC=j&#X41vascript:alert('test2')>", 'valido' => "0", 'FK_InputType' => "7"]
        ]);
    }
}
