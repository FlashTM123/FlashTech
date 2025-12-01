<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('Admins.customers.index' , compact('customers'));
    }

    public function profile()
    {
        // Lấy thông tin khách hàng hiện tại
        $customer = auth()->user(); // Giả sử bạn dùng Auth để lấy thông tin người dùng

        // Tải lịch sử đơn hàng của khách hàng
        $customer->load('orders'); // Eager load quan hệ 'orders'

        return view('Admins.customer.profile', compact('customer'));
    }

    public function getOrders()
    {
        $customer = auth()->user();

        // Kiểm tra xem customer có tồn tại hay không
        if (!$customer) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $orders = $customer->orders()->latest()->get();
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
