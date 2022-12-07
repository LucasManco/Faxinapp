<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use App\Models\Employee;
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

        if(Auth::user()->default_address_id==null){
            return response(["Definir Endereço"], 404);
        }
        $address =  Address::findOrFail(Auth::user()->default_address_id);    
        return response()->json([$address->street . ', ' . $address->number]);    
    }

    public function addFavorite($id){
        $employee = Employee::findOrFail($id);
        $user = Auth::user();
        $favorites = json_decode($user->favorites);
        $favorites[] = $employee->id;
        $user->favorites = json_encode($favorites);
        $user->save();
        return response()->json("Favorito adicionado com sucesso.",200);
    }
    public function removeFavorite($id){
        $employee = Employee::findOrFail($id);
        $user = Auth::user();
        $favorites = json_decode($user->favorites);
        foreach ($favorites as $key=>$favorite){
            if($favorite == $id){
                unset($favorites[$key]);
            }

        }
        $user->favorites = json_encode($favorites);
        $user->save();
        return response()->json("Favorito removido com sucesso.",200);
    }

    public function getFavorites(){
        
        $user = Auth::user();
        $favorites = json_decode($user->favorites);
        $employees = [];
        foreach($favorites as $favorite){
            $employee = Employee::find($favorite);
            $user = $employee->getUser();
            $employee['name'] = $user->name;
            $employee['avatar'] = 'http://192.168.2.117:8000'.$employee->profile_image;
            $employees[] = $employee;
        }

        return response()->json($employees,200);
    }

    public function getIsFavorited($id){
        
        $employee = Employee::findOrFail($id);
        $user = Auth::user();
        $favorites = json_decode($user->favorites);
        foreach ($favorites as $key=>$favorite){
            if($favorite == $id){
                return response()->json([true],200);
            }

        }
        return response()->json([false],200);
    }
}
