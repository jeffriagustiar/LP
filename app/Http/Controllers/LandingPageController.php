<?php

namespace App\Http\Controllers;

use App\Model\LandingModel;
use App\Model\Sp2dModel;
use App\Model\StsModel;
use GuzzleHttp\Psr7\Query;
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
        $data = Sp2dModel::sum('NILAI');
        return response()->json($data,200);
    }

    public function sum2()
    {
        $data = StsModel::sum('NILAI');
        return response()->json($data,200);
    }

    public function dataChart()
    {
        $a = [];
        // $data = LandingModel::sum('nilai')
        // ->whereMonth('created_at','=','11')->get();
                                // ->orderBy('created_at');
                            //    $data= DB::table('tbl_nilai')->select(
                            //         [
                            //           DB::raw('SUM(nilai) as nilai'),
                            //           DB::raw('MONTH(created_at) as date')
                            //         ])
                            //         ->groupBy('date')
                            //         ->orderby('date')
                            //         ->get();
                            $data= Sp2dModel::join('SP2D','SP2DDETR.NOSP2D','=','SP2D.NOSP2D')
                                        ->select(
                                            [
                                                DB::raw('SUM(SP2DDETR.NILAI) as nilai'),
                                                DB::raw('MONTH(SP2D.TGLSP2D) as date1')
                                            ])
                                        ->groupBy(DB::raw('MONTH(SP2D.TGLSP2D)'))
                                        ->orderBY(DB::raw('MONTH(SP2D.TGLSP2D)'))
                                        ->get();
        foreach($data as $d)
        {
            $a[] = $d->nilai;
        }
        return response()->json($a,200);
        
    }

    public function dataload()
    {
        $data = StsModel::join('STS','RKMDETD.NOSTS','=','STS.NOSTS')
                            ->select(['STS.NOSTS','STS.TGLSTS','RKMDETD.NILAI'])
                            ->limit(5)
                            ->orderBy('TGLSTS', 'desc')
                            ->get();
                            // ->tosql();
        // dd($data);
        // return DataTables::of($data)->make(true);
        return response()->json($data,200);

        // return Query($data);
    }
}
