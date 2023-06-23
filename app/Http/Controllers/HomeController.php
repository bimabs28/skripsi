<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'name' => 'bima bayu' ,
            'channel' => $request->channel
        ];
        return view('adminlte', $data);
    }

     public function humidity(Request $request){
        return view('humidity');
     }

     public function electrical_conductivity(){
        return view('ec');
     }

     public function ph(){
        return view('ph');
     }

     public function mahasiswa(){
      return view('mahasiswa');
   }
}
