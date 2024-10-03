<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect('/admin/login'); // Redirect ไปหน้า login สำหรับ admin ถ้าไม่ได้ล็อกอิน
    }
    protected function redirectTo($request){
        if (! $request->expectsJson()) {
            return route('login'); // หรือกำหนดเส้นทางที่ต้องการให้ผู้ใช้ที่ยังไม่ได้ล็อกอินไป
        }
    }
}
