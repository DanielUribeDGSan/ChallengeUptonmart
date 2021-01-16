<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Alert;
use DB;

class WebController extends Controller
{
    public function inicio()
    {
        return view('web.home');
    }

    public function registroUsuario(Request $request)
    {
        $userValidacion = DB::table('users')->where('email', $request->emailText)->first();
        if (is_null($userValidacion)) {
            $user = User::create([
                'name' => $request->nameText,
                'email' => $request->emailText,
                'password' => Hash::make($request->passwordText),
                'tipo_usuario' => 'user',
            ]);
            $user->roles()->attach(Role::where('name', 'user')->first());
            alert()->success('Registro realziado correctamente', 'Gracias por confiar en nosotros');
            Auth::login($user);
            return redirect('/home');
        } else {
            alert()->error('Error de registro', 'Ya existe una cuenta con este correo electrónico');
            return redirect('/');
        }
    }
}