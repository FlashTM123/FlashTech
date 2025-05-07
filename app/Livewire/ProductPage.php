<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductPage extends Component
{
    public $filter = 'all'; // Giá trị mặc định của bộ lọc
    public $search = ''; // Giá trị tìm kiếm
    public $limit = 10; // Số lượng bản ghi hiển thị mỗi trang

    public function render()
    {
        $query = Product::query();

        // Lọc theo loại sản phẩm
        if ($this->filter === 'laptop') {
            $query->whereHas('laptop');
        } elseif ($this->filter === 'component') {
            $query->whereHas('component');
        } elseif ($this->filter === 'accessories') {
            $query->whereHas('accessories');
        }

        // Tìm kiếm theo tên sản phẩm qua các quan hệ
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->whereHas('laptop', function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('component', function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('accessories', function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%');
                });
            });
        }

        // Phân trang
        $products = $query->paginate($this->limit);

        return view('livewire.product-page', compact('products'));
    }
}
