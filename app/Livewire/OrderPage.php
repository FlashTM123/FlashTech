<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Carbon\Carbon; // Thư viện Carbon để xử lý ngày tháng

class OrderPage extends Component
{
    use WithPagination;

    public $search = ''; // Biến lưu từ khóa tìm kiếm
    public $filterStatus = 'all'; // Trạng thái đơn hàng
    public $dateRange = ''; // Biến lưu khoảng thời gian tìm kiếm
    public function updatingSearch()
    {
        $this->resetPage(); // Reset về trang đầu tiên khi thay đổi từ khóa
    }
    public function updatingFilterStatus()
    {
        $this->resetPage(); // Reset về trang đầu tiên khi thay đổi trạng thái
    }
    public  function updateStatus($orderId, $status)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->update(['status' => $status]);
            flash()->option('position', 'bottom-center')
                ->option('icon', 'success')
                ->success('Cập nhật trạng thái đơn hàng thành công!');
        } else {
            flash()->option('position', 'bottom-center')
                ->option('icon', 'error')
                ->error('Đơn hàng không tồn tại!');
        }
    }
    public function render()
    {
        $query = Order::query();

        // Tìm kiếm theo tên khách hàng hoặc địa chỉ
        if (!empty($this->search)) {
            $query->whereHas('customer', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })->orWhere('address', 'like', '%' . $this->search . '%');
        }

        // Lọc theo trạng thái
        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }
        // Lọc theo khoảng thời gian
        if($this->dateRange === 'today') {
            $query->whereDate('created_at', Carbon::today());
        } 

        // Sắp xếp theo thời gian tạo (mới nhất lên đầu)
        $orders = $query->with('customer', 'admin')
            ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo
            ->paginate(10);

        return view('livewire.order-page', compact('orders'));
    }
}
