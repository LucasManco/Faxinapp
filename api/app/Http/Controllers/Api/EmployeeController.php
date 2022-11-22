<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Address;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\WorkPlace;
use App\Models\WorkDay;
use App\Http\Controllers\Controller;
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
        $employees = [];
        $address = Address::find(Auth::user()->default_address_id);
        // $address = null;
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
                $employees[] = $employee;
                $employee['name'] = $employee_user->name;
                $employee['avatar'] = 'http://192.168.2.117:8000'.$employee->profile_image;
            }
        }
        else{
            $employees = Employee::all();
            foreach ($employees as $employee){
                $user = $employee->getUser();
                $employee['name'] = $user->name;
                $employee['avatar'] = 'http://192.168.2.117:8000'.$employee->profile_image;
            }
        }


        return $employees;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'charge_transport'=> 'required|boolean',
            'transport_value' => 'required|numeric',
            'user_id' => 'required|exists:users'
        ]);

        return Employee::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::findOrFail($id);
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
        $job_type = Employee::findOrFail($id);

        $job_type->update($request->all());

        return $job_type;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Employee::destroy($id);
    }

    /**
     * Return a List of JobTypes from a Employee
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function JobTypeList($id)
    {
        $job_type = Employee::find($id)->getUser()->jobType()->get();

        return $job_type;
    }
    
    /**
     * Return the avaliable hour in the next week agenda
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Agenda($id)
    {
        $job_type = User::find($id)->jobType()->first();
        
        if($job_type){
            $AvaliableDays = WorkDay::getAvaliableDaysApi($job_type->user_id);
        }
        else{
            return 'Usuario não encontrado';
        }
        

        return $AvaliableDays;
    }
}

