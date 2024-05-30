<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataUkurModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DataUkurController extends Controller
{

    public function add($id)
    {
        $role = Auth::user()->role;
        $data = DataUkurModel::getDataByBalitaId($id);
        // dd($data);

        $data = ['data' => $data, 'id' => $id];

        return view('data-balita.pengukuran.add', $data);
    }

    public function addProcess(Request $request)
    {
        $this->validate($request, [
            'tgl_ukur'          => 'required',
            'age'               => 'required',
            'tinggi_badan'      => 'required',
            'berat_badan'       => 'required',
            'lingkar_kepala'    => 'required',
            'lingkar_lengan'    => 'required',
            'foto_balita'       => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $foto = $request->file('foto_balita');
        if ($foto) {
            $nama_file = time() . "_" . $foto->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'img/foto';
            $foto->move($tujuan_upload, $nama_file);
        }

        $params = [
            'balita_id'         => $request->balita_id,
            'age'               => $request->age,
            'tgl_ukur'          => $request->tgl_ukur,
            'tinggi_badan'      => $request->tinggi_badan,
            'berat_badan'       => $request->berat_badan,
            'lingkar_kepala'    => $request->lingkar_kepala,
            'lingkar_lengan'    => $request->lingkar_lengan,
            'foto_balita'       => isset($nama_file) ? $nama_file : null,
        ];

        $insert = DataUkurModel::insert($params);

        $user = DataUkurModel::getDataByIdPengukuran($insert);

        $apiUrl = 'https://t1t03l3k-api-stunting-2.hf.space/predict';

        // Data to be sent to the API
        $data = [
            "gender" => $user->jenis_kelamin,
            "age" => $user->age,
            "birth_weight" => $user->birth_weight,
            "birth_length" => $user->birth_length,
            "body_weight" => $user->berat_badan,
            "body_length" => $user->tinggi_badan,
            "breastfeeding" => $user->breastfeeding
        ];

        // Make the POST request with JSON data
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($apiUrl, $data);

        // Check if the request was successful (status code 2xx)
        if ($response->successful()) {
            $responseData = $response->json();
            // $probabilityString = $responseData[0];
            $predictionString = $responseData[0];

            // Extract probability value from the string
            // preg_match('/probability : \[\[(.*?)\]\]/', $probabilityString, $probabilityMatches);
            // $probabilityValues = explode(' ', trim($probabilityMatches[1]));

            // $arr1 = floatval($probabilityValues[0]);
            // $arr2 = floatval($probabilityValues[1]);

            // Extract prediction value from the string
            preg_match('/prediction : \[(.*?)\]/', $predictionString, $predictionMatches);
            $predictionValue = (int) $predictionMatches[1];

            // Check the condition
            if ($predictionValue === 0) {
                $stunting = 'Tidak Stunting';
            } elseif ($predictionValue === 1) {
                $stunting = 'Stunting';
            } else {
                $stunting = 'Tidak Diketahui';
            }

            $stunting_params = [
                'stunting' => $stunting,
                // 'left_percentage' => $arr1 * 100,
                // 'right_percentage' => $arr2 * 100,
            ];

            DataUkurModel::updateData($user->id, $stunting_params);
            // dd($stunting_params);
        }

        if ($insert) {

            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-balita/pengukuran/' . $user->balita_id);
        } else {
            session()->flash('danger', 'Data gagal disimpan.');
            return redirect('/data-balita/pengukuran/add/' . $user->balita_id)->withInput();
        }
    }

    public function detail($id)
    {
        $data = DataUkurModel::getDataById($id);
        $data->nik = Crypt::decryptString($data->nik);
        $data = ['data' => $data, 'id' => $id];

        return view('data-balita.pengukuran.detail', $data);
    }

    public function edit($id)
    {
        $data = DataUkurModel::getDataById($id);

        $role = Auth::user()->role;

        $data = [

            'data' => $data,
            'role' => $role
        ];

        return view('data-balita.pengukuran.edit', $data);
    }

    public function editProcess(Request $request)
    {
        // dd($request->file('foto_balita'));

        $this->validate($request, [
            'tgl_ukur'          => 'required',
            'age'               => 'required',
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
                'tgl_ukur'          => $request->tgl_ukur,
                'age'               => $request->age,
                'tinggi_badan'      => $request->tinggi_badan,
                'berat_badan'       => $request->berat_badan,
                'lingkar_kepala'    => $request->lingkar_kepala,
                'lingkar_lengan'    => $request->lingkar_lengan,
                'foto_balita'       => $nama_file,
            ];
        } else {
            $params = [
                'tgl_ukur'          => $request->tgl_ukur,
                'age'               => $request->age,
                'tinggi_badan'      => $request->tinggi_badan,
                'berat_badan'       => $request->berat_badan,
                'lingkar_kepala'    => $request->lingkar_kepala,
                'lingkar_lengan'    => $request->lingkar_lengan,
            ];
        }

        // dd($params);

        $update = DataUkurModel::updateData($request->id, $params);

        // dd($update);
        $user = DataUkurModel::getDataByIdPengukuran($request->id);
        // // dd($user);
        $apiUrl = 'https://t1t03l3k-api-stunting-2.hf.space/predict';

        // Data to be sent to the API
        $data = [
            "gender" => $user->jenis_kelamin,
            "age" => $user->age,
            "birth_weight" => $user->birth_weight,
            "birth_length" => $user->birth_length,
            "body_weight" => $user->berat_badan,
            "body_length" => $user->tinggi_badan,
            "breastfeeding" => $user->breastfeeding
        ];

        // Make the POST request with JSON data
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($apiUrl, $data);

        // Check if the request was successful (status code 2xx)
        if ($response->successful()) {
            $responseData = $response->json();
            // $probabilityString = $responseData[0];
            $predictionString = $responseData[0];

            // Extract probability value from the string
            // preg_match('/probability : \[\[(.*?)\]\]/', $probabilityString, $probabilityMatches);
            // $probabilityValues = explode(' ', trim($probabilityMatches[1]));

            // $arr1 = floatval($probabilityValues[0]);
            // $arr2 = floatval($probabilityValues[1]);

            // Extract prediction value from the string
            preg_match('/prediction : \[(.*?)\]/', $predictionString, $predictionMatches);
            $predictionValue = (int) $predictionMatches[1];

            // Check the condition
            if ($predictionValue === 1) {
                $stunting = 'Tidak Stunting';
            } elseif ($predictionValue === 0) {
                $stunting = 'Stunting';
            } else {
                $stunting = 'Tidak Diketahui';
            }

            $stunting_params = [
                'stunting' => $stunting,
                // 'left_percentage' => $arr1 * 100,
                // 'right_percentage' => $arr2 * 100,
            ];

            DataUkurModel::updateData($user->id, $stunting_params);
            // dd($stunting_params);
        }
        if ($update) {
            session()->flash('success', 'Data berhasil disimpan.');
            return redirect('/data-balita/pengukuran/' . $user->balita_id);
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
