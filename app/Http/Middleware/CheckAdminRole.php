<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        // ตรวจสอบว่าผู้ใช้ล็อกอินเป็น employee และมี role_id = 2 (admin)
        if (Auth::guard('employee')->check() && Auth::guard('employee')->user()->role_id == 2) {
            return $next($request);
        }
        // ถ้าไม่ใช่ admin ให้ redirect ไปที่อื่นหรือแสดง error
        return redirect('/login');
    }
}
