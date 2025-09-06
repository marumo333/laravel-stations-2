<?php

namespace App\Http\Controllers;
use App\Models\Sheet;

class SheetController extends Controller
{
    public function index(){
        $sheets = Sheet::all();
        //行ごとにグループ化
        $grouped = $sheets->groupBy('row');
        return view('sheets.index',['grouped'=>$grouped]);
    }
}
