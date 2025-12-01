<?php

namespace App\Livewire;

use App\Models\Admin;
use Livewire\Component;

class AdminList extends Component
{
    public $admins;
    public $selectedRole = '';
    public $selectedStatus = '';

   public function delete($id)
    {
        Admin::findOrFail($id)->delete();
        flash()->option('position', 'bottom-center')
            ->option('icon', 'success')
            ->success('Xóa admin thành công!');
    }
    public function render()
    {
        $query = Admin::query();

        if ($this->selectedRole) {
            $query->where('role', $this->selectedRole);
        }

        if ($this->selectedStatus !== '') {
            $query->where('status', $this->selectedStatus);
        }

        $this->admins = $query->get();
        return view('livewire.admin-list');
    }
}
