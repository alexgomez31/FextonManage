<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class userController extends Controller
{
    public function actualizarperfil(Request $request)
{
    $idUsuario = $request->input('id');
    $primerNombre = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');

    $usuario = User::find($idUsuario);

    if ($usuario) {
        $usuario->name = $primerNombre;
        $usuario->email = $email;

        if(isset($password)) {
            $usuario->password = Hash::make($password);
        }

        $usuario->updated_at = Carbon::now();

        $usuario->save();

        Session::flash('success', 'Perfil actualizado exitosamente.');
        return redirect()->route('dashboard');
    } else {
        // Imprimir un mensaje de error si el usuario no existe
        return redirect()->back()->with('error', 'El usuario no existe');
    }
}
}
