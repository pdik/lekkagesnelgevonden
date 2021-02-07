<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\contact_options as model;
class contact_options extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        model::create([
            'title' => 'email',
            'type'=> 'text',
        ]);
        model::create([
            'title' => 'phone',
            'type'=> 'number',
        ]);
        model::create([
            'title' => 'website',
            'type'=> 'text',
        ]);
        model::create([
            'title' => 'fax',
            'type'=> 'number',
        ]);
    }
}
