<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class AdminList extends Component
{
    public $admins;

    public function deleteAdmin($id)
    {
        DB::table('admin')->where('id', $id)->delete();
        $this->admins = DB::table('admin')->get();
        session()->flash('admin_deleted', 'Admin deleted successfully!');
    }
    public function render()
    {
        $this->admins = DB::table('admin')->get();
        return view('livewire.admin-list');
    }
}
