<?php

namespace App\Http\Controllers;

use App\Validasi\JValidModel;
use App\Validasi\ListValidasiModel;
use App\Validasi\ListValidasiPModel;
use App\Validasi\StsValidasiPModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
                                ->where('NMBKAS','LIKE',"%$s%")
                                ->get();
        }

        return response()->json($data);
    }

    public function listSValidasi(Request $request)
    {
        $data =  ListValidasiModel::join('DAFTUNIT as a','BKUD.UNITKEY','=','a.UNITKEY')
                                    ->join('STS as b','BKUD.NOSTS','=','b.NOSTS')
                                    ->select([
                                        'BKUD.NOBUKAS','a.NMUNIT','BKUD.TGLKAS',
                                        'BKUD.TGLVALID','BKUD.URAIAN','b.NOSTS',
                                        'BKUD.NOBUKTIKAS'
                                    ]);
        if ($request->id != null ) {
            $data->where('BKUD.NOBBANTU',$request->id);
        }
        
        return DataTables::of($data)->make(true);
    }
    

    public function listPValidasi(Request $request)
    {
        $data =  ListValidasiPModel::join('DAFTUNIT as a','BKUK.UNITKEY','=','a.UNITKEY')
                                    ->join('SP2D as b','BKUK.NOSP2D','=','b.NOSP2D')
                                    ->select([
                                        'BKUK.NOBUKAS','a.NMUNIT','BKUK.TGLKAS',
                                        'BKUK.TGLVALID','BKUK.URAIAN','b.NOSP2D',
                                        'BKUK.NOBUKTIKAS'
                                    ]);
        if ($request->id != null ) {
            $data->where('BKUK.NOBBANTU',$request->id);
        }
        
        return DataTables::of($data)->make(true);
    }

    public function listNonValidasi()
    {
        $data = StsValidasiPModel::leftJoin('BKUD as a','STS.NOSTS','=','a.NOSTS')
                                    ->join('BKBKAS as b','STS.NOBBANTU','=','b.NOBBANTU')
                                    ->select(['STS.*','b.NMBKAS','a.NOSTS as n_sts'])
                                    ->whereNull('a.NOSTS')
                                    ->whereNotNull('STS.TGLVALID');

        return DataTables::of($data)->make(true);
    }
}
