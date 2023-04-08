<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MainModel extends Model
{


    protected $fillable = ['id_tim','soal','nilai'];
    protected $tables = "tbl_soal";
    protected $primary ="id_soal";

    static function getdata(){
        return DB::table('tbl_soal')->select('soal', 'nilai','id_tim')->get();
    }
}
