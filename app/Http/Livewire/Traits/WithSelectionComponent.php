<?php
namespace App\Http\Livewire\Traits;
trait WithSelectionComponent

{
    public function __construct()
    {
    $this->listeners = ['updateValues' => 'updateValues'];
    }

    public function updateValues($values)
    {
      // dd($values);
        foreach ($values as $key => $value){
        $this->$key = $value;
        }
    }
}
