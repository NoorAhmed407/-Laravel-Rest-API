<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class CRUDAPI extends Controller
{


    //Get All the Data
    function getData()
    {
        return Device::all();
    }


    //Get A Single User
    function getSingleUser($id)
    {
        return Device::find($id);

    }

    
    //Adding Data to Database
    function addData(Request $req)
    {

        $rules = array(
            'device_name'=>'required',
            'device_type'=> 'required',
            'quantity'=> 'required'
        );

        $validator = Validator::make($req->all(),$rules);
        if($validator->fails())
            {
                return $validator->errors();
            }
        else{
            $device = new Device;
            $device->device_name=$req->device_name;
            $device->device_type=$req->device_type;
            $device->quantity=$req->quantity;
            $device->save();
    
            if($device){
                return ["Result"=>"Data Added To Database"];
            }
            else{
                return ["Result"=>"Not Updated Error Occured"];
            }
        }


    }


    function updateData(Request $req, $id){

         $device =  Device::find($id);
         $device->device_name = $req->device_name;
         $device->device_type = $req->device_type;
         $device->quantity = $req->quantity;
         $device->save();

         if($device){
             return ["Result"=> "Device Updated","Updated Record"=>$device];
         }
         else{
            return ["Result"=> "Error Occured"];

         }
    }

    //Delete Data To database
    function deleteData($id) 
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
