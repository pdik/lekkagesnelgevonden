<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        foreach ($roles as $role){
            $role->delete();
        }
        $permissions = Permission::all();
        foreach ($permissions as $permission){
            $permission->delete();
        }
        //Default Roles
        Role::create(['name' => 'admin']);

        //Users Permissions
        Permission::create(['name' => 'admin.users']);
        Permission::create(['name' => 'admin.users.edit']);
        Permission::create(['name' => 'admin.users.delete']);

        //Roles permissions
        Permission::create(['name' => 'admin.roles']);
        Permission::create(['name' => 'admin.roles.edit']);
        Permission::create(['name' => 'admin.roles.delete']);

        //Customer permissions
        Permission::create(['name' => 'customer.create']);
        Permission::create(['name' => 'customer.edit']);
        Permission::create(['name' => 'customer.delete']);

        //Give admin all Roles
        Role::findOrFail(1)->permissions()->sync(Permission::all()->pluck('id'));
        $user = User::find(1);
        $user->assignRole('admin');

    }
}
