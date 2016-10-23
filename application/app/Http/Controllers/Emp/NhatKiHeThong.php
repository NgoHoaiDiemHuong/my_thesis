<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NhatKiHeThong extends Controller
{
      public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('authNhanVien', ['only' => 'getLogout']);
    }
}
