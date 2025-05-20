<?php

namespace App\Http\Requests;

use \Illuminate\Contracts\Validation\Validator;
use \Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'sub_category_name' => 'required|string|max:255|unique:sub_categories,sub_category_name'
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
