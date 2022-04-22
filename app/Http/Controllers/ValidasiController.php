<?php

namespace App\Http\Controllers;

use App\Validasi\JValidModel;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.data.validasi');
    }

    public function listValidasi(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $s = $request->q;
            $data = JValidModel::select('NOBBANTU','NMBKAS')
                                ->where('NMUNIT','LIKE',"%$s%")
                                ->get();
        }

        // $data = JValidModel::all();

        return response()->json($data);
    }
}
