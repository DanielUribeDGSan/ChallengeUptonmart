<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Payroll;
use DB;
use Illuminate\Support\Facades\Auth;

class NominaController extends Controller
{
    public function registroNomina(Request $request)
    {
        $user = Payroll::create([
            'direccion' => $request->direccion,
            'cuenta' => $request->cuenta,
            'banco' => $request->banco,
            'cantidad_bruto' => $request->cantidad_bruto,
            'telefono' => $request->telefono,
            'user_id' => $request->idUsuario,
        ]);
        alert()->success('Datos registrados correctamente', '');

        return redirect('/home');
    }

    public function actualizarNomina(Request $request)
    {
        DB::table('payrolls')
            ->where('id', $request->idUpdateNomina)
            ->update([
                'direccion' => $request->direccionUpdate,
                'cuenta' => $request->cuentaUpdate,
                'banco' => $request->bancoUpdate,
                'cantidad_bruto' => $request->cantidad_brutoUpdate,
                'telefono' => $request->telefonoUpdate,
            ]);

        alert()->success('Datos actualizados correctamente', '');

        return redirect('/home');
    }
    public function eliminarNomina(Request $request)
    {

        DB::table('payrolls')->where('id', '=', $request->idDeleteNomina)->delete();


        alert()->success('Nómina eliminada correctamente', '');

        return redirect('/home');
    }
}