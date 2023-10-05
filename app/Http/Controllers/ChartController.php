<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PHModel;
use App\Models\ECModel;
use App\Models\HumidityModel;
use App\Models\LuxModel;

class ChartController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\PHModel::all();
        $data2 = \App\Models\ECModel::all();
        $data3 = \App\Models\HumidityModel::all();
        $data4 = \App\Models\LuxModel::all();
        $labels = $data->pluck('time_ph')->toArray();
        $labels2 = $data2->pluck('time_ec')->toArray();
        $labels3 = $data3->pluck('time_kelembapan')->toArray();
        $labels4 = $data4->pluck('time_lux')->toArray();
        $ph_data = $data->pluck('ph_level')->toArray();
        $electrical_conductivity = $data2->pluck('electrical_conductivity')->toArray();
        $humidity = $data3->pluck('persentasi_kelembapan')->toArray();
        $lux = $data4->pluck('lux_data')->toArray();

        return view('chart', ['data' => $data, 'labels' => $labels, 'ph_data' => $ph_data,'data2' => $data2,'labels2' => $labels2, 'electrical_conductivity' => $electrical_conductivity, 'data3' => $data3, 'labels3' => $labels3, 'humidity' => $humidity, 'data4' => $data4, 'labels4' => $labels4, 'lux' => $lux]);
    }

    public function readdata(){
        $data = \App\Models\HumidityModel::orderBy('time_kelembapan', 'DESC')->first();
        return response()->json($data);
    }

    public function readdata2(){
        $data2 = \App\Models\PHModel::orderBy('time_ph', 'DESC')->first();
        return response()->json($data2);
    }

    public function readdata3(){
        $data3 = \App\Models\LuxModel::orderBy('time_lux', 'DESC')->first();
        return response()->json($data3);
    }

    public function readdata4(){
        $data4 = \App\Models\ECModel::orderBy('time_ec', 'DESC')->first();
        return response()->json($data4);
    }
}