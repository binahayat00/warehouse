<?php

namespace App\Http\Requests\RequestsDetailsConfirm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            '*.requests_detail_id' => 'required',
            '*.confirm_id' => 'required',
            '*.user_id' => 'required',
            '*.confirmed' => '',
            '*.description' => '',
        ];
    }

    public function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json([ 
            'success'   => false, 
            'message'   => $validator->errors() , 
            'data'      => $validator->errors() 
        ],400));
    }
}
