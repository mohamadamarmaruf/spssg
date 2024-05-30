<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEdukasiModel;
use Illuminate\Support\Facades\Auth;

class DataEdukasiController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 'super admin') {
            $rs_edu = DataEdukasiModel::getData();
        } else if ($role == 'admin') {
            $rs_edu = DataEdukasiModel::getDataAdmin();
        } else if ($role == 'user') {
            $rs_edu = DataEdukasiModel::getDataUser();
        }

        $data = ['rs_edu' => $rs_edu, 'role' => $role];

        return view('data-edukasi.index', $data);
    }

    public function add()
    {
        $rs_user = DataEdukasiModel::getBalitaData();
        $rs_pengukuran = DataEdukasiModel::getPengukuranData();

        $data = ['rs_user' => $rs_user, 'rs_pengukuran' => $rs_pengukuran];

        return view('data-edukasi.add', $data);
    }

    public function addProcess(Request $request)
    {
        $params = [
            'balita_id' => $request->balita_id,
            'bulan_ukur' => $request->bulan_ukur,
            'pesan' => $request->pesan,

        ];

        $insert = DataEdukasiModel::insert($params);
        if ($insert) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-edukasi');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-edukasi/add');
        }
    }

    public function edit($id)
    {
        $rs_user = DataEdukasiModel::getBalitaData();
        $rs_pengukuran = DataEdukasiModel::getPengukuranData();
        $edukasi = DataEdukasiModel::getDataById($id);
        // dd($edukasi);
        $data = ['rs_user' => $rs_user, 'rs_pengukuran' => $rs_pengukuran, 'edukasi' => $edukasi];

        return view('data-edukasi.edit', $data);
    }

    public function editProcess(Request $request)
    {
        $params = [
            'balita_id' => $request->balita_id,
            'bulan_ukur' => $request->bulan_ukur,
            'pesan' => $request->pesan,

        ];

        $update = DataEdukasiModel::updateData($request->id, $params);
        if ($update) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-edukasi');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-edukasi/edit/' . $request->id);
        }
    }

    public function delete($id)
    {
        $delete = DataEdukasiModel::deleteData($id);

        if ($delete) {
            session()->flash('success', 'Data berhasil dihapus.');
            return redirect('/data-edukasi');
        } else {
            session()->flash('danger', 'Data gagal dihapus.');
            return redirect('/data-edukasi');
        }
    }
}
