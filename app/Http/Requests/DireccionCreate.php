<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DireccionCreate extends FormRequest
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
            'calle'=> 'required',
            'num_ext'=> 'required',
            // 'num_int'=> '',
            'colonia'=> 'required',
            'estado'=> 'required',
            'pais'=> 'required',
            'cliente_id'=> 'required',
        ];
    }
}
