<?php

namespace App\Http\Requests\request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetByUserIdRequest extends FormRequest
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
            'user_id' => ''
        ];
    }

    public function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json([ 
            'success'   => false, 
            'message'   => $validator->errors(), 
            'data'      => $validator->errors() 
        ],400)); 
    }
}
