<?php

namespace App\Livewire;

use Livewire\Component as LivewireComponent;
use Livewire\WithPagination;
use App\Models\Components;

class ComponentPage extends LivewireComponent
{
    use WithPagination;

    public $search = '';
    public $limit = 10;

    // Biến lưu trang hiện tạ
    public $componentId;
    public $name;
   
    

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete($id)
    {
        $component = Components::find($id);
        if ($component) {
            $component->delete();
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
        $components = Components::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('brand', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->limit);
        return view('livewire.component-page', compact('components'));
    }
}
