<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class authKhachHang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('khach_hang')) {
                return $next($request);
        }
        if ($request->session()->has('khach_hang')) {
            return redirect()->back()->with('info','Bạn đã đăng nhập vào trang quản lý hệ thống');
        }
        return redirect()->route('cus.getLogIn');
    }
}
