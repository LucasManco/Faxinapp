<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password])){
            $user = Auth::user();
            $token = $user->createToken('JWT');
            return response()->json($token,200);
        }
        return response()->json('Usuario Invalido', 401);    
    }

    public function logout(Request $request)
    {
        if(Auth::user()->currentAccessToken()->delete()){
            return response()->json('Logout realizado com sucesspo.',200);
        }
        return response()->json('Erro ao Processar a Informação', 401);    
    }
   


    public function register(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],   
        ]);

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);

        $user['plainTextToken'] = $user->createToken('JWT')->plainTextToken;

        return response()->json([$user],200);
    }

    public function getDefaultAddress(){

        $address =  Address::findOrFail(Auth::user()->default_address_id);    
        return response()->json([$address->street . ', ' . $address->number]);    
    }
}
