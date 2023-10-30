<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataUkurModel;
use Illuminate\Support\Facades\Auth;

class DataUkurController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 'super admin') {
            $rs_ukur = DataUkurModel::getData();
        } else if ($role == 'admin') {
            $rs_ukur = DataUkurModel::getDataAdmin();
        } else if ($role == 'user') {
            $rs_ukur = DataUkurModel::getDataUser();
        }

        $data = ['rs_ukur' => $rs_ukur];

        return view('data-balita.pengukuran.index', $data);
    }

    public function add($nik)
    {
        $role = Auth::user()->role;
        if ($role == 'super admin') {
            $user = DataUkurModel::getBalitaData();
        } else if ($role == 'admin') {
            $user = DataUkurModel::getDataKKAdmin();
        } else if ($role == 'user') {
            $user = DataUkurModel::getDataKKUser();
        }

        $data = ['user' => $user, 'role' => $role, 'nik' => $nik];

        return view('data-balita.pengukuran.add', $data);
    }

    public function addProcess(Request $request)
    {
        $this->validate($request, [
            'nik_balita'        => 'required',
            'tgl_ukur'          => 'required',
            'tinggi_badan'      => 'required',
            'berat_badan'       => 'required',
            'lingkar_kepala'    => 'required',
            'lingkar_lengan'    => 'required',
            'foto_balita'       => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $foto = $request->file('foto_balita');

        $nama_file = time() . "_" . $foto->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img/foto';
        $foto->move($tujuan_upload, $nama_file);

        $params = [
            'nik_balita'        => $request->nik_balita,
            'tgl_ukur'          => $request->tgl_ukur,
            'tinggi_badan'      => $request->tinggi_badan,
            'berat_badan'       => $request->berat_badan,
            'lingkar_kepala'    => $request->lingkar_kepala,
            'lingkar_lengan'    => $request->lingkar_lengan,
            'foto_balita'       => $nama_file,
        ];

        $insert = DataUkurModel::insert($params);
        if ($insert) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect()->back();
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-balita/pengukuran/add');
        }
    }

    public function detail($id)
    {
        $data = DataUkurModel::getDataById($id);

        $data = ['data' => $data];

        return view('data-balita.pengukuran.detail', $data);
    }

    public function edit($id)
    {
        $data = DataUkurModel::getDataById($id);

        $role = Auth::user()->role;
        if ($role == 'super admin') {
            $user = DataUkurModel::getBalitaData();
        } else if ($role == 'admin') {
            $user = DataUkurModel::getDataKKAdmin();
        } else if ($role == 'user') {
            $user = DataUkurModel::getDataKKUser();
        }

        $data = [
            'user' => $user,
            'data' => $data,
            'role' => $role
        ];

        return view('data-balita.pengukuran.edit', $data);
    }

    public function editProcess(Request $request)
    {
        // dd($request->file('foto_balita'));

        $this->validate($request, [
            'nik_balita'        => 'required',
            'tgl_ukur'          => 'required',
            'tinggi_badan'      => 'required',
            'berat_badan'       => 'required',
            'lingkar_kepala'    => 'required',
            'lingkar_lengan'    => 'required',
            'foto_balita'       => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_balita')) {
            // menyimpan data file yang diupload ke variabel $file
            $foto = $request->file('foto_balita');

            $nama_file = time() . "_" . $foto->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'img/foto';
            $foto->move($tujuan_upload, $nama_file);
            $params = [
                'nik_balita'        => $request->nik_balita,
                'tgl_ukur'          => $request->tgl_ukur,
                'tinggi_badan'      => $request->tinggi_badan,
                'berat_badan'       => $request->berat_badan,
                'lingkar_kepala'    => $request->lingkar_kepala,
                'lingkar_lengan'    => $request->lingkar_lengan,
                'foto_balita'       => $nama_file,
            ];
        } else {
            $params = [
                'nik_balita'        => $request->nik_balita,
                'tgl_ukur'          => $request->tgl_ukur,
                'tinggi_badan'      => $request->tinggi_badan,
                'berat_badan'       => $request->berat_badan,
                'lingkar_kepala'    => $request->lingkar_kepala,
                'lingkar_lengan'    => $request->lingkar_lengan,
            ];
        }



        $update = DataUkurModel::updateData($request->id, $params);
        if ($update) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect()->back();
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-balita/pengukuran/edit/' . $request->id);
        }
    }

    public function delete($id)
    {
        $delete = DataUkurModel::deleteData($id);
        if ($delete) {
            session()->flash('success', 'Data berhasil dihapus.');
            return redirect()->back();
        } else {
            session()->flash('danger', 'Data gagal dihapus.');
            return redirect('/data-balita/pengukuran');
        }
    }
}
