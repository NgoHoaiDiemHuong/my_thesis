<?php

namespace App\Http\Controllers\Cus;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\hanghoa;
use Illuminate\Support\Facades\Response;

class SearchController extends BaseController
{
    public function search_hh(Request $request){
        $key = $request->keywords;
        // $key = 'ha';

            $search = hanghoa::where('ten_hang_hoa', 'LIKE', '%'. $key .'%')
            // ->orWhere('ma_nv', 'LIKE', '%'. $key .'%')
            // ->orWhere('email', 'LIKE', '%'. $key .'%')
            // ->orWhere('sdt', 'LIKE', '%'. $key .'%')
            ->get();
            return view('home.search')->with('data',$search);
    }
}
