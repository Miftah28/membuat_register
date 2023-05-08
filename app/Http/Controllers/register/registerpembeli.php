<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembeliRequest;
use App\Http\Requests\UserRequest;
use App\Models\Pembeli;
use App\Models\Penjual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;

class registerpembeli extends Controller
{

    public function index()
    {
        return view('auth.registerpenjual');
    }

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function create(Request $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        $result = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'penjual',
        ]);
        if ($result) {
            Penjual::create([
                'username' => $data['username'],
                'phone' => $data['phone'],
                'alamat' => $data['alamat'],
                'user_id' => $result->id,
            ]);
            return redirect()->route('login');
        } else {
            $user = User::findOrFail($result->id);
            $user->delete();
        }
    }
}
