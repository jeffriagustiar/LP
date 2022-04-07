<?php

namespace App\Http\Controllers;

use App\Model\LandingModel;
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
        $data = LandingModel::all();

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$item->id.'" 
                                data-original-title="Delete" 
                                class="btn btn-danger btn-sm deleteData"> Delete 
                            </a>';
                    return $a;
                })
                ->addColumn('select', function($i){
                    $a = ' <a 
                                href="javascript:void(0)" 
                                data-toggle="tooltip"  
                                data-id="'.$i->id.'" 
                                data-p2="'.$i->nilai.'"
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

}
