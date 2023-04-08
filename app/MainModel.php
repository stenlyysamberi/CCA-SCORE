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
        $totalSkor = DB::table('tbl_team')
            ->join('tbl_soal', 'tbl_team.id_tim', '=', 'tbl_soal.id_tim')
            ->select('tbl_team.nama_team', DB::raw('SUM(tbl_soal.nilai) as total_skor'))
            ->groupBy('tbl_team.nama_team')
            ->orderByDesc('total_skor')
            ->limit(3)
            ->get();
        
        return $totalSkor;
    }
}
