<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;

class BrandManager extends Component
{
    use WithPagination;
    public $search = ''; // Biến lưu từ khóa tìm kiếm
    public $limit = 10; // Số lượng thương hiệu hiển thị trên mỗi trang
    protected $queryString = ['search']; // Lưu từ khóa tìm kiếm vào URL

    public function updatingSearch()
    {
        $this->resetPage(); // Reset về trang đầu tiên khi thay đổi từ khóa
    }
    public function delete($id)
    {
        $brands = Brand::find($id);
        if ($brands) {
            $brands->delete();
            flash()->option('position', 'bottom-center')
                ->option('icon', 'success')
                ->success('Xóa thương hiệu thành công!');
        } else {
            flash()->option('position', 'bottom-center')
                ->option('icon', 'error')
                ->error('Thương hiệu không tồn tại!');
        }
    }
    public function render()
    {
        $brands = Brand::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->limit);
        return view('livewire.brand-manager', compact('brands'));
    }
}
