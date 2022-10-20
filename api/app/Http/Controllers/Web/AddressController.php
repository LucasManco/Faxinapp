<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use Illuminate\Support\Facades\Auth;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        return view('account/address/index')->with('addresses',$addresses);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('account/address/edit');

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('account/address/edit')->with('address',$address);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {

        $data = $request->validated();
        $data["user_id"] = Auth::user()->id;

        Address::create($data);


        return redirect(route('address.index'))->with('msg','Endereço cadastrado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Address::findOrFail($id);
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
        $address = Address::findOrFail($id);

        $address->update($request->all());

        return redirect(route('address.index'))->with('msg','Endereço atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::destroy($id);

        return redirect(route('address.index'))->with('msg','Endereço removido com sucesso');

    }
}
