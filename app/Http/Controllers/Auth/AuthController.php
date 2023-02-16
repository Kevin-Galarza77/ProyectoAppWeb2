<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{

    public function login(Request $request)
    {

        $alert = 'No se pudo iniciar sesion, intenta nuevamente';
        $status = false;
        $data = [];
        $messages = [];
        $auth = false;

        $validator = $this->validateLogin($request->all());

        if ($validator['status'] == false) {

            $messages = $validator['messages'];
        } else {

            $request->validate([
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
            ]);

            $user = User::with('usuario')->where('email', $request['email'])->first();
            // Valida lo siguiente
            // * Si no existe un usuario
            // * Si no es el mismo password
            if (!$user || !Hash::check($request['password'], $user->password)) {

                $alert = 'Correo o contraseña incorrectos.';
                
            } else {
                // Valida lo siguiente
                // * Si el token de usurio no es vacío
                
                if (!$user->tokens->isEmpty()) {

                    $alert = 'El usuario ya se encuentra autenticado';
                    $auth = true;

                } else {

                    $token  = $user->createToken('auth-token')->plainTextToken;
                    $status = true;
                    $alert  = 'Inicio de sesión exitoso!';
                    $data   = $user;
                }
            }
        }

        return [
            'alert'     =>  $alert,
            'messages'  =>  $messages,
            'status'    =>  $status,
            'auth'      =>  $auth,
            'data'      =>  $data,
            'token'     =>  $token
        ];
    }

    public function logout(Request $request)
    {
        $alert   = 'Se ha cerrado sesion correctamente!';
        $messege = '';
        $status  = false;
        
        try{

            $request->user()->tokens()->delete();
            $status=true;
            
        }catch(\Exception $e){

            $alert = 'Ha ocurrido un error con el Token';
            $messege = $e;

        }

        return [
            'status'    => $status,
            'alert'     => $alert,
            'messeges'  => $messege,
        ];

    }

    public function validateLogin($data)
    {
        $status = true;
        $messages = [
            'email.required'                    =>  'El email es requerido.',
            'email.email'                       =>  'El correo electrónico debe estar escrito en un formato correcto',
            'password.required'                 =>  'La contraseña es requerida.',
        ];

        $validate = [
            'email'                   =>  'required|email',
            'password'                =>  'required',
        ];

        $validator = Validator::make($data, $validate, $messages);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $status = false;
        }

        return [
            'messages'   =>  $messages,
            'status'     =>  $status
        ];
    }

}
