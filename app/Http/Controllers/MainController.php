<?php

namespace App\Http\Controllers;

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

    function updated($id){
        //return response()->json($id);
        return response()->json(MainModel::GetSoal($id));
    }
}
