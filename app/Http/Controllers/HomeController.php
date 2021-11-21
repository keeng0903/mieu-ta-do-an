<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $lang  = DB::table('type_languages')->orderByRaw('language_type_id')->get();
        $data['option_languages'] = $lang;
        return view('engkids.homeTranslate', $data);
    }

    function result_search(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $type = $request->get('type');
            $data = DB::table('languages')
                ->Where("{$type}", 'LIKE', "%{$query}%")
                ->limit(5)
                ->orderByRaw('language_id')
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                    $output .= '<li style="width: 300px;font-size: large"><a href="#">' . $row->{$type} . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    function translated(Request $request)
    {
        if ($request->get('translated')) {
            $type_output = $request->get('type_output');
            $type_input = $request->get('type_input');
            $translated = $request->get('translated');
            $data_translated = DB::table('languages')
                ->where("{$type_input}", '=', "$translated")
                ->limit(1)
                ->get();
            $output = '';
            foreach ($data_translated as $row) {
                $output .=$row->{$type_output};
            }
            echo $output;
        }
    }

    public function output_lang(Request $request)
    {
        if ($request->get('type_language')) {
            $type = $request->get('type_language');
            $lang_type = DB::table('type_languages')
                ->where('type', '!=', "$type")
                ->get();
            $output = '';
            foreach ($lang_type as $row) {
                $output .= '<option value="' . $row->type . '">' . $row->name . '</option>';
            }
            echo $output;
        }
    }
}
