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


    public function testing(Request $request){
        $data = $request->validate([
            'inputs.*' => 'required|string' 
        ]);
        $values = collect();
        foreach ($data['inputs'] as $inputType) {
            $value = $this->fakerRepo->getValidValue($inputType);
            $values->push($value);
        }
        return response()->json(compact('values'));
    }
}
