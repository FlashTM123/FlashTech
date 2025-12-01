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
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $admin = auth('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập');
        }

        // Kiểm tra xem admin có vai trò được phép không
        if (!in_array($admin->role, $roles)) {
            return abort(403, 'Bạn không có quyền truy cập tài nguyên này');
        }

        return $next($request);
    }
}
