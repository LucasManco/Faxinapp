<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Address;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\WorkPlace;
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
        //dd($employees->first()->belongsTo(User::class,'user_id')->first());
        $employees = [];
        $address = Address::find(Auth::user()->default_address_id);
        if($address){
            $state = Estado::where('sigla', $address->state)->first();
            // dd($state);
            $city = Cidade::where('nome', $address->city)->where('estados_id', $state->id)->first();
            // dd($city);
            $workPlaces = WorkPlace::where('city_id', $city->id)->get();
            // dd($workPlaces);
            foreach ($workPlaces as $workPlace){
                $employee_user = User::find($workPlace->user_id);
                $employee = $employee_user->employee()->first();
                $employees[$employee->id] = $employee;
            }
        }
        else{
            $employees = Employee::all();
        }
        
        
        return view('employee/index')->with(['employees'=> $employees, 'address'=>$address]);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('employee/edit');

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $Employee = Employee::findOrFail($id);
        return view('employee/edit')->with('Employee',$Employee);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        // dd($data);
        $data["charge_transport"] = isset($data->transport_value) && $data->transport_value > 0;
        $data["user_id"] = Auth::user()->id;
        
        /**
         * Tratamento do armazenamento de imagem
         */

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/profile'), $imageName);
        $data["profile_image"] = "/images/profile/" . $imageName;


        /**
         * Tratamento Categorias
         */

        $categories_list = [];

        
        if(isset($data['categorie_diarista'])){
            $categories_list[]= "Diarista";
        }
        if(isset($data['categorie_piscina'])){
            $categories_list[]= "Limpeza de Piscina";
        }
        if(isset($data['categorie_passadeira'])){
            $categories_list[]="Passadeira";
        }
        if(isset($data['categorie_lavadeira'])){
            $categories_list[]="Lavadeira";
        }
        if(isset($data['categorie_cozinheira'])){
            $categories_list[]="Cozinheira";
        }

        $data['categories'] = json_encode($categories_list);

        
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

