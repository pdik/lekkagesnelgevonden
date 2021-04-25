<?php

namespace App\Http\Livewire\Report;

use App\Models\Items;
use Livewire\Component;

class Explanation extends Component
{
    protected $listeners = ['itemAdded' => 'itemAdded'];
    public $selected = [], $items = [], $files = [];
    public function itemAdded($value){
     $this->selected = $value;
     $this->getSelectedItems();
    }

    public function render()
    {
        return view('livewire.report.explanation');
    }

     public function getSelectedItems(){
        $selected = [];
        $this->items = [];
        if(is_array($this->selected)){
            if(count($this->selected) >= 1) {
                foreach ($this->selected as $select) {
                    $selected[] = $select['id'];
                    $this->items[] = Items::find($select['id'])->toArray();
                }
            }
              else{
                  $selected = [];
                }
        }
        return $selected;
    }
}
