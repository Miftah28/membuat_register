<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'pembeli'){
            return view('home');
        }elseif(auth()->user()->role == 'penjual'){
            return view('home');
        }
        // elseif(auth()->user()->role == 'instance'){
        //     return view('instance.home');
        // }elseif(auth()->user()->role == 'student'){
        //     return view('student.home');
        // }
    }
}
