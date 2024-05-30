<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataUkurModel extends Model
{
    public static function getBalitaData()
    {
        return DB::table('data_balita')->get();
    }

    public static function getData()
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nik', 'b.nama_balita')
            ->join('data_balita as b', 'b.nik', 'a.nik_balita')
            ->get();
    }

    public static function getDataAdmin()
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nik', 'b.nama_balita')
            ->join('data_balita as b', 'b.nik', 'a.nik_balita')
            ->where('b.kode_pos', Auth::user()->kode_pos)
            ->get();
    }

    public static function getDataUser()
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nik', 'b.nama_balita')
            ->join('data_balita as b', 'b.id', 'a.balita_id')
            ->where('b.user_id', Auth::user()->id)
            ->get();
    }

    public static function getDataKKAdmin()
    {
        return DB::table('data_balita')->where('kode_pos', Auth::user()->kode_pos)->get();
    }
    public static function getDataKKUser()
    {
        return DB::table('data_balita')->where('no_kk_user', Auth::user()->no_kk)->get();
    }

    public static function getDataById($id)
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nik', 'b.nama_balita')
            ->join('data_balita as b', 'b.id', 'a.balita_id')
            ->where('a.id', $id)
            ->first();
    }
    public static function getDataByBalitaId($id)
    {
        return DB::table('data_balita as b')
            ->where('b.id', $id)
            ->first();
    }

    public static function getDataByIdPengukuran($id)
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nik', 'b.nama_balita', 'b.jenis_kelamin', 'b.birth_weight', 'b.birth_length', 'b.breastfeeding')
            ->join('data_balita as b', 'b.id', 'a.balita_id')
            ->where('a.id', $id)
            ->first();
    }

    public static function insert($params)
    {
        if (DB::table('data_pengukuran')->insert($params)) {
            return DB::getPdo()->lastInsertId();
        } else {
            return '';
        }
    }

    public static function updateData($id, $params)
    {

        return DB::table('data_pengukuran')->where('id', $id)->update($params);
    }

    public static function deleteData($id)
    {
        return DB::table('data_pengukuran')->where('id', $id)->delete();
    }
}
