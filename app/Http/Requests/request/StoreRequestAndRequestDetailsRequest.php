<?php

namespace App\Http\Requests\request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreRequestAndRequestDetailsRequest extends FormRequest
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
            'request.user_id' => '',
            'request.status_id' => '',
            'request.unit_id' => '',
            'request.confirmed' => '',
            'request.descriptions' => '',
            'request.date' => '',
            'requestDetails.*.product_id' => 'required',
            'requestDetails.*.status_id' => '',
            'requestDetails.*.file_id' => '',
            'requestDetails.*.delivery_id' => '',
            'requestDetails.*.amount' => 'required',
            'requestDetails.*.location' => '',
            'requestDetails.*.warehouses_id' => '',
            'requestDetails.*.worn' => '',
            'requestDetails.*.worn_amount' => '',
            'requestDetails.*.confirmed' => '',
            'requestDetails.*.descriptions' => '',
            'requestDetails.*.file' => '',
            'requestDetails.*.file_flag' => '',
            'requestDetails.*.name_file' => '',
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
