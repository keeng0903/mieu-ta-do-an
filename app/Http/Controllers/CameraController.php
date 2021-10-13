<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CameraController extends Controller
{
    public function camera(){
        return view('engkids.camera');
    }

    // public function searchdetect(Request $request){

    //     $searchdetect = DB::table('anh_viet')->where('word', 'LIKE', $request->word)->get();
    //     return view('camera',compact('searchdetect'));
    // }
}
