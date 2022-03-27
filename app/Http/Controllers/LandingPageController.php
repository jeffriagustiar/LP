<?php

namespace App\Http\Controllers;

use App\Model\LandingModel;
use Illuminate\Http\Request;

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
}
