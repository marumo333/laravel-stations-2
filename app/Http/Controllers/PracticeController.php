<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function sample()
    {
        return response('sample', 200);
    }

    public function sample2()
    {
        return response()->json(['testParam' => 'test2']);
    }

    public function sample3()
    {
        return response()->json(['testParam' => 'test']);
    }
}
