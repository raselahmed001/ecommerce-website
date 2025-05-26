<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {
        $productId = $this->route('product') ? $this->route('product')->id : null;
        $isUpdate = $productId !== null;

        return [
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => [
                'required',
                'exists:sub_categories,id,category_id,' . $this->category_id
            ],
            'brand_id' => 'required|exists:brands,id',
            'product_name' => 'required|string|max:255|unique:products,product_name,' . $productId,
            'product_code' => 'required|string|max:50|unique:products,product_code,' . $productId,
            'product_quantity' => 'required|integer|min:0',
            'product_color' => [
                'required',
                function ($attribute, $value, $fail) {
                    try {
                        $colors = json_decode($value, true);
                        if (!is_array($colors) || empty($colors)) {
                            $fail('At least one color is required.');
                        }
                    } catch (\Exception $e) {
                        $fail('Invalid color format.');
                    }
                }
            ],
            'product_size' => [
                'required',
                function ($attribute, $value, $fail) {
                    try {
                        $sizes = json_decode($value, true);
                        if (!is_array($sizes) || empty($sizes)) {
                            $fail('At least one size is required.');
                        }
                    } catch (\Exception $e) {
                        $fail('Invalid size format.');
                    }
                }
            ],
            'product_details' => 'nullable|string',
            'selling_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|lt:selling_price|min:0',
            'video_link' => 'nullable|url',
            'image_one' => $isUpdate ? 'sometimes|image|mimes:png,jpg,jpeg,webp|max:2048' : 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'image_two' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'image_three' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'nullable|boolean',
            'main_slider' => 'nullable|boolean',
            'hot_deal' => 'nullable|boolean',
            'best_rated' => 'nullable|boolean',
            'mid_slider' => 'nullable|boolean',
            'hot_new' => 'nullable|boolean',
            'trendy' => 'nullable|boolean',
        ];
    }

    //    protected function prepareForValidation()
    //    {
    //        $this->merge([
    //            'status' => $this->boolean('status'),
    //            'main_slider' => $this->boolean('main_slider'),
    //            'hot_deal' => $this->boolean('hot_deal'),
    //            'best_rated' => $this->boolean('best_rated'),
    //            'mid_slider' => $this->boolean('mid_slider'),
    //            'hot_new' => $this->boolean('hot_new'),
    //            'trendy' => $this->boolean('trendy'),
    //        ]);
    //    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'errors' => $validator->errors(),
            'toastr' => [
                'type' => 'error',
                'message' => 'Please fix the validation errors',
                'title' => 'Validation Error'
            ]
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
