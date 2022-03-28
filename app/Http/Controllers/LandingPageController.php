<?php

namespace App\Http\Controllers;

use App\Model\LandingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LandingPageController extends Controller
{
    public function index() 
    {
        return view('pages.landing');
    }

    public function sum1()
    {
        $data = LandingModel::sum('nilai');
        return response()->json($data,200);
    }

    public function sum2()
    {
        $data = LandingModel::sum('nilai');
        return response()->json($data,200);
    }

    public function dataChart()
    {
        $a = [];
        // $data = LandingModel::sum('nilai')
        // ->whereMonth('created_at','=','11')->get();
                                // ->orderBy('created_at');
                               $data= DB::table('tbl_nilai')->select(
                                    [
                                      DB::raw('SUM(nilai) as nilai'),
                                      DB::raw('MONTH(created_at) as date')
                                    ])
                                    ->groupBy('date')
                                    ->orderby('date')
                                    ->get();
        foreach($data as $d)
        {
            $a[] = $d->nilai;
        }
        return response()->json($a,200);
        
    }

    public function dataload()
    {
        $data = LandingModel::limit(5)->orderBy('created_at','desc')->get();
        // dd($data);
        // return DataTables::of($data)->make(true);
        return response()->json($data,200);
    }
}
