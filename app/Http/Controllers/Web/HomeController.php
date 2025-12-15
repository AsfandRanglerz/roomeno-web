<?php

namespace App\Http\Controllers\web;

use App\Models\HotelInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('web.index');
    }
   

}
