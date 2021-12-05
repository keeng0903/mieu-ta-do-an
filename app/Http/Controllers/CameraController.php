<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CameraController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function camera()
    {
        return view('engkids.camera');
    }

    /**
     * @param Request $request
     */
    public function result_search_camera(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');

            $data = DB::table('languages')
                ->Where('en', 'LIKE', "%{$query}%")
                ->limit(5)
                ->orderByRaw('language_id')
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block;">';
            foreach ($data as $row) {
                $output .= '<li style="width: 600px;font-size: large"><a href="#">' . $row->en . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
