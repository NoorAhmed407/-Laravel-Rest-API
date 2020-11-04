<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    function index()
    {
        return [
            "name"=>"Noor Ahmed",
            "fathername"=> "Aftabuddin"
        ];
    }
}
