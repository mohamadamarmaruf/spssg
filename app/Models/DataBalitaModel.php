<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataBalitaModel extends Model
{
    public static function insert($params)
    {
        return DB::table('data_balita')->insert($params);
    }

    public static function updateData($id, $params)
    {
        return DB::table('data_balita')->where('nik', $id)->update($params);
    }
    public static function deleteData($id)
    {
        return DB::table('data_balita')->where('nik', $id)->delete();
    }

    public static function getData()
    {
        return DB::table('data_balita')->get();
    }

    public static function getDataById($id)
    {
        return DB::table('data_balita')->where('nik', $id)->first();
    }

    public static function getDataByNIK($nik)
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nik', 'b.nama_balita')
            ->join('data_balita as b', 'b.nik', 'a.nik_balita')
            ->where('a.nik_balita', $nik)
            ->get();
    }

    public static function getDataByNIKBalita($nik)
    {
        return DB::table('data_balita as a')
            ->select('a.*', 'b.*')
            ->leftjoin('data_pengukuran as b', 'b.nik_balita', 'a.nik')
            ->where('a.nik', $nik)
            ->first();
    }

    public static function getDataAdmin()
    {
        return DB::table('data_balita')->where('kode_pos', Auth::user()->kode_pos)->get();
    }
    public static function getDataUser()
    {
        return DB::table('data_balita')->where('no_kk_user', Auth::user()->no_kk)->get();
    }

    public static function getNoKKBalita()
    {
        return DB::table('users')->where('role', 'user')->get();
    }

    public static function getKodePosPosyandu()
    {
        return DB::table('users')->where('role', 'admin')->get();
    }
}
