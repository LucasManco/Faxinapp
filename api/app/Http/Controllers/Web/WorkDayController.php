<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\WorkDay;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkDayRequest;
use Illuminate\Support\Facades\Auth;



class WorkDayController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_id = Employee::where('user_id', Auth::user()->id)->first()->id;

        // WorkDay::create([
        //     'week_day'   => 1,
        //     'start'     => '09:00',
        //     'end'       => '11:00',
        //     'user_id'   => $employee_id
        // ]);

        // $work_days_db = WorkDay::where('user_id', $employee_id)->get();
        $work_days_db = WorkDay::all();
        $work_days = [];
        foreach ($work_days_db as $work_day_db){
            $work_days[$work_day_db->week_day] = [
                'start'     => $work_day_db->start,
                'end'       => $work_day_db->end,
            ];
        }
        // dd($work_days);
        return view('account/work_day/index')->with('work_days',$work_days);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('account/work_day/edit');

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $work_days = WorkDay::where('user_id', Auth::user()->id)->get();
        return view('account/work_day/edit')->with('work_days',$work_days);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkDayRequest $request)
    {
        //dd($request->all());
        $data = $request->all();
        
        $work_days = WorkDay::where('user_id', Auth::user()->id)->get();
        $user_id = Auth::user()->id;
        $employee_id = Employee::where('user_id', Auth::user()->id)->first()->id;
        // dd($work_days);
        if($work_days->count() == 0){
            /**
             * 
             * NENHUM WORK_DAY CADASTRADO
             * 
             * */
            // dd('NENHUM WORK_DAY CADASTRADO');
            for ( $i = 0; $i < 7; $i++){
                if(isset($data[$i.'_start_time']) && $data[$i.'_end_time']){
                    
                    WorkDay::create([
                        'week_day'   => $i,
                        'start'     => $data[$i.'_start_time'],
                        'end'       => $data[$i.'_end_time'],
                        'user_id'   => $employee_id
                    ]);
                    // dd(WorkDay::all());
                }
            }

        }
        else{
            dd('TEMOS WORK_DAY CADASTRADO');
            // foreach($work_days as $work_day){
            //     WorkDay::destroy($work_day->id);
            // }
        }

        // $data = $request->validated();
        // $data['user_id']= Auth::user()->id;
        // $data['price'] = str_replace(',', '.', $data['price']);
        
        // WorkDay::create($data);


        return redirect(route('work_day.index'))->with('msg','Dias trabalhados atualizados com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return WorkDay::findOrFail($id);
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
        $work_day = WorkDay::findOrFail($id);

        $work_day->update($request->all());

        return redirect(route('work_day.index'))->with('msg','Endereço atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WorkDay::destroy($id);

        return redirect(route('work_day.index'))->with('msg','Endereço removido com sucesso');

    }
}

