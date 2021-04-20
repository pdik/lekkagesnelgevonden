<?php

namespace App\Http\Livewire\Report;

use App\Http\Livewire\Traits\WithUpdateValues;
use App\Models\customers;
use App\Models\report;
use Livewire\Component;

class Wizard extends Component
{
    use WithUpdateValues;

    public $selected,
        $customer_id,
        $data,
        $tab = 1,
        $customers = [];

    public function mount(){
        $this->selected = [];
        $this->customers = Customers::all();
    }


    public function render()
    {
        return view('livewire.report.wizard');
    }

}
