<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\WorkPlace;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkPlaceRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkDay;
use App\Models\Estado;
use App\Models\Cidade;


class WorkPlaceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WorkPlaces = WorkPlace::where('user_id', Auth::user()->id)->get();
        return view('work_place/index')->with([
                                                        'WorkPlaces'=>$WorkPlaces,
                                                     ]);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $states = Estado::all();

        return view('work_place/edit')->with([
            'states'=>$states
         ]);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $WorkPlace = WorkPlace::where('user_id', Auth::user()->id)->get();
        return view('work_place/edit')->with('WorkPlace',$WorkPlace);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkPlaceRequest $request)
    {
        //dd($request->all());
        $data = [
            'city_id' => $request->get('city'),
            'user_id' => Auth::user()->employee()->first()->id
        ];
        // dd($data);
        
        WorkPlace::create($data);


        return redirect(route('work_place.index'))->with('msg','Cadastro de novo local de atendimento realizado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $WorkPlace = WorkPlace::find($id);
        $AvaliableDays = WorkDay::getAvaliableDays($WorkPlace->user_id);
        return view('work_place/show')->with(['WorkPlace'=>$WorkPlace,'AvaliableDays'=>$AvaliableDays]);
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
        $WorkPlace = WorkPlace::findOrFail($id);

        $WorkPlace->update($request->all());

        return redirect(route('work_place.index'))->with('msg','Local de Atendimento atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WorkPlace::destroy($id);

        return redirect(route('work_place.index'))->with('msg','Local de Atendimento removido com sucesso');

    }
    
}

