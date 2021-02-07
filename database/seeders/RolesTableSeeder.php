<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Role::insert($roles);
    }
}
