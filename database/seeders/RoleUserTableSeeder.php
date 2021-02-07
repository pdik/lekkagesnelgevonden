<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrFail()->roles()->sync(1);
    }
}
