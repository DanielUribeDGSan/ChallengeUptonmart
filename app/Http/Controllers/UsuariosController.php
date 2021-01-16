<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Alert;
use DB;

use PDF;


class UsuariosController extends Controller
{
    public function registroUsuario(Request $request)
    {
        $userValidacion = DB::table('users')->where('email', $request->emailText)->first();
        if (is_null($userValidacion)) {
            $user = User::create([
                'name' => $request->nombreUsu,
                'email' => $request->emailUsu,
                'password' => Hash::make($request->passUsu),
                'tipo_usuario' => $request->tipoUsu,
            ]);
            $user->roles()->attach(Role::where('name', 'user')->first());
            alert()->success('Registro realziado correctamente', '');

            return redirect('/home');
        } else {
            alert()->error('Error de registro', 'Ya existe una cuenta con este correo electrónico');
            return redirect('/home');
        }
    }

    public function actualizarUsuario(Request $request)
    {
        if ($request->tipoUsuUpdate === 'admin' && is_null($request->passUsuUpdate)) {
            DB::table('users')
                ->where('id', $request->idUpdateUsuario)
                ->update([
                    'name' => $request->nombreUsuUpdate,
                    'email' => $request->emailUsuUpdate,
                    'tipo_usuario' => $request->tipoUsuUpdate,
                ]);
            DB::table('role_user')
                ->where('user_id', $request->idUpdateUsuario)
                ->update([
                    'role_id' => 1,
                ]);
            alert()->success('Datos actualizados correctamente', '');
        } else if ($request->tipoUsuUpdate === 'admin' && !is_null($request->passUsuUpdate)) {
            DB::table('users')
                ->where('id', $request->idUpdateUsuario)
                ->update([
                    'name' => $request->nombreUsuUpdate,
                    'email' => $request->emailUsuUpdate,
                    'tipo_usuario' => $request->tipoUsuUpdate,
                    'password' => Hash::make($request->passUsuUpdate),
                ]);
            DB::table('role_user')
                ->where('user_id', $request->idUpdateUsuario)
                ->update([
                    'role_id' => 1,
                ]);
            alert()->success('Datos actualizados correctamente', '');
        } else if ($request->tipoUsuUpdate === 'user' && is_null($request->passUsuUpdate)) {
            DB::table('users')
                ->where('id', $request->idUpdateUsuario)
                ->update([
                    'name' => $request->nombreUsuUpdate,
                    'email' => $request->emailUsuUpdate,
                    'tipo_usuario' => $request->tipoUsuUpdate,
                ]);
            DB::table('role_user')
                ->where('user_id', $request->idUpdateUsuario)
                ->update([
                    'role_id' => 2,
                ]);
            alert()->success('Datos actualizados correctamente', '');
        } else if ($request->tipoUsuUpdate === 'user' && !is_null($request->passUsuUpdate)) {
            DB::table('users')
                ->where('id', $request->idUpdateUsuario)
                ->update([
                    'name' => $request->nombreUsuUpdate,
                    'email' => $request->emailUsuUpdate,
                    'tipo_usuario' => $request->tipoUsuUpdate,
                    'password' => Hash::make($request->passUsuUpdate),
                ]);
            DB::table('role_user')
                ->where('user_id', $request->idUpdateUsuario)
                ->update([
                    'role_id' => 2,
                ]);
            alert()->success('Datos actualizados correctamente', '');
        }
        return redirect('/home');
    }
    public function eliminarUsuario(Request $request)
    {
        DB::table('users')->where('id', '=', $request->idDeleteUsuario)->delete();
        alert()->success('Usuario eliminado correctamente', '');

        return redirect('/home');
    }
    public function exportarPdf()
    {
        $idUsuario = Auth::user()->id;
        $nominas = DB::select('select direccion,cuenta,banco,cantidad_bruto,telefono, FORMAT(cantidad_bruto - (10 * cantidad_bruto) / 100, 2) as cantidad_neta from payrolls where user_id = :id', ['id' => $idUsuario]);

        $pdf = PDF::loadView('usuario.nomina-pdf', compact('nominas'));
        return $pdf->download('nomina.pdf');
    }
}