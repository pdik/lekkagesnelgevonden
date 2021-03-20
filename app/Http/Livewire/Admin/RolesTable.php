<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\WithPagination;
use App\Http\Livewire\Traits\WithTableSorter;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class RolesTable extends Component
{
     use WithPagination;

    public function render()
    {
        $data['roles'] = Role::paginate(10);
        return view('livewire.admin.roles-table', $data);
    }

    public function delete($id){

        $role = Role::where('id', '=', $id)->firstOrFail();
        if($role->users->count() > 0){
            //error there are users with this role
            session()->flash('error-message', 'This role has active users.');
        }
        else{
            $role->delete();
            session()->flash('message', 'Removed!');
        }
    }
}
