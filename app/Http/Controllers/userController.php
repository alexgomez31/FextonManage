<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{
    public function actualizarperfil(Request $request)
    {
        // $idUsuario = $request->input('id');
        // $name= $request->input('name');
        // $email = $request->input('email');
        // $password = $request->input('password');

        // $rta = User::where('id', $idUsuario)->update([
        //     'name' => $name,
        //     'email' => $email,
        //     'password' => isset($password) ? Hash::make($password) : User::find($idUsuario)->password,
        //     'updated_at' => Carbon::now(),
        // ]);


        // $rta->save();

        // @dd($rta);

        // if ($rta->save()) {
        //     // Redirigir de vuelta a la página de edición del perfil con un mensaje de éxito
        //     return redirect()->route('profile.edit')->with('status', '¡Perfil actualizado correctamente!');
        // } else {
        //     // Imprimir los datos y errores si la actualización falla
        //     @dd($rta);
        // }

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

            // Redirigir de vuelta a la página de edición del perfil con un mensaje de éxito
            return redirect()->route('profile.edit')->with('status', '¡Perfil actualizado correctamente!');
        } else {
            // Imprimir un mensaje de error si el usuario no existe
            return redirect()->route('profile.edit')->with('status', 'El usuario no existe');
        }


    }
}
