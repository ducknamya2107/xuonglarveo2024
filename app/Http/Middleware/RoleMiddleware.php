<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy giá trị 'role' từ tham số GET trên URL (nếu có)
        $role = $request->get('role', null); // Mặc định là null nếu không có tham số 'role'

        // Kiểm tra nếu vai trò hợp lệ (ví dụ, chỉ cho phép admin hoặc employee)
        if ($role === 'admin' || $role === 'employee' || $role === 'customer') {
            return $next($request); // Nếu vai trò hợp lệ, cho phép tiếp tục truy cập
        }

        // Nếu không có quyền truy cập, chuyển hướng về trang chủ hoặc trang không có quyền truy cập
        return redirect('/');

        
    }
}
