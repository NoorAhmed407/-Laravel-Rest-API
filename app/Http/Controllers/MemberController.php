<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Member::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $rules = array(
            'name'=>'required',
            'class'=> 'required',
            'fees'=> 'required'
        );

        $validator = Validator::make($req->all(),$rules);
        if($validator->fails())
            {
                return $validator->errors();
            }
        else{
            $member = new Member;
            $member->device_name=$req->device_name;
            $member->device_type=$req->device_type;
            $member->quantity=$req->quantity;
            $member->save();
    
            if($device){
                return ["Result"=>"Data Added To Database"];
            }
            else{
                return ["Result"=>"Not Updated Error Occured"];
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Member::find($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $member =  Member::find($id);
        $member->device_name = $req->device_name;
        $member->device_type = $req->device_type;
        $member->quantity = $req->quantity;
        $member->save();

        if($device){
            return ["Result"=> "Device Updated","Updated Record"=>$device];
        }
        else{
           return ["Result"=> "Error Occured"];

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device =  Device::find($id);
        $device->delete();
        if($device){
            return ["Result"=> "Data Deleted"];
        }
        else{
            return ["Result"=> "Error Occured"];
        }
    }
}
