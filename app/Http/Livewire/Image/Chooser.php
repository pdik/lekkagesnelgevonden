<?php

namespace App\Http\Livewire\Image;

use Livewire\Component;

class Chooser extends Component
{
    public $files, $index;
    public function render()
    {
        return view('livewire.image.chooser');
    }
}
