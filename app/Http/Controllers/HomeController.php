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
    public function index(Request $request)
    {
        $role = $request->user()->authorizeRoles(['user', 'admin']);
        if ($role === 'admin') {
            return view('web.home');
        } else if ($role === 'user') {
            return view('web.home');
        }
    }
}