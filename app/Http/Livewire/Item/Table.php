<?php

namespace App\Http\Livewire\Item;

use App\Http\Livewire\Traits\WithSelectionComponent;
use App\Http\Livewire\Traits\WithTableSorter;
use App\Models\Items;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    use WithTableSorter;
    use WithSelectionComponent;

     public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

      public function mount()
    {
        $this->sortField = 'name';

    }
         public function delete($id)
    {
        $item =  Items::where('id', $id)->firstOrFail();
        $item->delete();
    }
    public function render()
    {
          $data['items'] =  $this->getItems()->paginate(10);
        return view('livewire.item.table', $data);
    }

     public function getItems()
    {
        return Items::where(function ($q){
            $q->where('id', 'like', '%' . $this->search . '%')
                    ->orwhere('items.name', 'like', '%' . $this->search . '%')
            ->orwhere(function($s){
                $s->whereHas('type', function ($sub){
                      $sub->where('name', app()->getLocale());
                });
            });
        });
    }
}
