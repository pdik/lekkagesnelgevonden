<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\customers;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
      $c1=  customers::create([
            'first_name' => 'pepijn',
            'last_name'  => 'dik',
            'adres'      => 'Haagwinde 14',
            'postalcode' => '2201st',
            'placename'  => 'Noordwijk',
            'company_name'=> 'Pdik systems',
        ]);

    }
}

