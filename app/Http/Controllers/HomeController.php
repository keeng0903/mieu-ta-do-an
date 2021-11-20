<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $lang  = DB::table('type_languages')->get();
        $data['option_languages'] = $lang;
        return view('engkids.homeTranslate', $data);
    }

    function result_search(Request $request)
    {
        if ($request->get('query')) {
            $type = $request->get('type');

            if ($type == 'en') {
                $type_language = 'en';
            } else{
                $type_language = 'vn';
            }

            $query = $request->get('query');
            $data = DB::table('languages')
                ->where($type_language, 'LIKE', "%{$query}%")
                ->limit(5)
                ->orderByRaw('language_id')
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                if ($type == 'vn'){
                    $output .= '<li style="width: 300px;font-size: large"><a href="#">' . $row->vn . '</a></li>';
                }else{
                    $output .= '<li style="width: 300px;font-size: large"><a href="#">' . $row->en . '</a></li>';
                }
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    function translated(Request $request)
    {
        if ($request->get('translated')) {
            $translated = $request->get('translated');
            $data_translated = DB::table('languages')
                ->where('vn', '=', "$translated")
                ->get();
            $output = '';
            foreach ($data_translated as $row) {
                $output .=$row->en;
            }
            echo $output;
        }
    }

    public function select_option_language($id)
    {
        echo json_encode(DB::table('type_languages')->where('language_id','!=', $id)->get());
    }
}
