<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PHModel;

class PHController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\PHModel::all();
        $labels = $data->pluck('time_ph')->toArray();
        $ph_data = $data->pluck('ph_level')->toArray();

        return view('ph', ['data' => $data, 'labels' => $labels, 'ph_data' => $ph_data]);
    }

    public function mycoolfunction(){
        $data = \App\Models\PHModel::orderBy('time_ph', 'DESC')->first();
        //$ph_data = $data->orderby('time_kelembapan', 'DESC')-> get();
        return response()->json($data);
    }
}
