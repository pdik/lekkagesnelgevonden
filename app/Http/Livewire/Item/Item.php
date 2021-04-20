<?php

namespace App\Http\Livewire\Item;

use App\Http\Livewire\Traits\WithUpdateValues;
use App\Models\Items;
use App\Models\Types;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Item extends Component
{
    use WithUpdateValues;
    public $name, $description, $price, $type, $type_name, $id, $item, $text;

      protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:4',
    ];

    public function render()
    {
        return view('livewire.item.item');
    }

        public function mount($id = null){
          if(isset($id)){
            $this->id= $id;
            $this->text  = [
                'add' => __('global.update')
            ];
        }else{
              $this->text = [
                  'add' => __('global.add')
              ];
          }
        $this->item = Items::where('id', $id)->firstOrNew();
          $this->name = $this->item->name;
          $this->type= $this->item->type_id;
          $this->description = $this->item->description;
          $this->price = $this->item->price;
       if($this->type !== null){
            $this->type_name = Types::where('id','=',$this->type)->first()->name;
        }
        }
    public function submit(){
        $this->validate();

        if(empty($this->type)){
            throw ValidationException::withMessages(['type' => __('global.pleaseSelect') . ' ' . __('global.type')]);
       }
        $this->item->name = $this->name;
        $this->item->description = $this->description;
        $this->item->price = $this->price;
        $this->item->type_id = $this->type;
        try{
            $this->item->save();
            session()->flash('success-message', 'Saved!');
            return redirect()->route('items');
        }
        catch (ModelNotFoundException $exception){
             session()->flash('success-message', 'Failed to saved item');
            return redirect()->route('items.item');
        }
    }
}
