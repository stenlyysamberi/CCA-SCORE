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

    static function getScore(){
        $totalSkor = DB::table('tbl_tim')
            ->join('tbl_soal', 'tbl_tim.id_tim', '=', 'tbl_soal.id_tim')
            ->select('tbl_tim.nama_tim', DB::raw('SUM(tbl_soal.nilai) as total_skor'))
            ->groupBy('tbl_tim.nama_tim')
            ->orderByDesc('total_skor')
            ->get();
        
        return $totalSkor;
    }
}
