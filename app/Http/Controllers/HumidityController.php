<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HumidityModel;

class HumidityController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\HumidityModel::all();
        $labels = $data->pluck('date_humidity')->toArray();
        $humidity = $data->pluck('humidity_percentage')->toArray();

        return view('humidity', ['data' => $data, 'labels' => $labels, 'humidity' => $humidity]);
    }
}
