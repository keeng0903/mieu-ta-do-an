<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $decription = DB::table('anh_viet')->inRandomOrder()->limit(20)->get();
        return view('engkids.home',compact('decription'));
    }
}
