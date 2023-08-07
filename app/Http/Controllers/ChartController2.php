<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PHModel;
use App\Models\ECModel;
use App\Models\HumidityModel;
use App\Models\MahasiswaModel;

class ChartController2 extends Controller
{
    
    public function index()
    {

        $data = \App\Models\PHModel::all();
        $data2 = \App\Models\ECModel::all();
        $data3 = \App\Models\HumidityModel::all();
        $data4 = \App\Models\MahasiswaModel::all();
        $labels = $data->pluck('time_ph')->toArray();
        $labels2 = $data2->pluck('date_ec')->toArray();
        $labels3 = $data3->pluck('time_kelembapan')->toArray();
        $labels4 = $data4->pluck('fakultas')->toArray();
        $ph_data = $data->pluck('ph_level')->toArray();
        $electrical_conductivity = $data2->pluck('electrical_conductivity')->toArray();
        $humidity = $data3->pluck('persentasi_kelembapan')->toArray();
        $jumlah = $data4->pluck('jumlah')->toArray();

        return view('chart2', ['data' => $data, 'labels' => $labels, 'ph_data' => $ph_data,'data2' => $data2,'labels2' => $labels2, 'electrical_conductivity' => $electrical_conductivity, 'data3' => $data3, 'labels3' => $labels3, 'humidity' => $humidity, 'data4' => $data4, 'labels4' => $labels4, 'jumlah' => $jumlah]);
    }

    public function readdata(){
        $data = \App\Models\HumidityModel::orderBy('time_kelembapan', 'DESC')->first();
        return response()->json($data);
    }

    public function readdata2(){
        $data2 = \App\Models\PHModel::orderBy('time_ph', 'DESC')->first();
        return response()->json($data2);
    }
}