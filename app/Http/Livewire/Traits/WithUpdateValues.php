<?php
namespace App\Http\Livewire\Traits;

trait WithUpdateValues
{
  public function __construct()
    {
    $this->listeners = ['updateValues' => 'updateValues', 'addItemToArray'=> 'addItemToArray', 'removeIndexArray' => 'removeIndexArray'];
    }

    public function updateValues($values)
    {

        foreach ($values as $key => $value){
        $this->$key = $value;

        }
    }
    public function addItemToArray($values)
    {
      // dd($values);
        foreach ($values as $key => $value){
        $this->$key[] = $value;
        }
    }
    public function removeIndexArray($values)
    {
      // dd($values);
        foreach ($values as $key => $value){
        $this->$key[] = $value;
        }
    }

}
