<?php

namespace App\Http\Livewire\Report;

use App\Models\Items;
use App\Models\report_rows;
use Livewire\Component;

class AddItem extends Component
{
    public $selected,$report;

    public function mount($id){
     $this->report = $id;
    }
    public function add(){

        report_rows::create([
            'method_id' => $this->item,
            'data'      => $this->description,
            'images'    => $this->files,
            'report_id' => $this->report,
        ]);
        session()->flash('success-message', 'Saved!');

    }
    public function render()
    {
        return view('livewire.report.add-item');
    }

}
