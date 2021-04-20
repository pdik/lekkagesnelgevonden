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


        //App settings
        Permission::create(['name' => 'admin.settings.view']);
        Permission::create(['name' => 'admin.settings.edit']);
        Permission::create(['name' => 'admin.settings.delete']);


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

        //type  permissions
        Permission::create(['name' => 'type.create']);
        Permission::create(['name' => 'type.edit']);
        Permission::create(['name' => 'type.delete']);
        //Item  permissions
        Permission::create(['name' => 'item.create']);
        Permission::create(['name' => 'item.edit']);
        Permission::create(['name' => 'item.delete']);

        //Mails  permissions
        Permission::create(['name' => 'mail.send']);
        Permission::create(['name' => 'mail.create']);
        Permission::create(['name' => 'mail.edit']);
        Permission::create(['name' => 'mail.delete']);

        //Report  permissions
        Permission::create(['name' => 'report.create']);
        Permission::create(['name' => 'report.edit']);
        Permission::create(['name' => 'report.view']);
        Permission::create(['name' => 'report.download']);
        Permission::create(['name' => 'report.send']);
        Permission::create(['name' => 'report.delete']);

        //Give admin all Roles
        Role::findOrFail(1)->permissions()->sync(Permission::all()->pluck('id'));
        $user = User::find(1);
        $user->assignRole('admin');

    }
}
