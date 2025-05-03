<?php

namespace App\Livewire;

use App\Models\Accessories;
use App\Models\Accessory;
use Livewire\Component;
use Livewire\WithPagination;

class AccessoriesPage extends Component
{
    use WithPagination;

    public $search = '';
    public $limit = 10; // Số lượng sản phẩm hiển thị trên mỗi trang

    protected $queryString = ['search']; // Lưu từ khóa tìm kiếm vào URL

    public function updatingSearch()
    {
        $this->resetPage(); // Reset về trang đầu tiên khi thay đổi từ khóa
    }
    public function delete($id)
    {
        $accessories = Accessories::find($id);
        if ($accessories) {
            $accessories->delete();
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
        $accessories = Accessories::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('type', 'like', '%' . $this->search . '%')
            ->orWhereHas('brand', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->limit);

        return view('livewire.accessories-page', compact('accessories'));
    }
}
