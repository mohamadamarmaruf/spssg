<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DataBalitaModel;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $user = Auth::user();
        $data = [
            'arr_pengukuran_balita'    => DataBalitaModel::totalPengukuranBalita(),
            'arr_pengukuran_balita_stunting'    => DataBalitaModel::totalPengukuranBalitaStunting(),
            'arr_jumlah_balita'    => DataBalitaModel::totalBalita(),
            'user' => $user,
            'role' => $role,
        ];

        // dd($data);
        return view('dashboard.index', $data);
    }
}
