<?php

namespace App\Http\Livewire\Customer;

use App\Models\Contact_options;
use App\Models\customers;
use Livewire\Component;

class Editdetials extends Component
{
    public $customerDetials, $options;
    public function mount($id = null){
         $this->options = Contact_options::all();
         if(isset($id)){
            $customer = customers::find($id);
               foreach ($customer->detials as $detial){
                $this->customerDetials[] =
                    [
                        'data'    => $detial->data,
                        'type'    => $detial->contact_option_id
                    ];
            }
         }else{
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
        return view('livewire.customer.editdetials');
    }
}
