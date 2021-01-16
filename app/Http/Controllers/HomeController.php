<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Payroll;
use DB;
use Illuminate\Support\Facades\Auth;




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
            $idUsuario = Auth::user()->id;
            $nominas = DB::table('payrolls')->get();
            $usuarios = DB::table('users')->get();
            return view('admin.home', compact('nominas', 'usuarios'));
        } else if ($role === 'user') {
            $idUsuario = Auth::user()->id;
            $nominas = DB::select('select direccion,cuenta,banco,cantidad_bruto,telefono, FORMAT(cantidad_bruto - (10 * cantidad_bruto) / 100, 2) as cantidad_neta from payrolls where user_id = :id', ['id' => $idUsuario]);
            return view('usuario.home', compact('nominas'));
        }
    }
}