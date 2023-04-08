<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\MainModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index(){
        //return ["data" => MainModel::getdata()];
        return view('pquiz',[
            "data" => MainModel::getdata()
        ]);
    }

    function score(){
        //return ["score" =>MainModel::getScore()];
        return view('welcome',[
            "score" => MainModel::getScore()
        ]);
    }

    function getSoal($id){
        //return response()->json($id);
        return response()->json(MainModel::GetSoal($id));
    }

    function updated(){
       
        // melakukan update data pada tabel users dengan id=1
       $x =  DB::table('tbl_soal')
        ->where('id_soal', request('id_soal'))
        ->update(['soal' => request('soal'), 'nilai' => request('nilai')]);

       if ($x) {
        return response()->json(["pesan" => true]);
       }else{
        return response()->json(["pesan" => false]);
       }

        //return response()->json(request());
    }
}
