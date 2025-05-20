<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsLaterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newslaters',
        ]);

        DB::table('newslaters')->insert([
            'email' => $request->email,
            'created_at' => now(),
        ]);
        return redirect()->back()->with('toastr', [
            'type' => 'success',
            'message' => 'Thank you for subscribing.',
            'title' => 'Subscribed'
        ]);


    }
}
