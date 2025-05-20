<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNewsLaterController extends Controller
{
    public function index()
    {
        $data['newslaters'] = DB::table('newslaters')->get();
        return view('admin.newslater.index', $data);

    }

    public function destroy($id)
    {
        DB::table('newslaters')->where('id', $id)->delete();
        return redirect()->route('admin.newslaters.index')->with('toastr', [
            'type' => 'success',
            'message' => 'Subscriber deleted successfully',
            'title' => 'Subscriber Success'
        ]);
    }

    public function destroyAll()
    {
        // DB::table('newslaters')->delete();
        // return redirect()->route('admin.newslaters.index')->with('toastr', [
        //     'type' => 'success',
        //     'message' => 'All Subscribers deleted successfully',
        //     'title' => 'Subscriber Success'
        // ]);
    }
}
