<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        
        //$this->middleware('auth');
        // $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        // $data = [
        //     'title' => 'Chart Mahasiswa',
        //     'mahasiswa' => $this->MahasiswaModel->AllData(),
        // ];

        $data = \App\Models\MahasiswaModel::all();
        $labels = $data->pluck('fakultas')->toArray();
        $jumlah = $data->pluck('jumlah')->toArray();

        return view('mahasiswa', ['data' => $data, 'labels' => $labels, 'jumlah' => $jumlah]);
    }
}
