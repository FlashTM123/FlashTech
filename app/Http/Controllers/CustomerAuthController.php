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
                flash()->options(['position' => 'bottom-center', 'class' => 'success'])
                ->success('Đăng nhập thành công');
                return redirect()->route('customer.home');
            }
            flash()->options(['position' => 'top-right', 'class' => 'error'])->error('Sai tai khoản hoặc mật khẩu');
            return back();
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

        flash()->options(['position' => 'bottom-center', 'class' => 'success'])->success('Đăng ký thành công! Hãy đăng nhập để tiếp tục');
        return redirect()->route('customer.login');
    }
    public function showProfile(){
        $customer = Session::get('customer');
        return view('customer.profile', compact('customer'));
    }
    public function logout(){
        Session::forget('customer');
       flash()->options(['position' => 'bottom-center', 'class' => 'success'])->success('Đăng xuất thành công');
        return redirect()->route('customer.home');
    }
    public function edit(Customer $customer)
    {
        $customer = Session::get('customer');
        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'Bạn cần đăng nhập để chỉnh sửa thông tin.');
        }
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request)
    {
        // Lấy thông tin khách hàng từ Session
        $customer = Session::get('customer');

        // Kiểm tra nếu khách hàng không tồn tại
        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'Bạn cần đăng nhập để chỉnh sửa thông tin.');
        }

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'password' => 'nullable|min:6',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cập nhật thông tin khách hàng
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->gender = $request->gender;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        // Nếu có mật khẩu mới, cập nhật mật khẩu
        if ($request->filled('password')) {
            $customer->password = Hash::make($request->password);
        }

        // Nếu có ảnh đại diện mới, xử lý upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $customer->image = $imageName;
        }

        // Lưu thông tin khách hàng vào cơ sở dữ liệu
        $customer->save();

        // Cập nhật lại thông tin trong Session
        Session::put('customer', $customer);

        return redirect()->route('customer.edit')->with('success', 'Hồ sơ đã được cập nhật thành công.');
    }
}
