<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Family;
use Livewire\Component;

class Navigation extends Component
{
    public $families;
    public $family_id;

    public function mount()
    {
        $this->families = Family::all();
        $this->family_id = $this->families->first()->id;
    }

    public function getCategoriesProperty() {
        return Category::where('family_id', $this->family_id)->with('subcategories')->get();
    }
    public function render()
    {
        return view('livewire.navigation');
    }
}
