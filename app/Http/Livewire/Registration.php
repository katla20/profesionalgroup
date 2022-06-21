<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Registration extends Component
{

    public $firstName,$lastName;
    
    public function render()
    {
        return view('livewire.registration');
    }

    public function submit() {

      
        dd($this->firstName,$this->lastName);
    }
}
