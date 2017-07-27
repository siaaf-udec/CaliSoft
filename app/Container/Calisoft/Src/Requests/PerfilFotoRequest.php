<?php

namespace App\Container\Calisoft\Src\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilFotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'foto' => 'required|mimes:jpeg,JPEG,jpg,JPG,bmp,BMP,png,PNG,gif,GIF|max:900',
        ];
    }
}
