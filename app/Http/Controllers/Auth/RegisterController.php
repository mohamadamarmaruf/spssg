<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'no_kk' => ['required', 'string', 'max:255', 'unique:users'], // Check for uniqueness
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        // $old_no_kk = DB::table('users')->where('no_kk', $data['no_kk'])->first();
        // if (!empty($old_no_kk)) {
        //     // Flash a danger message
        //     session()->flash('danger', 'No KK sudah digunakan.');
        //     return User::where('no_kk', $data['no_kk'])->first(); // Return the existing user with the same No KK
        // }

        // Create a new user
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'no_kk' => Crypt::encryptString($data['no_kk']),
        ]);

        if ($user) {
            // Flash a success message
            session()->flash('success', 'Data berhasil disimpan.');
        } else {
            // Flash a danger message
            session()->flash('danger', 'Data gagal dimasukkan.');
        }

        return $user; // Return the user object
    }
}
