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
        return view('user/edit')->with('user',$user);;

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
        //$user->isEmployee = $user->isEmployee();

        return view('user/show')->with('user',$user);
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
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect(route('user.index'))->with('msg','Usuário atualizado com sucesso');
    }

}
