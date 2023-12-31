<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataEdukasiModel extends Model
{
    public static function getBalitaData()
    {
        return DB::table('data_balita')->get();
    }

    public static function getPengukuranData()
    {
        return DB::table('data_pengukuran')->get();
    }

    public static function insert($params)
    {
        return DB::table('data_edukasi')->insert($params);
    }

    public static function getData()
    {
        return DB::table('data_edukasi as a')
            ->select('a.*', 'c.nama_balita')
            ->join('data_pengukuran as b', 'b.id', 'a.id_pengukuran')
            ->join('data_balita as c', 'c.nik', 'b.nik_balita')
            ->get();
    }

    public static function getDataAdmin()
    {
        return DB::table('data_edukasi as a')
            ->select('a.*', 'c.nama_balita')
            ->join('data_pengukuran as b', 'b.id', 'a.id_pengukuran')
            ->join('data_balita as c', 'c.nik', 'b.nik_balita')
            ->where('c.kode_pos', Auth::user()->kode_pos)
            ->get();
    }
    public static function getDataUser()
    {
        return DB::table('data_edukasi as a')
            ->select('a.*', 'c.nama_balita')
            ->join('data_pengukuran as b', 'b.id', 'a.id_pengukuran')
            ->join('data_balita as c', 'c.nik', 'b.nik_balita')
            ->where('c.no_kk_user', Auth::user()->no_kk)
            ->get();
    }


    public static function getDataById($id)
    {
        return DB::table('data_edukasi')->where('id', $id)->first();
    }

    public static function updateData($id, $params)
    {
        return DB::table('data_edukasi')->where('id', $id)->update($params);
    }

    public static function deleteData($id)
    {
        return DB::table('data_edukasi')->where('id', $id)->delete();
    }
}
