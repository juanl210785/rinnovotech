<?php

namespace App\Http\Livewire\Admin\Options;

use App\Models\Option;
use Livewire\Component;

class AddNewFeature extends Component
{

    public $option;

    public $newFeature = [
        'value' => '',
        'description' => '',
    ];

    public function mount(Option $option)
    {
        $this->option = $option;
    }

    public function AddFeature()
    {
        $this->validate([
            'newFeature.value' => 'required',
            'newFeature.description' => 'required',
        ], [], [
            'newFeature.value' => 'valor',
            'newFeature.description' => 'descripción',
        ]);

        $this->option->features()->create($this->newFeature);

        $this->reset('newFeature');

        $this->emit('featureAdded');
    }

    public function render()
    {
        return view('livewire.admin.options.add-new-feature');
    }
}
