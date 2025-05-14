<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class AdminList extends Component
{
    public $admins;

   public function delete($id)
    {
        DB::table('admin')->where('id', $id)->delete();
        flash()->option('position', 'bottom-center')
            ->option('icon', 'success')
            ->success('Xóa admin thành công!');
    }
    public function render()
    {
        $this->admins = DB::table('admin')->get();
        return view('livewire.admin-list');
    }
}
