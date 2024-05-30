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
        return DB::table('data_balita')->where('id', $id)->update($params);
    }
    public static function deleteData($id)
    {
        return DB::table('data_balita')->where('id', $id)->delete();
    }

    public static function getData()
    {
        return DB::table('data_balita')->get();
    }

    public static function getDataById($id)
    {
        return DB::table('data_balita')->where('id', $id)->first();
    }

    public static function getDataByNIK($nik)
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nik', 'b.nama_balita')
            ->join('data_balita as b', 'b.nik', 'a.nik_balita')
            ->where('a.nik_balita', $nik)
            ->get();
    }

    public static function getDataDetailById($id)
    {
        return DB::table('data_balita as a')
            ->select('a.*', 'b.tgl_ukur', 'c.no_kk')
            ->join('users as c', 'c.id', 'a.user_id')
            ->leftjoin('data_pengukuran as b', 'b.balita_id', 'a.id')
            ->where('a.id', $id)
            ->first();
    }

    public static function getDataPengukuranById($id)
    {
        return DB::table('data_pengukuran as a')
            ->select('a.*', 'b.nama_balita', 'b.nik')
            ->leftJoin('data_balita as b', 'b.id', 'a.balita_id')
            ->where('a.balita_id', $id)
            ->get();
    }
    public static function getDataAdmin()
    {
        return DB::table('data_balita as a')
            ->select('a.*', 'b.no_kk')
            ->join('users as b', 'b.id', 'a.user_id')
            ->where('a.kode_pos', Auth::user()->kode_pos)
            ->get();
    }
    public static function getDataUser()
    {
        return DB::table('data_balita as a')
            ->select('a.*', 'b.no_kk')
            ->join('users as b', 'b.id', 'a.user_id')
            ->where('a.user_id', Auth::user()->id)
            ->get();
    }

    public static function getNoKKBalita()
    {
        return DB::table('users')->where('role', 'user')->get();
    }

    public static function getKodePosPosyandu()
    {
        return DB::table('users')->where('role', 'admin')->get();
    }

    public static function getByNIK($nik)
    {
        return DB::table('data_balita')->where('nik', $nik)->first();
    }

    public static function totalPengukuranBalita()
    {
        $rs_posyandu = DataBalitaModel::getTolakUkurBalita();

        // list bulan
        $rs_bulan = DataBalitaModel::bulanIndo();

        // hitung nilai min, max, median, average
        $final_data = [];
        foreach ($rs_bulan as $key => $value) {
            // Assuming $rs_posyandu is an array, you can access its value like this
            // array_push($final_data, round(floatval($rs_posyandu[$value])));
            if (array_key_exists('jumlah_balita', $final_data)) {
                // jika sudah ada
                array_push($final_data['jumlah_balita'], round(floatval($rs_posyandu[$value]), 2));
            } else {
                // jika belum ada
                $final_data['jumlah_balita'] = [
                    round(floatval($rs_posyandu[$value]), 2)
                ];
            }
        }

        return $final_data;
    }

    public static function totalPengukuranBalitaStunting()
    {
        $rs_posyandu = DataBalitaModel::getTolakUkurBalitaStunting();

        // list bulan
        $rs_bulan = DataBalitaModel::bulanIndo();

        // hitung nilai min, max, median, average
        $final_data = [];
        foreach ($rs_bulan as $key => $value) {
            // Assuming $rs_posyandu is an array, you can access its value like this
            // array_push($final_data, round(floatval($rs_posyandu[$value])));
            if (array_key_exists('jumlah_balita', $final_data)) {
                // jika sudah ada
                array_push($final_data['jumlah_balita'], round(floatval($rs_posyandu[$value]), 2));
            } else {
                // jika belum ada
                $final_data['jumlah_balita'] = [
                    round(floatval($rs_posyandu[$value]), 2)
                ];
            }
        }

        return $final_data;
    }

    public static function bulanIndo()
    {
        return array('01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
    }

    public static function getTolakUkurBalita()
    {
        $rs_posyandu           = DataBalitaModel::getPosyandu();
        $rs_bulan           = DataBalitaModel::bulanIndo();
        $rs_pengukuran_posyandu    = $rs_posyandu->each(function ($item, $key) use ($rs_bulan) {
            $rs_total       = DataBalitaModel::totalUkurBalitaEachMonth($item->id, date('Y'));
            foreach ($rs_bulan as $index => $value) {

                if ($rs_total[$index] > 0) {
                    $item->{$value} = ($rs_total[$index]);
                } else {
                    $item->{$value} = 0;
                }

                $averageScores[$value] = $item->{$value};
            }

            // Add the averageScores array to the branch item
            $item->averageScores = $averageScores;
            // return the updated item
            return $item;
        });

        // Calculate the overall average for each month
        $overallAverage = [];
        foreach ($rs_bulan as $value) {
            $sum = 0;
            foreach ($rs_pengukuran_posyandu as $branch) {
                $sum += $branch->averageScores[$value];
            }
            $overallAverage[$value] = $sum > 0 ? ($sum) : 0;
        }
        // dd($overallAverage);
        return $overallAverage;
    }

    public static function getTolakUkurBalitaStunting()
    {
        $rs_posyandu           = DataBalitaModel::getPosyandu();
        $rs_bulan              = DataBalitaModel::bulanIndo();
        $rs_pengukuran_posyandu    = $rs_posyandu->each(function ($item, $key) use ($rs_bulan) {
            $rs_total       = DataBalitaModel::totalUkurBalitaStuntingEachMonth($item->id, date('Y'));
            foreach ($rs_bulan as $index => $value) {

                if ($rs_total[$index] > 0) {
                    $item->{$value} = ($rs_total[$index]);
                } else {
                    $item->{$value} = 0;
                }

                $averageScores[$value] = $item->{$value};
            }

            // Add the averageScores array to the branch item
            $item->averageScores = $averageScores;
            // return the updated item
            return $item;
        });

        // Calculate the overall average for each month
        $overallAverage = [];
        foreach ($rs_bulan as $value) {
            $sum = 0;
            foreach ($rs_pengukuran_posyandu as $branch) {
                $sum += $branch->averageScores[$value];
            }
            $overallAverage[$value] = $sum > 0 ? ($sum) : 0;
        }
        // dd($overallAverage);
        return $overallAverage;
    }

    public static function getPosyandu()
    {
        return DB::table('data_balita as a')
            ->select('b.*', 'a.id as balita_id')
            ->join('users as b', 'b.kode_pos', 'a.kode_pos')
            ->where('b.id', Auth::user()->id)
            ->get();
    }

    public static function TotalUkurBalitaEachMonth($balita_id, $year)
    {
        $rs_bulan = parent::bulanIndo();

        $data = [];
        foreach ($rs_bulan as $key => $value) {
            $data[$key] = DB::table('data_pengukuran as a')
                ->join('data_balita as b', 'a.balita_id', '=', 'b.id')
                ->where('a.balita_id', $balita_id)
                ->whereMonth('a.tgl_ukur', $key)
                ->whereYear('a.tgl_ukur', $year)
                ->count('a.id');
        }

        return $data;
    }

    public static function TotalUkurBalitaStuntingEachMonth($balita_id, $year)
    {
        $rs_bulan = parent::bulanIndo();

        $data = [];
        foreach ($rs_bulan as $key => $value) {
            $data[$key] = DB::table('data_pengukuran as a')
                ->join('data_balita as b', 'a.balita_id', '=', 'b.id')
                ->where('a.balita_id', $balita_id)
                ->whereMonth('a.tgl_ukur', $key)
                ->whereYear('a.tgl_ukur', $year)
                ->where('a.stunting', 'Stunting')
                ->count('a.id');
        }

        return $data;
    }

    public static function totalBalita()
    {
        $rs_posyandu = DataBalitaModel::getTotalBalita();

        // list bulan
        $rs_bulan = DataBalitaModel::bulanIndo();

        // hitung nilai min, max, median, average
        $final_data = [];
        foreach ($rs_bulan as $key => $value) {
            // Assuming $rs_posyandu is an array, you can access its value like this
            // array_push($final_data, round(floatval($rs_posyandu[$value])));
            if (array_key_exists('jumlah_balita', $final_data)) {
                // jika sudah ada
                array_push($final_data['jumlah_balita'], round(floatval($rs_posyandu[$value]), 2));
            } else {
                // jika belum ada
                $final_data['jumlah_balita'] = [
                    round(floatval($rs_posyandu[$value]), 2)
                ];
            }
        }

        return $final_data;
    }


    public static function getTotalBalita()
    {
        $rs_posyandu           = DataBalitaModel::getPosyandu();
        // dd($rs_posyandu);
        $rs_bulan           = DataBalitaModel::bulanIndo();
        $rs_pengukuran_posyandu    = $rs_posyandu->each(function ($item, $key) use ($rs_bulan) {
            $rs_total       = DataBalitaModel::totalBalitaEachMonth($item->balita_id, date('Y'));
            // dd($rs_total);
            foreach ($rs_bulan as $index => $value) {

                if ($rs_total[$index] > 0) {
                    $item->{$value} = ($rs_total[$index]);
                } else {
                    $item->{$value} = 0;
                }

                $averageScores[$value] = $item->{$value};
            }

            // Add the averageScores array to the branch item
            $item->averageScores = $averageScores;
            // return the updated item
            return $item;
        });

        // Calculate the overall average for each month
        $overallAverage = [];
        foreach ($rs_bulan as $value) {
            $sum = 0;
            foreach ($rs_pengukuran_posyandu as $branch) {
                $sum += $branch->averageScores[$value];
            }
            $overallAverage[$value] = $sum > 0 ? ($sum) : 0;
        }
        // dd($overallAverage);
        return $overallAverage;
    }

    public static function TotalBalitaEachMonth($balita_id, $year)
    {
        $rs_bulan = parent::bulanIndo();

        $data = [];
        foreach ($rs_bulan as $key => $value) {
            $data[$key] = DB::table('data_balita as a')
                ->where('a.id', $balita_id)
                ->whereMonth('a.created_at', $key)
                ->whereYear('a.created_at', $year)
                ->count('a.id');
        }

        return ($data);
    }
}
