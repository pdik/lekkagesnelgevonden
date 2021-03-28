<?php

namespace App\Http\Livewire\Customer;

use App\Models\Contact;
use App\Models\Contact_options;
use Livewire\Component;

class Detials extends Component
{
     public $customerDetials, $options;

    public function mount()
    {
        $this->options = Contact_options::all();
        $this->customerDetials = [
            [
                'data'    => '',
                'type'    => '1'
            ],
            [
                'data'    => '',
                'type'    => '2'
            ]
        ];
    }
    public function addRow(){
        $this->customerDetials[] =   [
            'data'    => '',
            'type'    => 'Email'
        ];
    }
    public function removeRow($index)
        {
            unset($this->customerDetials[$index]);
            $this->customerDetials = array_values($this->customerDetials);
        }
    public function render()
    {
        return view('livewire.customer.detials');
    }
}
