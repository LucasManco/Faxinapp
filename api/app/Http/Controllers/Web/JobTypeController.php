<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\JobType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobTypeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkDay;


class JobTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobTypes = JobType::where('user_id', Auth::user()->id)->get();
        return view('account/job_type/index')->with('JobTypes',$JobTypes);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('account/job_type/edit');

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $JobType = JobType::where('user_id', Auth::user()->id)->get();
        return view('account/job_type/edit')->with('JobType',$JobType);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobTypeRequest $request)
    {
        $data = $request->validated();
        $data['user_id']= Auth::user()->id;
        $data['price'] = str_replace(',', '.', $data['price']);
        
        JobType::create($data);


        return redirect(route('user.index'))->with('msg','Cadastro de novo tipo de serviço realizado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $JobType = JobType::find($id);
        $AvaliableDays = WorkDay::getAvaliableDays($JobType->user_id);
        return view('job_type/show')->with(['JobType'=>$JobType,'AvaliableDays'=>$AvaliableDays]);
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
        $JobType = JobType::findOrFail($id);

        $JobType->update($request->all());

        return redirect(route('job_type.index'))->with('msg','Tipo de serviço atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobType::destroy($id);

        return redirect(route('job_type.index'))->with('msg','Tipo de serviço removido com sucesso');

    }
}

