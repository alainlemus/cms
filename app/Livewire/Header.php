<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        //return view('livewire.header');
        return view('livewire.header')->with('layout', 'filament::components.layouts.app');
    }
}
