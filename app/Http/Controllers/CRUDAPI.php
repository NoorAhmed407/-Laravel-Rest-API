<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class CRUDAPI extends Controller
{
    //Get All the Data
    function getData()
    {
        return Device::all();
    }



    //Adding Data to Database
    function addData(Request $req)
    {

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
