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

    protected $listeners = ['featureAdded'];


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
        //Validamos las entradas
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

        $this->dispatchBrowserEvent('showNotification', [
            'message' => 'Opción ha sido creada!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function deleteFeature(Feature $feature)
    {
        $feature->delete();

        $this->options = Option::with('features')->get();

        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Valor ha sido eliminado!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function deleteOption(Option $option)
    {
        $option->delete();

        $this->options = Option::with('features')->get();

        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Opción ha sido eliminada!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
