<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

class SessionController extends Controller
{
    public function write_success(Request $request){
        if($request->ajax()){
            $request->session()->put('success', $request->data);
            $timeout_duration = 5;
            $request->session()->put('time', time());
            if(session::has('success')&& time()-session::has('time')>=5){
             // session('success',$request->data);
             Session::forget('success');
             Session::forget('time');
            }

        $view = view('flashMs.flashMs')
        return Response::json($view);
        }
    }
}
