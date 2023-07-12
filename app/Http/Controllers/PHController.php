<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PHModel;
use App\Models\ECModel;
use App\Models\HumidityModel;

class PHController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\PHModel::all();
        $data2 = \App\Models\ECModel::all();
        $data3 = \App\Models\HumidityModel::all();
        $labels = $data->pluck('month_ph')->toArray();
        $labels2 = $data2->pluck('date_ec')->toArray();
        $labels3 = $data3->pluck('date_humidity')->toArray();
        $ph_data = $data->pluck('ph_data')->toArray();
        $electrical_conductivity = $data2->pluck('electrical_conductivity')->toArray();
        $humidity = $data3->pluck('humidity_percentage')->toArray();

        return view('ph', ['data' => $data, 'labels' => $labels, 'ph_data' => $ph_data,'data2' => $data2,'labels2' => $labels2, 'electrical_conductivity' => $electrical_conductivity, 'data3' => $data3, 'labels3' => $labels3, 'humidity' => $humidity]);
    }
    
}