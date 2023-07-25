<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('ongkir');
    }

    public function checkout(Request $request){
        dd($request->all());
    }
}
