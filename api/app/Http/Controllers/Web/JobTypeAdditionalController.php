<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\JobType;
use App\Models\JobTypeAdditional;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobTypeAdditionalRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkDay;


class JobTypeAdditionalController extends Controller
{
    //  /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $JobTypes = JobTypeAdditional::where('user_id', Auth::user()->id)->get();
    //     return view('job_type_additional/index')->with('JobTypeAdditionals',$JobTypeAdditionals);

    // }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $id = explode('/', url()->previous());
        $id = end($id);
        // dd($id);
        $JobType = JobType::find($id);
        return view('job_type_additional/edit')->with('JobType',$JobType);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $JobTypeAdditional = JobTypeAdditional::find($id);
        $JobType = JobType::find($JobTypeAdditional->job_type_id);
        // dd($JobTypeAdditional);
        return view('job_type_additional/edit')->with(['JobTypeAdditional'=>$JobTypeAdditional, 'JobType' => $JobType]);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobTypeAdditionalRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $data['user_id']= Auth::user()->id;
        $data['price'] = str_replace(',', '.', $data['price']);
        
        JobTypeAdditional::create($data);


        return redirect(route('job_type.show',$data['job_type_id']))->with('msg','Cadastro de novo tipo de serviço realizado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $JobTypeAdditional = JobTypeAdditional::find($id);
        $JobAditionals = $JobTypeAdditional->JobTypeAdditionalAdditional()->get();
        $AvaliableDays = WorkDay::getAvaliableDays($JobTypeAdditional->user_id);

        return view('job_type_additional/show')->with(['JobTypeAdditional'=>$JobTypeAdditional,'JobAditionals'=>$JobAditionals,'AvaliableDays'=>$AvaliableDays]);
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
        $JobTypeAdditional = JobTypeAdditional::findOrFail($id);

        $JobTypeAdditional->update($request->all());

        return redirect(route('job_type.show',$JobTypeAdditional->job_type_id))->with('msg','Tipo de serviço atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $JobTypeAdditional = JobTypeAdditional::find($id);
        if(!$JobTypeAdditional){
            redirect(route('job_type.index'));
        }
        $jobTypeId = $JobTypeAdditional->job_type_id;
        
        JobTypeAdditional::destroy($id);

        return redirect(route('job_type.show',$jobTypeId))->with('msg','Tipo de serviço removido com sucesso');

    }
}

