<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataUserModel extends Model
{
    public static function insert($params)
    {
        return DB::table('users')->insert($params);
    }

    public static function getData()
    {
        return DB::table('users')->get();
    }
    public static function getDataAdmin()
    {
        return DB::table('users')->where('kode_pos', Auth::user()->kode_pos)->first();
    }

    public static function getDataUser()
    {
        return DB::table('users')->where('no_kk', Auth::user()->no_kk)->first();
    }

    public static function getDataBalita()
    {
        return DB::table('data_balita')->where('user_id', Auth::user()->id)->get();
    }

    public static function getDataById($id)
    {
        return DB::table('users')->where('id', $id)->first();
    }

    public static function updateData($id, $params)
    {
        return DB::table('users')->where('id', $id)->update($params);
    }

    public static function deleteData($id)
    {
        return DB::table('users')->where('id', $id)->delete();
    }
}
