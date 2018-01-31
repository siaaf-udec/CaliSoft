<?php

namespace App\Container\Calisoft\Src\Repositories;

use Faker\Provider\Base;
use App\Container\Calisoft\Src\TestValue;

class TestFakeProvider extends Base {
    
    /**
     * Retorna valor de prueba de sql
     * @return string
     */
    public function sql() {
        $values = $this->data('sql');
        return $this->generator->randomElement($values);
    }

    /**
     * Retorna valor de prueba de xss
     * @return string
     */
    public function xss() {
        $values = $this->data('xss');
        return $this->generator->randomElement($values);
    }

    private function data($tipo) {
        return TestValue::where('tipo', $tipo)->pluck('valor')->toArray();
    }
}