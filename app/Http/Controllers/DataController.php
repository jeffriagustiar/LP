<?php

namespace App\Http\Controllers;

use App\Model\Sp2dModel;
use App\Model\Sp2diModel;
use App\Model\LandingModel;
use App\Model\Sp2d\PajakSp2dModel;
use Illuminate\Http\Request;
use App\Model\Sp2d\PotonganSp2dModel;
use App\Model\Sp2d\TtdModel;
use App\Model\Spm\SpmModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
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
                            ->select(['SP2D.*','a.NMUNIT','b.nosp2dx','b.nosp2d as no_sp2d'])
                            ->where('SP2D.KDSTATUS','24');

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->nosp2dx.'" 
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
                // bisa jadi dipakai
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
                ->addColumn('switch', function($i){
                    $a = '
                        <div class="media-body icon-state">
                            <label class="switch">
                                <input type="checkbox" checked><span class="switch-state"></span>
                            </label>
                        </div>';
                    $b = '
                        <div class="media-body icon-state">
                            <label class="switch">
                                <input type="checkbox"><span class="switch-state"></span>
                            </label>
                        </div>';
                    $x = '
                        <div class="media-body icon-state">
                            <label class="switch">
                                <input type="checkbox" checked><span class="switch-state"></span>
                            </label>
                        </div>';
                    return $x;
                })
                ->rawColumns(['action','select','switch'])
                ->make(true);
    }

    public function deleteData($id)
    {
        $data = Sp2diModel::join('tbl_sp2d_jef as a','SP2D.NOSP2D','=','a.NOSP2D')
                            ->select(['a.nosp2d'])
                            ->where('a.nosp2dx',$id);
        $data->delete();

        return response()->json([
            'title' => 'Hapus Data',
            'success' => 'Success hapus data'
        ]);
    }

    public function addData(Request $request)
    {
        $data = [
            // 'nilai' => $request->nilai
            'UNITKEY' => $request->unitkey,
            'NOSP2D' => $request->nosp2d,
            'KDSTATUS' => '24',
            'NOSPM' => $request->nospm,
            'KEYBEND' => $request->keybend,
            'IDXSKO' => $request->idxsko,
            'IDXTTD' => $request->idttd,
            'KDP3' => $request->rekan,
            'IDXKODE' => $request->idxkode,
            // 'NOREG' => '',
            'KETOTOR' => $request->nospd,
            'NOKONTRAK' => $request->nokon,
            'KEPERLUAN' => $request->keperluan,
            'PENOLAKAN' => '1',
            'TGLSP2D' => $request->tglsp2d,
            'TGLSPM' => $request->tglspm,
            'NOBBANTU' => '1'
            
        ];

        Sp2diModel::create($data);

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

    public function lookDataPotongan($id)
    {
        $data = PotonganSp2dModel::join('tbl_sp2d_jef as a','SP2DDETB.NOSP2D','=','a.nosp2d')
                                    ->join('MATANGB as b','SP2DDETB.MTGKEY','=','b.MTGKEY')
                                    ->select([
                                        'SP2DDETB.*',
                                        'a.nosp2dx',
                                        'a.nosp2d as no_sp2d',
                                        'b.NMPER'
                                        ])
                                    ->where('a.nosp2dx',$id);

        return DataTables::of($data)->make(true);
    }

    public function lookDataPajak($id)
    {
        $data = PajakSp2dModel::join('tbl_sp2d_jef as a','SP2DPJK.NOSP2D','=','a.nosp2d')
                                ->join('JPAJAK as b','SP2DPJK.PJKKEY','=','b.PJKKEY')
                                ->select([
                                    'SP2DPJK.*',
                                    'a.nosp2dx',
                                    'a.nosp2d as no_sp2d',
                                    'b.NMPAJAK'
                                    ])
                                ->where('a.nosp2dx',$id);

        return DataTables::of($data)->make(true);
    }

    public function TtdSp2d()
    {
        $data = TtdModel::join('PEGAWAI as a','JABTTD.NIP','=','a.NIP')
                            ->select([
                                'JABTTD.*',
                                'a.NAMA',
                            ]);

        return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('select', function($i){
                            $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$i->IDXTTD.'" 
                                data-p2="'.$i->NAMA.'"
                                data-original-title="Select" 
                                class="btn btn-primary btn-sm selectDataTtd"> Select 
                            </a>';
                            return $a;
                        })
                        ->rawColumns(['select'])
                        ->make(true);
    }

    public function listSpmSp2d()
    {
        $data = SpmModel::leftJoin('SP2D as a','ANTARBYR.NOSPM','=','a.NOSPM')
                            ->join('DAFTUNIT as b','ANTARBYR.UNITKEY','=','b.UNITKEY')
                            ->select(['ANTARBYR.*','b.NMUNIT'])
                            ->whereNull('a.NOSPM');

        return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('select', function($i){

                            if ($i->NOKONTRAK == null) {
                                $as = '-';
                            }else{
                                $as = $i->NOKONTRAK;
                            }

                            $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$i->NOSPM.'" 
                                data-d2="'.$i->KETOTOR.'"
                                data-d3="'.$i->KEPERLUAN.'"
                                data-d4="'.$as.'"
                                data-d5="'.$i->KDP3.'"
                                data-d6="'.$i->TGLSPM.'"
                                data-d7="'.$i->UNITKEY.'"
                                data-d8="'.$i->KEYBEND.'"
                                data-d9="'.$i->IDXSKO.'"
                                data-d10="'.$i->IDXKODE.'"
                                data-original-title="Select" 
                                class="btn btn-primary btn-sm selectDataSpm"> Select 
                            </a>';
                            return $a;
                        })
                        ->rawColumns(['select'])
                        ->make(true);
    }

}
