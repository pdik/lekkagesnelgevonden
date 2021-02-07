<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'pepijn',
            'email' => 'pepijn@pdik.nl',
            'password'=> '$2y$10$yOth06wNZy32ZndwUAaMBuTsWytt0wtlA5gcee6X9JjJwdC.PKioq',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
