<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;

trait JsonResponseTrait
{
    public function successResponse(string $message, string $title = 'Success', string $routeName = null)
    {
        return response()->json([
            'success' => true,
            'toastr' => [
                'type' => 'success',
                'message' => $message,
                'title' => $title,
            ],
            'redirect' => $routeName ? route($routeName) : null,
        ]);
    }

    // app/Traits/JsonResponseTrait.php

    public function errorMessageResponse(string $message, string $title = 'Error')
    {
        return response()->json([
            'success' => false,
            'toastr' => [
                'type' => 'error',
                'message' => $message,
                'title' => $title,
            ]
        ]);
    }


    public function validationErrorResponse(Validator $validator, string $title = 'Validation Error')
    {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
            'toastr' => [
                'type' => 'error',
                'message' => $validator->errors()->first(),
                'title' => $title,
            ],
        ], 422);
    }

    public function dataResponse(array $data)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function redirectSuccess(string $routeName, string $message, string $title = 'Success')
    {
        return redirect()->route($routeName)->with('toastr', [
            'type' => 'success',
            'message' => $message,
            'title' => $title,
        ]);
    }

    // Redirect: error with toastr
    public function redirectError(string $routeName, string $message, string $title = 'Error')
    {
        return redirect()->route($routeName)->with('toastr', [
            'type' => 'error',
            'message' => $message,
            'title' => $title,
        ]);
    }

}
