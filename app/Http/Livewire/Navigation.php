<?php

namespace App\Http\Livewire;

use App\Models\Family;
use Livewire\Component;

class Navigation extends Component
{
    public $families;

    public function mount()
    {
        $this->families = Family::all();
    }
    public function render()
    {
        return view('livewire.navigation');
    }
}
