<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;

class ProductPage extends Component
{
    use WithPagination;
    public $search = '';
    public $limit = 10;
    protected $queryString = ['search'];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products = \App\Models\Product::query()
            ->where('description', 'like', '%' . $this->search . '%')
            ->orWhereHas('component', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->limit);
        return view('livewire.product-page', compact('products'));
    }
}
