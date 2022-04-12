<?php

namespace App\Http\Controllers;

use App\Model\Sp2dModel;
use App\Model\Sp2diModel;
use App\Model\LandingModel;
use App\Model\Sp2d\PajakSp2dModel;
use Illuminate\Http\Request;
use App\Model\Sp2d\PotonganSp2dModel;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.data.listdata');
    }

    public function getData()
    {
        // $data = LandingModel::all();
        // KDSTATUS = 21 GU
        // $data = Sp2diModel::where('KDSTATUS','24');
                            // ->orderBy('NOSP2D', 'desc');
                            // ->get();
        $data = Sp2diModel::join('DAFTUNIT as a','SP2D.UNITKEY','=','a.UNITKEY')
                            ->join('tbl_sp2d_jef as b','SP2D.NOSP2D','=','b.NOSP2D')
                            ->select(['SP2D.*','a.NMUNIT','b.*'])
                            ->where('SP2D.KDSTATUS','24');

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->NOSP2D.'" 
                                data-original-title="Delete" 
                                class="btn btn-danger btn-sm deleteData">
                                <i class="fa fa-trash-o"></i>
                            </a>
                            <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->nosp2dx.'" 
                                data-original-title="Look" 
                                class="btn btn-secondary btn-sm DataLook">
                                <i class="fa fa-search"></i>
                            </a>
                            <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->nosp2dx.'" 
                                data-original-title="Look" 
                                class="btn btn-secondary btn-sm DataLookPotongan">
                                <i class="fa fa-cut"></i>
                            </a>
                            <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->nosp2dx.'" 
                                data-original-title="Look" 
                                class="btn btn-secondary btn-sm DataLookPajak">
                                <i class="fa fa-book"></i>
                            </a>';
                    return $a;
                })
                ->addColumn('select', function($i){
                    $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$i->NOSP2D.'" 
                                data-p2="'.$i->NOSP2D.'"
                                data-original-title="Select" 
                                class="btn btn-primary btn-sm selectData"> Select 
                            </a>';
                    return $a;
                })
                ->rawColumns(['action','select'])
                ->make(true);
    }

    public function deleteData($id)
    {
        $data = LandingModel::find($id);
        $data->delete();

        return response()->json([
            'title' => 'Hapus Data',
            'success' => 'Success hapus data'
        ]);
    }

    public function addData(Request $request)
    {
        $data = [
            'nilai' => $request->nilai
        ];

        LandingModel::create($data);

        return response()->json([
            'title' => 'Add Data',
            'success' => 'Success tambah data'
        ]);
    }

    public function lookData($id)
    {
        $data = Sp2dModel::join('tbl_sp2d_jef as a','SP2DDETR.NOSP2D','=','a.nosp2d')
                            ->join('MKEGIATAN as b','SP2DDETR.KDKEGUNIT','=','b.KDKEGUNIT')
                            ->join('MATANGR as c','SP2DDETR.MTGKEY','=','c.MTGKEY')
                            ->select(['SP2DDETR.*','a.*','b.NMKEGUNIT','c.NMPER'])
                            ->where('a.nosp2dx',$id);

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('select', function($i){
                    $a = $i->id;
                    return $a;
                })
                ->rawColumns(['select'])
                ->make(true);
    }

    public function lookDataPotongan()
    {
        $data = PotonganSp2dModel::all();

        return response()->json($data);
    }

    public function lookDataPajak()
    {
        $data = PajakSp2dModel::all();

        return response()->json($data);
    }

}
