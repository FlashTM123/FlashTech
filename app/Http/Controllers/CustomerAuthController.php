<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class CustomerAuthController extends Controller
{

    public function showLoginForm()
    {
        return view('customer.login');
    }
    public function loginProcess(Request $request){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|',
            ]);

            $customer = Customer::where('email', $request->email)->first();

            if($customer && Hash::check($request->password, $customer->password)){
                Session::put('customer', $customer);
                return redirect()->route('customer.home');
            }
            return back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    }
    public function showRegisterForm()
    {
        return view('customer.register');
    }
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|min:6',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageName,
        ]);

        return redirect()->route('customer.login')->with('success', 'Đăng ký thành công');
    }
    public function showProfile(){
        $customer = Session::get('customer');
        return view('customer.profile', compact('customer'));
    }
    public function logout(){
        Session::forget('customer');
        return redirect()->route('customer.home');
    }

}
