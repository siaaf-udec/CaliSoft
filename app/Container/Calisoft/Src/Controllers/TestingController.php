<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Repositories\FakerRepository;


class TestingController extends Controller
{  
    /**
     * @var FakerRepository $fakerRepo
     */
    protected $fakerRepo;

    function __construct(FakerRepository $fakerRepo) {
        $this->fakerRepo = $fakerRepo;
    }

    /**
     * Retorna los valores para realizar las pruebas
     */
    public function testing(Request $request){
        $data = $request->validate([
            'inputs.*' => 'required|string',
            'tipo' => 'in:normal,sql,xss'
        ]);
        $values = collect();
        foreach ($data['inputs'] as $inputType) {
            $value = '';
            switch ($data['tipo']) {
                case 'sql':
                    $value = $this->fakerRepo->getSqlValue();
                    break;
                case 'xss':
                    $value = $this->fakerRepo->getXssValue();
                    break;
                default:
                    $value = $this->fakerRepo->getValidValue($inputType);
                    break;
            }
            $values->push($value);
        }
        return response()->json(compact('values'));
    }
}
