<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobType;
use App\Models\JobTypeAdditional;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobList = Job::all();
        foreach ($jobList as $job){
            $job['profile_image']   = 'http://192.168.2.117:8000'.$job->employee()->first()->profile_image;
            $job['name']            = $job->employee()->first()->getUser()->name;
            $job['address']         = $job->address();
            $job['status']          = __($job->status);   
            $job['start']           = date('d/m/Y H:i', strtotime($job->start_time));
        }
        return $jobList;
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
        $request->validate([
            'job_type_id'       => 'required',
            'selected_date'     => 'required',
            'selected_hour'     => 'required'
        ]);

        // dd($request->all());
        // dd('to no job');
        $TAX_PERCENTAGE = 0;

        $jobType = JobType::find($request->job_type_id);
        if(!$jobType){
            return view('employee/index')->with('msg','Erro na solicitação, favor tentar novamente.');
        }
        
        $start_time = strtotime($request->get('selected_date') ." " . $request->get('selected_hour'));
        $end_time = $start_time + $jobType->time*60;
        $price = $jobType->price;
        
        /**
         * Como os unicos checkbox no furmulario são os adicionais,
         * uma chave com valor on deverá ser um adicional.
         */
        $additional_jobs = array_keys($request->all(),'on');
        // $additionals = [];
        // dd($additional_jobs);
        // foreach ($additional_jobs as $additional_job){
        //     $additional_job_id = explode('additional_job_', $additional_job)[1];
        //     $additional_job_obj = JobTypeAdditional::find($additional_job_id);
        //     if($additional_job_obj){
        //         $additionals[] = $additional_job_id;
        //         $end_time += $additional_job_obj->time*60;
        //         $price += $additional_job_obj->price;
        //     }
        // }

        $tax = $price * $TAX_PERCENTAGE;
        $transport = $jobType->employee()->first()->transport_value;

        $date = [
            'price'=> $price,
            'transport'=> $transport,
            'tax'=> $tax,
            'final_price'=> $price + $transport + $tax,
            'start_time' => date("Y-m-d H:i:s", $start_time ),
            'end_time' => date("Y-m-d H:i:s", $end_time),
            'status' => 'requested',
            'observation' => '',
            'address_id' => 1,
            'job_type_id' => $jobType->id,
            'employee_id' => $jobType->user_id,
            'user_id' => Auth::user()->id,
            'additionals' => json_encode($request->additionals)
        ];
        // dd($date);
        
        return Job::create($date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);

        $job['job_type'] = $job->jobType()->first();
        $job['job_additionals'] = $job->jobTypeAdditional();
        $job['address'] = $job->address();

        return $job;
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
}
