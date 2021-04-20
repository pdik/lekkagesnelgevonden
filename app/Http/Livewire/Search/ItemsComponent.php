<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class ItemsComponent extends Component
{
    public
    $search  = '',
    $name = '',
    $function = '';
    public function mount($name, $function, $search = null){
        $this->search = $search;
        $this->name = $name;
        $this->function = $function;
    }
    public function searching()
    {
        $this->emitUp($this->function,[$this->name, $this->search]);
    }
    public function render()
    {
        return view('livewire.search.items-component');
    }

}
