<?php
namespace App\Container\Calisoft\Src\Repositories;

use Faker;
use Faker\Factory;

/**
 * Clase de repositorio que retorna los valores para realizar las pruebas automatizadas
 * TIPOS => text, email, number, tel, url, file
 */
class FakerRepository
{   
    /**
     * @var Faker\Factory $faker 
     */
    private $faker;

    function __construct()
    {
        $this->faker = Faker\Factory::create('es_ES');
    }

    /**
     * Retorna valor de entrada valido
     * @param string $type
     */
    public function getValidValue($type) {
        switch ($type) {
            case 'text':
                return $this->faker->text(200);
                break;
            case 'email':
                return $this->faker->email();
                break;
            case 'password':
                return $this->faker->password();
                break;
            case 'tel':
                return $this->faker->e164PhoneNumber();
                break;
            case 'url':
                return $this->faker->url();
                break;
            default:
                return null;
                break;
        }
    }

}