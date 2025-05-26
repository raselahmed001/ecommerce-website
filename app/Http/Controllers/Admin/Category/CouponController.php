<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['coupons'] = Coupon::select('id', 'coupon_code','discount_amount')->get();
        return view('admin.coupon.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        try {
            $validated = $request->validated();

            Coupon::create([
                'coupon_code' => $validated['coupon_code'],
                'discount_amount' => $validated['discount_amount']
            ]);

            return response()->json([
                'success' => true,
                'toastr' => [
                    'type' => 'success',
                    'message' => 'Coupon created successfully',
                    'title' => 'Success'
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'toastr' => [
                    'type' => 'error',
                    'message' => 'Failed to create coupon',
                    'title' => 'Error'
                ]
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => 'Coupon not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'coupon_code' => $coupon->coupon_code,
                'discount_amount' => $coupon->discount_amount,

            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        try {
            $validated = $request->validated();

            $coupon->update([
                'coupon_code' => $validated['coupon_code'],
                'discount_amount' => $validated['discount_amount']
            ]);

            return response()->json([
                'success' => true,
                'toastr' => [
                    'type' => 'success',
                    'message' => 'Coupon updated successfully',
                    'title' => 'Success'
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'toastr' => [
                    'type' => 'error',
                    'message' => 'Failed to update coupon',
                    'title' => 'Error'
                ]
            ], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('toastr', [
            'type' => 'success',
            'message' => 'Coupon deleted successfully',
            'title' => 'Coupon Success'
        ]);
    }
}
