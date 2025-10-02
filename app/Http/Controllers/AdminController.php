<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins = Admin::all();

        return view('Admins.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admins.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|unique:admin,phone',

        ]);

        // Xử lý upload ảnh


        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,

        ]);
        flash()->options(['position' => 'bottom-center'])->success('Quản trị viên đã được tạo thành công!');
        return Redirect::route('Admins.admin.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('Admins.admin.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email,' . $admin->id,
            'password' => 'nullable|string|min:6',
            'phone' => 'required|string|unique:admin,phone,' . $admin->id,

        ]);

        // Xử lý upload ảnh mới nếu có


        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'phone' => $request->phone,

        ]);
        flash()->options(['position' => 'bottom-center'])->success('Quản trị viên đã được cập nhật thành công!');
        return Redirect::route('Admins.admin.index');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        flash()->options(['position' => 'bottom-center'])->success('Quản trị viên đã được xóa thành công!');
        return Redirect::route('Admins.admin.index');
    }
    public function login()
    {
        return view('Admins.admin.login');
    }
    public function LoginProcess(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            session(['admin' => $admin]);
            flash()->options(['position' => 'bottom-center'])->success('Đăng nhập thành công!');
            return Redirect::route('Admins.manage.index');
        } else {
            flash()->error('Đăng nhập thất bại! Vui lòng kiểm tra lại thông tin đăng nhập.');
            return Redirect::back();
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->forget('admin');
        flash()->options(['position' => 'top-right'])->success('Đăng xuất thành công!');
        return Redirect::route('Admins.admin.login');
    }

}
