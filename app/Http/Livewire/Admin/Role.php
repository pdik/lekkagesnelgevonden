<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
class Role extends Component
{
    public $name;
    public $rolePermissions = [];
    public $role;
     public function mount($name = ''){
        $this->name = $name;
        $this->role = \Spatie\Permission\Models\Role::where('name', '=', $this->name)->firstOrNew();
        $this->rolePermissions = $this->role->getAllPermissions()->pluck('name')->toArray();
    }
     public function render()
    {

        $permissions = [];
        $subArrays = [];

        foreach (Permission::all() as $permission){
            $explode = explode('.', $permission->name);
            if(count($explode) == 1){
                $permissions[$explode[0]][] = $permission->name;
            }
            else if(count($explode) == 2){
                $permissions[$explode[0]][] = $permission->name;
            }
            else{
                $subArrays[$explode[0]][$explode[1]][] = $permission->name;
            }
        }

        //Merge arrays so the sub array comes under normal permissions
        $data['permissions'] = array_replace_recursive($permissions, $subArrays);



        return view('livewire.admin.role', $data);
    }

    public function selectAll(){
        $this->rolePermissions = Permission::pluck('name')->toArray();

    }

    public function unselectAll(){
        $this->rolePermissions = [];
    }

    public function submit(){
        if($this->role->id){
            $rules = [
                'name' => ['required', Rule::unique('roles', 'name')->ignore($this->role->id)],
            ];
        }
        else{
            $rules = [
                'name' => 'required|unique:roles,name',
            ];
        }

        $this->validate($rules);

        $this->role->name = $this->name;
        $this->role->save();

        foreach ($this->rolePermissions as $permission) {
            $this->role->givePermissionTo($permission);
        }

        session()->flash('message', 'Saved!');
        return redirect()->route('admin.roles');

    }
}
