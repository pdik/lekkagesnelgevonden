<?php
namespace App\Http\Livewire\Traits;
trait WithUpdate

{
    public function __construct()
    {
    $this->listeners = ['update'=> 'update'];
    }

    public function update($values){
          foreach ($values as $key => $data){
              ////dd($key);
              if($key ==='array'){
                $this->$key[] = $data;
              }else if($key === 'value'){
                $this->$key = $data;
              }
               $this->$key = $data;

          }
    }
}
