<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Job;
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
        return Job::all();
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
            'price'=> 'required|numeric',
            'transport'=> 'required|numeric',
            'tax'=> 'required|numeric',
            'price_final'=> 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'status' => Rule::in(['requested','confirmed','done','canceled']),
            'observation' => 'required|string'
        ]);

        return Job::create($request->all());
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
}
