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

        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request): \Illuminate\Http\RedirectResponse
    {
        // Kiểm tra dữ liệu hợp lệ
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|unique:admin,phone',
        ]);

        // Nếu hợp lệ, tạo admin mới
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Không mã hóa nếu không cần
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.index')->with('add_success', 'Admin has been added successfully!');

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
        return view('admin.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        // Kiểm tra email và phone không trùng với admin khác
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email,' . $admin->id,
            'password' => 'nullable|string|min:6',
            'phone' => 'required|string|unique:admin,phone,' . $admin->id,
        ]);

        // Cập nhật admin
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ?? $admin->password,
            'phone' => $request->phone
        ]);

        return redirect()->route('admin.index')->with('edit_success', 'Admin has been updated successfully!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('delete_success', 'Admin has been deleted successfully!');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function LoginProcess(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            session(['admin' => $admin]);
            return redirect()->route('manage.index')->with('login_success', 'Login successfully!');
        } else {
            return Redirect::back()->with('error', 'Email or password is incorrect!');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->forget('admin');
        session()->flash('logout_success', 'Logged out successfully!');
        return Redirect::route('admin.login');
    }

}
