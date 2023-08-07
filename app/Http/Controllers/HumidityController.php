<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HumidityModel;

class HumidityController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\HumidityModel::all();
        $labels = $data->pluck('time_kelembapan')->toArray();
        $humidity = $data->pluck('persentasi_kelembapan')->toArray();

        return view('humidity', ['data' => $data, 'labels' => $labels, 'humidity' => $humidity]);
    }

    public function mycoolfunction(){
        $data = \App\Models\HumidityModel::orderBy('time_kelembapan', 'DESC')->first();
        //$ph_data = $data->orderby('time_kelembapan', 'DESC')-> get();
        return response()->json($data);
    }
}
