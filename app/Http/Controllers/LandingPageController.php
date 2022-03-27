<?php

namespace App\Http\Controllers;

use App\Model\LandingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                                $data2= DB::table('tbl_nilai')->select(
                                        [
                                          DB::raw('SUM(nilai) as nilai'),
                                        ])
                                        ->whereMonth('created_at','1')
                                        ->get();
        foreach($data as $d)
        {
            $a[] = $d->nilai;
            // echo "<br>",$a;
        }
        // dd($data);
        return response()->json($a,200);
        // return response()->json($data,200);
        // return view('pages.landing',[
        //     'a' => "tes"
        // ]);
    }
}
