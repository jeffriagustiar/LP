<?php

namespace App\Http\Controllers;

use App\Model\ApbdModel;
use App\Model\JurnalModel;
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

    public function dataApbd()
    {
        $t = ApbdModel::limit(1)
                        ->select(['KDTAHAP'])
                        ->orderBy('KDTAHAP','DESC')
                        ->get();
        $p = ApbdModel::join('DASKD as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->sum('a.NILAI');
        $b = ApbdModel::join('DASKR as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->sum('a.NILAI');
        $p2 = ApbdModel::join('DASKB as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->sum('a.NILAI');

        $datap = ["746928793801","723204712708","818001019824",'708900288188',"682401082138",$p];
        $datab = ["749948767275","794830171158","876370302788","750947870902","747200734949",$b];
        $datapem = ["47259022994","106963597218","69669282964","42047582714","64799652811",$p2];
        $a = [
            'pendapatan' => $datap,
            'belanja' => $datab,
            'pembiayaan' => $datapem
        ];

        return response()->json($a);
    }

    public function dataRealisasiApbd()
    {
        $p = JurnalModel::whereIn('JNS_JURNAL',['1','3','08'])
                        ->where('KDSTATUS','!=','142')
                        ->where('jmatangk','4')->sum('nilaik');
        $p2 = JurnalModel::whereIn('JNS_JURNAL',['1','3','08'])
                        ->where('KDSTATUS','!=','142')
                        ->where('jmatangk','6')->sum('nilaik');
        $b1 = JurnalModel::whereIn('JNS_JURNAL',['1','3','08'])
                        ->where('KDSTATUS','!=','142')
                        ->where('jmatangd','5')->sum('nilaid');
        $b2 = JurnalModel::whereIn('JNS_JURNAL',['1','3','08'])
                        ->where('KDSTATUS','!=','142')
                        ->where('jmatangk','5')->sum('nilaik');
        $b = $b1-$b2;

        $datap = ["739010529392.60","708532769024","796837014305","717701105715","677296933413",$p];
        $datab = ["695997486674.48","716396747761","805939541097","702910943145","677726610137",$b];
        $datapem = ["78089893439","106963597218","79735967331","59945152495","74735915027",$p2];
        $a = [
            'pendapatan' => $datap,
            'belanja' => $datab,
            'pembiayaan' => $datapem
        ];

        return response()->json($a);
    }
}
