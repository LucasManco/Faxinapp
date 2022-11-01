<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobType;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Jobs = Job::all();
        return view('account/job/index')->with('Jobs',$Jobs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        $jobs = Job::all();

        return view('Job.show')->with('jobs', $jobs);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $jobType = JobType::find($request->job_type_id);
        if(!$jobType){
            return view('employee/index')->with('msg','Erro na solicitação, favor tentar novamente.');
        }
        // dd();
        
        $date = [
            'price'=> $jobType->price,
            'transport'=> $jobType->employee()->first()->transport_value,
            'tax'=> 0,
            'final_price'=> $jobType->price,
            //'start_time' => $request->get('selected_hour'),
            //'end_time' => date('H:i', strtotime($request->get('selected_hour')) + $jobType->time*60),
            'status' => 'requested',
            'observation' => '',
            'address_id' => 1

        ];
        
        if(!Job::create($date)){
            return view('user/index')->with('msg','Erro na solicitação, favor tentar novamente.2');

        }

            return view('user/index')->with('msg','Solicitação realizada com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Job::findOrFail($id);
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
        $job_type = Job::findOrFail($id);

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
        return Job::destroy($id);
    }
    function acceptJob(Request $request){
        $data = $request->all();
        $job = Job::find($data['job']);
        
        if($data['accept']){
            $job->status = 'confirmed';
        }
        else{
            $job->status = 'canceled';
        }
        $job->save();
        return view('dashboard')->with('msg','Solicitação realizada com sucesso.');

    }
}
