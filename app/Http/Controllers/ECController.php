<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ECModel;

class ECController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\ECModel::all();
        $labels = $data->pluck('time_ec')->toArray();
        $electrical_conductivity = $data->pluck('electrical_conductivity')->toArray();

        return view('ec', ['data' => $data, 'labels' => $labels, 'electrical_conductivity' => $electrical_conductivity]);
    }
}
