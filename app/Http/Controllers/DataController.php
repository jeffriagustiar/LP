<?php

namespace App\Http\Controllers;

use App\Model\Sp2diModel;
use App\Model\LandingModel;
use App\Model\Sp2dModel;
use Illuminate\Http\Request;
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
                            ->select(['SP2D.*','a.NMUNIT'])
                            ->where('SP2D.KDSTATUS','24');

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->NOSP2D.'" 
                                data-original-title="Delete" 
                                class="btn btn-danger btn-sm deleteData"> Delete 
                            </a>
                            <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->NOSP2D.'" 
                                data-original-title="Look" 
                                class="btn btn-warning btn-sm DataLook"> Look 
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
        // $data = LandingModel::where('id',$id);
        $data = Sp2diModel::where('NOSP2D','0003/LS-GAJI/BKD/PYK/2021');

        // $data = Sp2dModel::where('NOSP2D','0003/LS-GAJI/BKD/PYK/2021');
        // $data = Sp2dModel::where('NOSP2D',$id);

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    $a = $item->id;
                    return $a;
                })
                ->addColumn('select', function($i){
                    $a = $i->id;
                    return $a;
                })
                ->rawColumns(['action','select'])
                ->make(true);
    }

}
