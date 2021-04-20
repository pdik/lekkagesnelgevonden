<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Report\Explanation;
use App\Http\Livewire\Traits\WithUpdate;

use App\Http\Livewire\Traits\WithUpdateValues;
use App\Models\Items;
use Livewire\Component;
class Chooser extends Component
{

    /**
     * Selected array
     */

    public $selected = [];
    public $allItems = [];

    /**
     * Search Items.
     *
     * @var string
     */
    public $search = '';



    /**
     * New method value
     *
     * @var string
     */
    public $name = '';


    /**
     * Render the component.
     *
     * @return View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.chooser');
    }

    public function getSelectedId(){
          $selected = [];
        if(is_array($this->selected)){
            if(count($this->selected) >= 1) {
                foreach ($this->selected as $select) {
                    $selected[] = $select['id'];
                }
            }
              else{
                  $selected = [];
                }
        }
        return $selected;
    }
    public function searching(){
        $this->allItems = Items::Byname($this->search,$this->getSelectedId());
        return  $this->allItems;
    }
    public  function select($id){
        $key = $this->searchForId($id, $this->selected);
        if(isset($key)){

        }else{
          $this->search = null;
          $this->selected[] =Items::find($id)->only('name','id');
          $this->searching();
          $this->dispatchBrowserEvent('additem', $this->getSelected());
        }
    }
    public function unselect($id){

       $key = $this->searchForId($id, $this->selected);
        if(isset($key)){
             unset($this->selected[$key]);
            $this->selected = array_values($this->selected);
        }
       $this->searching();
        $this->dispatchBrowserEvent('additem', $this->getSelected());
    }
    private function getSelected(){
          $selected = [];
        if(is_array($this->selected)){
            if(count($this->selected) >= 1) {
                foreach ($this->selected as $select) {
                    $selected[] = $select;
                }
            }
              else{
                  $selected = [];
                }
        }
        return $selected;
    }
    private function searchForId($id, $array) {
       foreach ($array as $key => $val) {
           if ($val['id'] === $id) {
               return $key;
           }
       }
       return null;
    }


      /**
     * Mount component.
     *

     */
    public function mount()
    {
         $this->allItems =Items::Byname();
    }
}
