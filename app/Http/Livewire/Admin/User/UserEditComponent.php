<?php

namespace App\Http\Livewire\Admin\User;


use App\Http\Livewire\Traits\WithSelectionComponent;
use App\Models\User;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserEditComponent extends Component
{

    use WithSelectionComponent;

    public $user_id, $name, $email, $partner, $user, $role, $userPermissions;

    public function mount($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
       // $this->partner = $user->partner_id;
        $this->user = $user;

        $role = $user->getRoleNames()->first();
        if($role){
            $this->role = $role;
            $this->userPermissions = [];
        }
        else{
            $this->role = null;
            $this->userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        }


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

        return view('livewire.admin.user.user-edit-component', $data);
    }

    public function updated($propertyName)
    {
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user_id,
        ];
        $this->validateOnly($propertyName, $rules);
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user_id,
        ]);

        $user = User::where('id', $this->user_id)->first();

        $user->name = $this->name;
        $user->email = $this->email;
       // $user->partner_id = (!empty($this->partner))? $this->partner : null;
        $user->save();

        if($this->role){
            $user->syncPermissions([]);
            $user->syncRoles([$this->role]);
        }
        else{
            $user->syncRoles([]);
            $user->syncPermissions([$this->userPermissions]);
        }

        session()->flash('success-message', 'Saved!');
        return redirect()->route('admin.users');

    }
}
