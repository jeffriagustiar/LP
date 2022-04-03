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
                    $a = '<div class="btn-group">
                                <form action="'.$item->id.'" method="POST">
                                    '. method_field('delete') . csrf_field() .'
                                    <button type="submit" class="btn btn-block btn-danger">
                                        Delete
                                    </button>
                                </form>
                          </div>';
                    return $a;
                })
                ->addColumn('tes', function($i){
                    return 'tes';
                })
                ->rawColumns(['action','tes'])
                ->make(true);
    }
}
