<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\JobType;
use App\Http\Controllers\Controller;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobType::all();
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
            'name'=> 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'time' => 'required|integer'
        ]);

        return JobType::create($request->all());
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
        $job_type = JobType::findOrFail($id);

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
        return JobType::destroy($id);
    }

     /**
     * Return a List of JobTypes from a Employee
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function JobTypeAdditionals($id)
    {
        $JobType = JobType::find($id);
        $JobAditionals = $JobType->jobTypeAdditional()->get();

        return $JobAditionals;
    }
}
