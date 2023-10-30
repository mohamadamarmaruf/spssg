<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBalitaModel;
use Illuminate\Support\Facades\Auth;

class DataBalitaController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 'super admin') {
            $rs_balita = DataBalitaModel::getData();
        } else if ($role == 'admin') {
            $rs_balita = DataBalitaModel::getDataAdmin();
        } else if ($role == 'user') {
            $rs_balita = DataBalitaModel::getDataUser();
        }


        $data = ['rs_balita' => $rs_balita];
        return view('data-balita.index', $data);
    }

    public function add()
    {
        $user = Auth::user();
        $rs_no_kk = DataBalitaModel::getNoKKBalita();
        $rs_kode_pos = DataBalitaModel::getKodePosPosyandu();

        $data = [
            'user' => $user,
            'rs_no_kk' => $rs_no_kk,
            'rs_kode_pos' => $rs_kode_pos
        ];

        return view('data-balita.add', $data);
    }

    public function addProcess(Request $request)
    {
        $params = [
            'nama_balita' => $request->nama_balita,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'no_kk_user' => $request->no_kk_user,
            'tgl_lahir' => $request->tanggal_lahir,
            'nama_ortu' => $request->nama_ortu,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kode_pos' => $request->kode_pos,
            'jkn_bpjs' => $request->jkn_bpjs,
            'air_bersih' => $request->air_bersih,
            'jamban_sehat' => $request->jamban_sehat,
            'imunisasi' => $request->imunisasi,
            'keluarga_merokok' => $request->keluarga_merokok,
            'kecacingan' => $request->kecacingan,
            'riwayat_kehamilan_ibu' => $request->riwayat_kehamilan_ibu,
        ];

        $insert = DataBalitaModel::insert($params);
        if ($insert) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-balita');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-balita/add');
        }
    }

    public function detail($id)
    {
        $rs_balita = DataBalitaModel::getDataByNIKBalita($id);

        $data = ['data' => $rs_balita];

        return view('data-balita.detail', $data);
    }

    public function edit($id)
    {
        $rs_balita = DataBalitaModel::getDataByNIKBalita($id);
        $user = Auth::user();
        $rs_no_kk = DataBalitaModel::getNoKKBalita();
        $rs_kode_pos = DataBalitaModel::getKodePosPosyandu();

        $data = [
            'data' => $rs_balita,
            'user' => $user,
            'rs_no_kk' => $rs_no_kk,
            'rs_kode_pos' => $rs_kode_pos
        ];

        return view('data-balita.edit', $data);
    }

    public function editProcess(Request $request)
    {
        $params = [
            'nama_balita' => $request->nama_balita,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'no_kk_user' => $request->no_kk_user,
            'tgl_lahir' => $request->tanggal_lahir,
            'nama_ortu' => $request->nama_ortu,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kode_pos' => $request->kode_pos,
            'jkn_bpjs' => $request->jkn_bpjs,
            'air_bersih' => $request->air_bersih,
            'jamban_sehat' => $request->jamban_sehat,
            'imunisasi' => $request->imunisasi,
            'keluarga_merokok' => $request->keluarga_merokok,
            'kecacingan' => $request->kecacingan,
            'riwayat_kehamilan_ibu' => $request->riwayat_kehamilan_ibu,
        ];

        $update = DataBalitaModel::updateData($request->nik, $params);
        if ($update) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect()->back();
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-balita/edit/' . $request->nik);
        }
    }

    public function delete($id)
    {
        $delete = DataBalitaModel::deleteData($id);
        if ($delete) {
            session()->flash('success', 'Data berhasil dihapus.');
            return redirect('/data-balita');
        } else {
            session()->flash('danger', 'Data gagal dihapus.');
            return redirect('/data-balita');
        }
    }

    public function pengukuran($nik)
    {
        $rs_ukur = DataBalitaModel::getDataByNIK($nik);

        $data = ['rs_ukur' => $rs_ukur, 'nik' => $nik];

        return view('data-balita.pengukuran', $data);
    }
}
