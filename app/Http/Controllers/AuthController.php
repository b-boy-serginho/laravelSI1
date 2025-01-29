<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
        public function generateToken(Request $request){
            $request->validate([
                'email' => 'required',
                'password' => 'required',
                'device_name' => 'required',
            ]);
            $user =  User::where('email', $request->email)->first();
            if(! $user || !Hash::check($request->password, $user->password) ){
                return response()->json([
                    'message' =>'Credenciales incorrectas',
                    'errors' => [
                        'email' => 'Datos Incorrectos'
                    ]
                ]);
            }
            return $user->createToken($request->device_name)->plainTextToken;
        }

   
}
