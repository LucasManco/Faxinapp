<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\JobType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobTypeRequest;
use Illuminate\Support\Facades\Auth;


class JobTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobTypes = JobType::all();
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
        JobType::create($data);

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
        return JobType::findOrFail($id);
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

        return redirect(route('job_type.index'))->with('msg','Endereço atualizado com sucesso');
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

        return redirect(route('job_type.index'))->with('msg','Endereço removido com sucesso');

    }
}

