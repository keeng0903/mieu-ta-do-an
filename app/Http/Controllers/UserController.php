<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @param Request $request
     */
    public function history(Request $request){

        $data = [];
        if (!empty(Session()->get('user_id'))){
            $user_id = Session()->get('user_id');

            $language_ids = [];
            $histories = DB::table('history')
                ->where('user_id', "$user_id")
                ->orderBy('id','desc')
                ->get(array('language_id', 'type'));

            foreach ($histories as $history) {
                $language_ids[] = $history->language_id;
            }

            $languages = DB::table('languages')
                ->whereIn('language_id', array_unique($language_ids))
                ->get();

            foreach ($histories as &$history){
                foreach ($languages as $language){
                    if ($history->language_id == $language->language_id && $history->type == TYPE_VIETNAMESE){
                        $history->input = $language->vn;
                        $history->output = $language->en;
                    }elseif($history->language_id == $language->language_id && $history->type == TYPE_ENGLISH){
                        $history->input = $language->en;
                        $history->output = $language->vn;
                    }
                }
            }
            $data['histories'] = $histories;
        }
        return view('engkids.history', $data);
    }
}
