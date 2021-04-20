<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class SearchComponent extends Component
{
    /**
    * Custom database selection component with search functionality
    *
    * @since 15/02/2021
    * @author P.Lieverse <p.lieverse@brightness-group.com>
    *
    * @param string $name Name of the public parent value.
    * @param string $event Name of the parent event that catches a value change.
    * @param string $table Name of the table from where to get the selection data
    * @param string $keyName Name of the column you want to return as data
    * @param string $value Name of the column you want to show as the value to select
    * @param array $fields Array with columns to search for the given search value
    * @param string $where Option to add a custom where Raw SQL
    * @param string $groupBy Option to add a custom groupby Raw SQL
    * @param string $orderBy Option to add a column name for sorting on
    * @param string $orderDirection Option to add the sorting filter type
    * @param string $select Option to add a custom select Raw SQL
    * @param array $selected Option to add the current selected default value in the format ['key' => '', 'value' => '']
    */
    public $name,
        $event,
        $table,
        $keyName,
        $value,
        $fields,
        $search,
        $results,
        $selectedKey = "",
        $selectedName = "",
        $where,
        $groupBy,
        $orderBy,
        $orderDirection,
        $select;
    public function mount(string $name, string $event, $table, string $keyName, string $value, array $fields,string $where = "", string $groupBy = "", string $orderBy = "", string $orderDirection = 'desc', string $select = "", array $selected = null){
        $this->name = $name;
        $this->event = $event;
        $this->table = $table;
        $this->keyName = $keyName;
        $this->value = $value;
        $this->fields = $fields;
        $this->where = $where;
        $this->groupBy = $groupBy;
        $this->orderBy = $orderBy;
        $this->orderDirection = $orderDirection;
        $this->select = $select;

        if($selected){
            $this->updateSelected($selected['key'],$selected['value']);
        }
    }

    public function render()
    {
        $query = DB::table($this->table)->where(function ($query) {
            foreach ($this->fields as $i => $field){
                if($i == 0){
                    $query->where($field, 'like', '%' . $this->search . '%');
                }
                else{
                    $query->orwhere($field, 'like', '%' . $this->search . '%');
                }
            }
        });

        if(!empty($this->groupBy)){
            $query->groupByRaw($this->groupBy);
        }
        if(!empty($this->select)){
            $query->selectRaw($this->select);
        }
        if(!empty($this->where)){
            $query->whereRaw($this->where);
        }
        if(!empty($this->orderBy)){
            $query->orderBy($this->orderBy, $this->orderDirection);
        }
        else{
            $query->orderBy($this->keyName);
        }

        if(Schema::hasColumn($this->table, 'hidden')){
            $query->where('hidden', '!=', true);
        }

        $this->results = $query->take(10)->get();

        return view('livewire.search-component');
    }
    public function updateSelected($key, $value){
        $this->selectedKey = $key;
        $this->selectedName = $value;
        $this->search = "";

        $this->emitUp($this->event, [$this->name => $this->selectedKey]);
    }
}
