<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBalitaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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

        foreach ($rs_balita as $p) {
            if ($p->nik != NULL) {
                $p->nik = Crypt::decryptString($p->nik);
            }
        }

        $data = ['rs_balita' => $rs_balita];
        return view('data-balita.index', $data);
    }

    public function add()
    {
        $user = Auth::user();
        $rs_no_kk = DataBalitaModel::getNoKKBalita();

        foreach ($rs_no_kk as $p) {
            if ($p->no_kk != NULL) {
                $p->no_kk = Crypt::decryptString($p->no_kk);
            }
        }

        $data = [
            'user' => $user,
            'rs_no_kk' => $rs_no_kk,
        ];

        return view('data-balita.add', $data);
    }

    public function addProcess(Request $request)
    {
        $user = Auth::user();

        $nik = DataBalitaModel::getByNIK(Crypt::encryptString($request->nik));

        if (!empty($nik)) {
            // flash message
            session()->flash('danger', 'NIK sudah digunakan.');
            return redirect('/data-balita/add')->withInput();
        }

        if ($user->role == 'user') {
            $params = [
                'nama_balita'       => $request->nama_balita,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'nik'               => Crypt::encryptString($request->nik),
                'user_id'           => Auth::user()->id,
                'tgl_lahir'         => $request->tanggal_lahir,
                'birth_length'      => $request->birth_length,
                'birth_weight'      => $request->birth_weight,
                'breastfeeding'     => $request->breastfeeding,
                'nama_ortu'         => $request->nama_ortu,
                'kecamatan'         => $request->kecamatan,
                'desa'              => $request->desa,
                'rt'                => $request->rt,
                'rw'                => $request->rw,
                'kode_pos'          => $request->kode_pos,
                'jkn_bpjs'          => $request->jkn_bpjs,
                'air_bersih'        => $request->air_bersih,
                'jamban_sehat'      => $request->jamban_sehat,
                'imunisasi'         => $request->imunisasi,
                'keluarga_merokok'  => $request->keluarga_merokok,
                'kecacingan'        => $request->kecacingan,
                'riwayat_kehamilan_ibu' => $request->riwayat_kehamilan_ibu,
                'created_at'        => date('Y-m-d H:i:s')
            ];
        } else {
            $params = [
                'nama_balita'       => $request->nama_balita,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'nik'               => Crypt::encryptString($request->nik),
                'user_id'           => $request->user_id,
                'tgl_lahir'         => $request->tanggal_lahir,
                'birth_length'      => $request->birth_length,
                'birth_weight'      => $request->birth_weight,
                'breastfeeding'     => $request->breastfeeding,
                'nama_ortu'         => $request->nama_ortu,
                'kecamatan'         => $request->kecamatan,
                'desa'              => $request->desa,
                'rt'                => $request->rt,
                'rw'                => $request->rw,
                'kode_pos'          => $request->kode_pos,
                'jkn_bpjs'          => $request->jkn_bpjs,
                'air_bersih'        => $request->air_bersih,
                'jamban_sehat'      => $request->jamban_sehat,
                'imunisasi'         => $request->imunisasi,
                'keluarga_merokok'  => $request->keluarga_merokok,
                'kecacingan'        => $request->kecacingan,
                'riwayat_kehamilan_ibu' => $request->riwayat_kehamilan_ibu,
                'created_at'        => date('Y-m-d H:i:s')
            ];
        }

        $insert = DataBalitaModel::insert($params);
        if ($insert) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-balita');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-balita/add')->withInput();
        }
    }

    public function detail($id)
    {
        $rs_balita = DataBalitaModel::getDataDetailById($id);
        $rs_balita->no_kk = Crypt::decryptString($rs_balita->no_kk);
        $rs_balita->nik = Crypt::decryptString($rs_balita->nik);
        $data = ['data' => $rs_balita];

        return view('data-balita.detail', $data);
    }

    public function edit($id)
    {
        $rs_balita = DataBalitaModel::getDataDetailById($id);
        $user = Auth::user();
        $rs_no_kk = DataBalitaModel::getNoKKBalita();

        foreach ($rs_no_kk as $p) {
            if ($p->no_kk != NULL) {
                $p->no_kk = Crypt::decryptString($p->no_kk);
            }
        }

        $rs_balita->nik = Crypt::decryptString($rs_balita->nik);
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
        // dd($request);
        $user = Auth::user();

        if ($user->role == 'user') {
            $params = [
                'nama_balita' => $request->nama_balita,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nik' => Crypt::encryptString($request->nik),
                'user_id' => Auth::user()->id,
                'tgl_lahir' => $request->tanggal_lahir,
                'birth_length' => $request->birth_length,
                'birth_weight' => $request->birth_weight,
                'breastfeeding' => $request->breastfeeding,
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
        } else {
            $params = [
                'nama_balita' => $request->nama_balita,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nik' => Crypt::encryptString($request->nik),
                'user_id' => $request->user_id,
                'tgl_lahir' => $request->tanggal_lahir,
                'birth_length' => $request->birth_length,
                'birth_weight' => $request->birth_weight,
                'breastfeeding' => $request->breastfeeding,
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
        }

        $update = DataBalitaModel::updateData($request->id, $params);
        if ($update) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-balita');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-balita/edit/' . $request->id)->withInput();
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

    public function pengukuran($id)
    {
        $role = Auth::user()->role;
        $rs_ukur = DataBalitaModel::getDataPengukuranById($id);
        foreach ($rs_ukur as $p) {
            if ($p->nik != NULL) {
                $p->nik = Crypt::decryptString($p->nik);
            }
        }
        $data = ['rs_ukur' => $rs_ukur, 'id' => $id, 'role' => $role];

        return view('data-balita.pengukuran.index', $data);
    }
}
