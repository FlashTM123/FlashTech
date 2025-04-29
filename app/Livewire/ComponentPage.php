<?php

namespace App\Livewire;

use Livewire\Component as LivewireComponent;
use Livewire\WithPagination;
use App\Models\Component;

class ComponentPage extends LivewireComponent
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete($id)
    {
        $component = Component::find($id);
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
        $components = Component::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('brand', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.component-page', compact('components'));
    }
}
