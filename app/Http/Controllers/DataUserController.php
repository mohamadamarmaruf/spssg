<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DataUserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DataUserController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 'super admin') {
            $rs_user = DataUserModel::getData();
        } else if ($role == 'admin') {
            $rs_user = DataUserModel::getDataAdmin();
        } else if ($role == 'user') {
            $rs_user = DataUserModel::getDataUser();
            $rs_user->no_kk = Crypt::decryptString($rs_user->no_kk);
        }

        // dd($rs_user);
        $rs_balita = DataUserModel::getDataBalita();
        foreach ($rs_balita as $p) {
            if ($p->nik != NULL) {
                $p->nik = Crypt::decryptString($p->nik);
            }
        }
        // $rs_list_user = DataUserModel::getListUserByKodePos();
        // dd($rs_user);
        $data = ['rs_user' => $rs_user, 'role' => $role, 'rs_balita' => $rs_balita];
        return view('data-user.index', $data);
    }

    public function add()
    {
        return view('data-user.add');
    }

    public function addProcess(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required|min:8',
        ]);

        $params = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'no_kk' => Crypt::encryptString($request->no_kk),
            'kode_pos' => $request->kode_pos,
            'nama_posyandu' => $request->nama_posyandu,
            'password' =>  Hash::make($request->password),
        ];

        $insert = DataUserModel::insert($params);
        if ($insert) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-user');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-user/add');
        }
    }

    public function detail($id)
    {

        $user = DataUserModel::getDataById($id);

        if ($user->no_kk != NULL) {
            $user->no_kk = Crypt::decryptString($user->no_kk);
        }


        $data = ['data' => $user];

        return view('data-user.detail', $data);
    }

    public function edit($id)
    {

        $user = DataUserModel::getDataById($id);

        if ($user->no_kk != NULL) {
            $user->no_kk = Crypt::decryptString($user->no_kk);
        }
        $data = ['data' => $user];

        return view('data-user.edit', $data);
    }

    public function editProcess(Request $request)
    {
        $params = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'no_kk' => Crypt::encryptString($request->no_kk),
            'kode_pos' => $request->kode_pos,
            'nama_posyandu' => $request->nama_posyandu,
            'password' =>  Hash::make($request->password),
        ];

        $update = DataUserModel::updateData($request->id, $params);
        if ($update) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-user');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-user/edit/' . $request->id);
        }
    }

    public function delete($id)
    {
        $delete = DataUserModel::deleteData($id);
        if ($delete) {
            session()->flash('success', 'Data berhasil dihapus.');
            return redirect()->back();
        } else {
            session()->flash('danger', 'Data gagal dihapus.');
            return redirect('/data-user');
        }
    }

    public function password($id)
    {

        $user = DataUserModel::getDataById($id);

        $data = ['data' => $user];

        return view('data-user.password', $data);
    }

    public function passwordProcess(Request $request)
    {
        $params = [
            'password' =>  Hash::make($request->password),
        ];

        $update = DataUserModel::updateData($request->id, $params);
        if ($update) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-user');
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-user/password/' . $request->id);
        }
    }
}
