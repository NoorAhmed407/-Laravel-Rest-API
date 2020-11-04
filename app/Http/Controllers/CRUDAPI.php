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
}
