<?php

namespace App\Http\Requests;

use \Illuminate\Contracts\Validation\Validator;
use \Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'coupon_code' => 'required|string|max:255',
            'discount_amount' => 'required|numeric|min:0|max:100',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'errors' => $validator->errors(),
            'toastr' => [
                'type' => 'error',
                'message' => $validator->errors()->first(),
                'title' => 'Validation Error'
            ]
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
