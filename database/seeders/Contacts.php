<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\customers;
use Illuminate\Database\Seeder;
class Contacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $customer =  customers::create([
            'first_name' => 'pepijn',
            'last_name'  => 'dik',
            'adres'      => 'haagwinde 14',
            'postalcode' => '2201ST',
            'placename'  => 'Noordwijk',
            'created_at' => now(),
            'updated_at' => now()
        ]);
      Contact::create([
                'customer_id' => $customer->id,
                'contact_option_id' =>  1,
                'data'=> 'pepijn@pdik.nl'
      ]);
       Contact::create([
                'customer_id' => $customer->id,
                'contact_option_id' =>  2,
                'data'=> '0619990890'
      ]);
    }
}
