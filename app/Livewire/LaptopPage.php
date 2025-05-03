<?php

namespace App\Livewire;

use App\Models\Laptop;

use Livewire\WithPagination;

use Livewire\Component;

class LaptopPage extends Component
{
    use WithPagination;

    // Số lượng sản phẩm hiển thị trên mỗi trang
    public $search = ''; // Biến lưu từ khóa tìm kiếm
    public $limit = 10; // Số lượng sản phẩm hiển thị trên mỗi trang

    // Biến lưu trang hiện tại

    // From update
    public $laptopId;
    public $name;
    public $brand;


    protected $queryString = ['search']; // Lưu từ khóa tìm kiếm vào URL

    public function updatingSearch()
    {
        $this->resetPage(); // Reset về trang đầu tiên khi thay đổi từ khóa
    }

    public function delete($id)
    {
        $laptop = Laptop::find($id);
        if ($laptop) {
            $laptop->delete();
            flash()->option('position', 'bottom-center')
                ->option('icon', 'success')
                ->success('Xóa sản phẩm thành công!');
        } else {
            flash()->option('position', 'bottom-center')
                ->option('icon', 'error')
                ->error('Sản phẩm không tồn tại!');
        }
    }
    public function render()
    {
        $laptops = Laptop::query()
        ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhereHas('brand', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
        })
        ->paginate($this->limit);



        return view('livewire.laptop-page', compact('laptops'));
    }
}
