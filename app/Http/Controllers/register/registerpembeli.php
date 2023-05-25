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

    public function create(Request $data)
    {
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
