<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LuxModel;

class LuxController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\LuxModel::all();
        $labels = $data->pluck('time_lux')->toArray();
        $lux = $data->pluck('lux_data')->toArray();

        return view('lux', ['data' => $data, 'labels' => $labels, 'lux' => $lux]);
    }
}
