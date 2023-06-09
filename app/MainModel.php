<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MainModel extends Model
{

    protected $fillable = ['id_tim','soal','nilai','id_soal'];
    protected $tables = "tbl_soal";
    protected $primary ="id_soal";

    static function getdata(){
        $i = DB::table('tbl_team')
        ->join('tbl_soal','tbl_team.id_tim','=','tbl_soal.id_tim')
        ->select('tbl_soal.id_soal','tbl_soal.soal', 'tbl_soal.nilai','tbl_team.id_tim','tbl_team.nama_team')->get();
        return $i;
    }

    static function getScore(){
        $totalSkor = DB::table('tbl_team')
            ->join('tbl_soal', 'tbl_team.id_tim', '=', 'tbl_soal.id_tim')
            ->select('tbl_team.img','tbl_team.nama_team', DB::raw('SUM(tbl_soal.nilai) as total_skor'))
            ->groupBy('tbl_team.img','tbl_team.nama_team')
            ->orderByDesc('total_skor')
            ->limit(3)
            ->get();
        
        return $totalSkor;
    }

    static function GetSoal($id){
        $user = DB::table('tbl_soal')
            ->where('id_soal', $id)
            ->first();
        return $user;

    }

    static function getTeam(){
        $users = DB::table('tbl_team')->get();
        return $users;

    }
}
