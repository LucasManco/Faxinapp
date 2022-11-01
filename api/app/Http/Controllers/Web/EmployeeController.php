<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        //dd($employees->first()->belongsTo(User::class,'user_id')->first());
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        
        return view('employee/index')->with(['employees'=> $employees, 'addresses'=>$addresses]);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('account/employee/edit');

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $Employee = Employee::findOrFail($id);
        return view('account/employee/edit')->with('Employee',$Employee);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();
        $data["charge_transport"] = isset($data->transport_value) && $data->transport_value > 0;
        $data["user_id"] = Auth::user()->id;

        /**
         * Tratamento do armazenamento de imagem
         */

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/profile'), $imageName);
        $data["profile_image"] = "/images/profile" . $imageName;

        Employee::create($data);


        return redirect(route('user.index'))->with('msg','Cadastro de novo parceiro realizado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee/show')->with('employee',$employee);;

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
        $Employee = Employee::findOrFail($id);

        $Employee->update($request->all());

        return redirect(route('Employee.index'))->with('msg','Endereço atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);

        return redirect(route('Employee.index'))->with('msg','Endereço removido com sucesso');

    }
}

