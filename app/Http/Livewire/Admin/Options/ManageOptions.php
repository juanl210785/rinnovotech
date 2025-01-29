<?php

namespace App\Http\Livewire\Admin\Options;

use App\Models\Feature;
use App\Models\Option;
use Livewire\Component;

class ManageOptions extends Component
{

    public $options;
    public $openModal = false;
    public $newOption = [
        'name' => '',
        'type' => 1,
        'features' => [
            [
                'value' => '',
                'description' => '',
            ],
        ]
    ];

    public $receivedMessage;

    protected $listeners = ['featureAdded', 'featureRemoved'];


    protected $validationAttributes = [
        'newOption.name' => 'nombre',
        'newOption.type' => 'tipo',
        'newOption.features' => 'valores',
    ];

    public function mount()
    {
        $this->options = Option::with('features')->get();
    }

    public function featureAdded()
    {
        $this->options = Option::with('features')->get();
        //fa-circle-check
        //fa-circle-xmark
        //text-danger
        //text-primary
        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Valor ha sido creado!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function featureRemoved()
    {
        $this->options = Option::with('features')->get();

        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Valor ha sido eliminado!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);

        $this->render();
    }

    public function addFeature()
    {
        $this->newOption['features'][] = [
            'value' => '',
            'description' => ''
        ];

        $this->emit('newOptionUpdated');
    }

    public function removeFeature($index)
    {
        unset($this->newOption['features'][$index]);
        $this->newOption['features'] = array_values($this->newOption['features']);
    }

    public function addOption()
    {
        $rules = [
            'newOption.name' => 'required',
            'newOption.type' => 'required|in:1,2',
            'newOption.features' => 'required|array|min:1',
        ];

        foreach ($this->newOption['features'] as $index => $feature) {
            if ($this->newOption['type'] == 1) {
                $rules['newOption.features.' . $index . '.value'] = 'required';
            } else {
                //Color
                $rules['newOption.features.' . $index . '.value'] = 'required|regex:/^#[af0-9]{6}$/i';
            }

            $rules['newOption.features.' . $index . '.description'] = 'required|max:255';

            $this->validationAttributes['newOption.features.' . $index . '.value'] = 'valor ' . $index + 1;
            $this->validationAttributes['newOption.features.' . $index . '.description'] = 'descripción ' . $index + 1;
        }

        $this->validate($rules);

        $option = Option::create([
            'name' => $this->newOption['name'],
            'type' => $this->newOption['type'],
        ]);

        foreach ($this->newOption['features'] as $feature) {
            $option->features()->create([
                'value' => $feature['value'],
                'description' => $feature['description'],
            ]);
        }

        $this->options = Option::with('features')->get();

        $this->reset('openModal', 'newOption');

        session()->flash('notification', [
            'clase' => 'text-success',
            'lucide' => 'check-circle',
            'title' => 'Éxito',
            'message' => '¡Opción ha sido creada!'
        ]);

        redirect()->route('admin.options.index');
    }

    public function deleteFeature(Feature $feature)
    {
        $feature->delete();

        $this->emit('featureRemoved');
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
