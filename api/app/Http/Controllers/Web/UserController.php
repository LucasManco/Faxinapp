<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class UserController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        return redirect()->route('user.show', ['user' => $id]);

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $employee = Employee::where('user_id', $user->id)->first();
        $categorie_db = json_decode($employee->categories);
        $categories_list =[];
        $categories_list['Diarista'] = false;
        $categories_list['Limpeza de Piscina'] = false;
        $categories_list['Passadeira'] = false;
        $categories_list['Lavadeira'] = false;
        $categories_list['Cozinheira'] = false;
        
        foreach($categorie_db as $categorie){
            $categories_list[$categorie] = true;
        }
        $employee->categorie_list = $categories_list;
        return view('user/edit')->with(['user'=>$user, 'employee' => $employee]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        /**
         * METODO NAO SUPORTADO
         * CRIACAO DE CONTA CRIADA POR MEIO DO MEIO DE CADASTRO DO LARAVEL
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =  User::findOrFail($id);
        $employee = Employee::where('user_id', $user->id)->first();

        return view('user/show')->with(['user' => $user, 'employee' => $employee ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);
        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'cpf' => $request->cpf,
        ];
        
        $user->update($user_data);
        
        $employee = Employee::where('user_id', $user->id)->first();
        if($employee){
            
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/profile'), $imageName);
            
            /**
             * Tratamento Categorias
             */

            $categories_list = [];

            
            if(isset($request['categorie_diarista'])){
                $categories_list[]= "Diarista";
            }
            if(isset($request['categorie_piscina'])){
                $categories_list[]= "Limpeza de Piscina";
            }
            if(isset($request['categorie_passadeira'])){
                $categories_list[]="Passadeira";
            }
            if(isset($request['categorie_lavadeira'])){
                $categories_list[]="Lavadeira";
            }
            if(isset($request['categorie_cozinheira'])){
                $categories_list[]="Cozinheira";
            }

            $employee_data = [
                "transport_value" => $request->transport_value,
                "charge_transport" => isset($request->transport_value) && $request->transport_value > 0,
                "profile_image" => "/images/profile/" . $imageName,
                "categories" => json_encode($categories_list),
                "description" => $request->description,
            ];


            
            $employee->update($employee_data);

        }

        return redirect(route('user.index'))->with('msg','Usuário atualizado com sucesso');
    }
}
