<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PHModel;

class PHController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\PHModel::all();
        $labels = $data->pluck('month_ph')->toArray();
        $ph_data = $data->pluck('ph_data')->toArray();

        return view('ph', ['data' => $data, 'labels' => $labels, 'ph_data' => $ph_data]);
    }
}
