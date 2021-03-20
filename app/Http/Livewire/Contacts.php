<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contacts extends Component
{
    public $contacts = [];
    public $allContacts = [];

       public function mount($customer = null)
    {
        $this->allContacts = \App\Models\contacts::all();
        if(isset($customer)){
         //   dd($customer->contact);
            $this->contacts = $customer->contact->Toarray();
            dd($this->contacts);
        }else{
            $this->contacts = [
            ['contact_id' => '', 'data' => '']
        ];
        }
    }

    public function addProduct()
    {
        $this->contacts[] = ['contact_id' => '', 'data' => ''];
    }

    public function removeProduct($index)
    {
        unset($this->contacts[$index]);
        $this->contacts = array_values($this->contacts);
    }


    public function render()
    {
         info($this->contacts);
        return view('livewire.contacts');
    }
}
