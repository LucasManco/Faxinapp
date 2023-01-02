<?php

namespace App\Http\Controllers\Web;

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
        $Jobs = Job::where('employee_id', Auth::user()->employee()->first()->id)->get();
        return view('Job/index')->with('Jobs',$Jobs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        // dd(Auth::user()->id);
        $Jobs = Job::where('user_id', Auth::user()->id)->get();
        // dd($Jobs);

        return view('Job.history')->with('Jobs', $Jobs);
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
        $additionals = [];
        // dd($additional_jobs);
        foreach ($additional_jobs as $additional_job){
            $additional_job_id = explode('additional_job_', $additional_job)[1];
            $additional_job_obj = JobTypeAdditional::find($additional_job_id);
            if($additional_job_obj){
                $additionals[] = $additional_job_id;
                $end_time += $additional_job_obj->time*60;
                $price += $additional_job_obj->price;
            }
        }

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
            'additionals' => json_encode($additionals)
        ];
        // dd($date);
        
        if(!Job::create($date)){
            return redirect('/login')->with('msg','Erro na solicitação, favor tentar novamente.2');

        }

            return redirect('/login')->with('msg','Solicitação realizada com sucesso.');

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
        return view('Job.show')->with('job', $job);

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
        return redirect()->route('job.index')->with('msg','Solicitação realizada com sucesso.');

    }
}
