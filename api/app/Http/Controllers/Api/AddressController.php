<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Controllers\Controller;
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
        $defaultId = Auth::user()->default_address_id;
        
        foreach ($addresses as $address){
            if($address['id'] == $defaultId){
                $address['isDefault'] = true;
            }
            else{
                $address['isDefault'] = false;
            }
        }
        return $addresses;
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
            'street'=> 'required|string',
            'number' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'complement' => 'nullable|string'
        ]);

        $data = $request->all();
        $data["user_id"] = Auth::user()->id;

        return Address::create($data);
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
        $job_type = Address::findOrFail($id);

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
        return Address::destroy($id);
    }

    /**
     * 
     * Set a new default address
     * 
     */
    public function setDefault($id){
        Address::find($id)->becomeDefault();

        $addresses = Address::where('user_id', Auth::user()->id)->get();
        
        foreach ($addresses as $address){
            if($address['id'] == $id){
                $address['isDefault'] = true;
            }
            else{
                $address['isDefault'] = false;
            }
        }
        return $addresses;
    }

}
