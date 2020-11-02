<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class verifyAge extends Controller
{
    public function verifyAge(){
        return response()->json("Todo correcto xdxd",200);
    }
}
