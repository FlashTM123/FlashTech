<?php

namespace App\Livewire;

use App\Models\Laptop;

use Livewire\WithPagination;

use Livewire\Component;

class LaptopPage extends Component
{
    use WithPagination;

    public $search = ''; // Biến lưu từ khóa tìm kiếm

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
            ->where('name', 'like', '%' . $this->search . '%')




            ->orWhereHas('brand', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.laptop-page', compact('laptops'));
    }
}
