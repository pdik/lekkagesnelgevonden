<?php

namespace App\Http\Livewire\Traits;
Trait WithTableSorter
{
    public $sortField = '';
    public $sortType = 'desc';

    public function sortItem($item)
    {
        $this->sortField = $item;
        $this->sortType = ($this->sortType == 'asc') ? 'desc' : 'asc';
    }
}
