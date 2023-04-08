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
        return view('welcome',[
            "nilai" => MainModel::getScore()
        ]);
    }
}
