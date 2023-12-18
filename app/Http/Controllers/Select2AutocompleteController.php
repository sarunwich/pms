<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class Select2AutocompleteController extends Controller
{
    //
    public function dataAjax(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("users")
                ->select("id", "name")
                 ->where("type","0")
                ->where('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
    public function datateacher(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("users")
                ->select("id", "name")
                ->where("type","3")
                ->orWhere('type', '=', '2')
                ->where('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
}
