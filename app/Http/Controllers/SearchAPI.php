<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class SearchAPI extends Controller
{
   function SearchData($item)
   {
       return Device::where('device_name','like', '%'.$item.'%')->get();
   }
}
