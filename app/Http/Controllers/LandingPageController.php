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
        return response()->json($data,200);
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

    public function dataRealisasiTrp()
    {
        $t = ApbdModel::limit(1)
                        ->select(['KDTAHAP'])
                        ->orderBy('KDTAHAP','DESC')
                        ->get();
        $p = ApbdModel::join('DASKD as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGD as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%4.1.%')
                        ->sum('a.NILAI');
        $pt = ApbdModel::join('DASKD as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGD as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%4.2.%')
                        ->sum('a.NILAI');
        $pl = ApbdModel::join('DASKD as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGD as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%4.3.%')
                        ->sum('a.NILAI');
        
        $p2 = JurnalModel::join('MATANGD as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','4')
                        ->where('a.KDPER','like','%4.1.%')
                        ->sum('jurnal.nilaik');
        $pt2 = JurnalModel::join('MATANGD as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','4')
                        ->where('a.KDPER','like','%4.2.%')
                        ->sum('jurnal.nilaik');
        $pl2 = JurnalModel::join('MATANGD as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','4')
                        ->where('a.KDPER','like','%4.3.%')
                        ->sum('jurnal.nilaik');
        $dataA = [$p,$pt,$pl];
        $dataR = [$p2,$pt2,$pl2];
        $a = [
            'target' => $dataA,
            'realisasi' => $dataR
        ];

        return response()->json($a);
    }

    public function dataRealisasiTrb()
    {
        $t = ApbdModel::limit(1)
                        ->select(['KDTAHAP'])
                        ->orderBy('KDTAHAP','DESC')
                        ->get();
        $bp = ApbdModel::join('DASKR as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGR as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%5.1.01.%')
                        ->sum('a.NILAI');
        $bbj = ApbdModel::join('DASKR as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGR as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%5.1.02.%')
                        ->sum('a.NILAI');
        $bh = ApbdModel::join('DASKR as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGR as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%5.1.05.%')
                        ->sum('a.NILAI');
        $bbs = ApbdModel::join('DASKR as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGR as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%5.1.06.%')
                        ->sum('a.NILAI');
        $bm = ApbdModel::join('DASKR as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGR as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%5.2.%')
                        ->sum('a.NILAI');
        $btt = ApbdModel::join('DASKR as a','SKDASK.IDXDASK','=','a.IDXDASK')
                        ->join('MATANGR as b','a.MTGKEY','=','b.MTGKEY')
                        ->where('KDTAHAP',$t[0]->KDTAHAP)
                        ->where('b.KDPER','like','%5.3.%')
                        ->sum('a.NILAI');
        
        $bp1 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyd','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangd','5')
                        ->where('a.KDPER','like','%5.1.01.%')
                        ->sum('jurnal.nilaid');
        $bp2 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','5')
                        ->where('a.KDPER','like','%5.1.01.%')
                        ->sum('jurnal.nilaik');
        $bpt = $bp1-$bp2;
        $bbj1 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyd','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangd','5')
                        ->where('a.KDPER','like','%5.1.02.%')
                        ->sum('jurnal.nilaid');
        $bbj2 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','5')
                        ->where('a.KDPER','like','%5.1.02.%')
                        ->sum('jurnal.nilaik');
        $bbjt = $bbj1-$bbj2;
        $bh1 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyd','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangd','5')
                        ->where('a.KDPER','like','%5.1.05.%')
                        ->sum('jurnal.nilaid');
        $bh2 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','5')
                        ->where('a.KDPER','like','%5.1.05.%')
                        ->sum('jurnal.nilaik');
        $bht = $bh1-$bh2;
        $bbs1 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyd','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangd','5')
                        ->where('a.KDPER','like','%5.1.06.%')
                        ->sum('jurnal.nilaid');
        $bbs2 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','5')
                        ->where('a.KDPER','like','%5.1.06.%')
                        ->sum('jurnal.nilaik');
        $bbst = $bbs1-$bbs2;
        $bm1 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyd','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangd','5')
                        ->where('a.KDPER','like','%5.2.%')
                        ->sum('jurnal.nilaid');
        $bm2 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','5')
                        ->where('a.KDPER','like','%5.2.%')
                        ->sum('jurnal.nilaik');
        $bmt = $bm1-$bm2;
        $btt1 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyd','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangd','5')
                        ->where('a.KDPER','like','%5.3.%')
                        ->sum('jurnal.nilaid');
        $btt2 = JurnalModel::join('MATANGR as a','jurnal.mtgkeyk','=','a.MTGKEY')
                        ->whereIn('jurnal.JNS_JURNAL',['1','3','08'])
                        ->where('jurnal.KDSTATUS','!=','142')
                        ->where('jurnal.jmatangk','5')
                        ->where('a.KDPER','like','%5.3.%')
                        ->sum('jurnal.nilaik');
        $bttt = $btt1-$btt2;

        $dataA = [$bp,$bbj,$bh,$bbs,$bm,$btt];
        $dataR = [$bpt,$bbjt,$bht,$bbst,$bmt,$bttt];
        $a = [
            'target' => $dataA,
            'realisasi' => $dataR
        ];

        return response()->json($a);
    }
}
