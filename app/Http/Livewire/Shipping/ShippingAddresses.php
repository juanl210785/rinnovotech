<?php

namespace App\Http\Livewire\Shipping;

use App\Enums\TypeOfDocuments;
use App\Enums\TypeOfPhone;
use App\Models\Address;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class ShippingAddresses extends Component
{
    public $addresses;

    public $newAddress = false;

    public $createAddress = [
        'type' => '',
        'description' => '',
        'estado' => '',
        'reference' => '',
        'receiver' => 1,
        'receiver_info' => [],
        'default' => false,
    ];

    public $editAddress = [
        'id' => '',
        'type' => '',
        'description' => '',
        'estado' => '',
        'reference' => '',
        'receiver' => 1,
        'receiver_info' => [],
        'default' => false,
    ];

    public function mount()
    {
        $this->addresses = Address::where('user_id', auth()->id())->get();
        $this->createAddress['receiver_info'] = [
            'name' => auth()->user()->name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone_type' => auth()->user()->phone_type,
            'phone_number' => auth()->user()->phone_number,
        ];
    }

    public function saveAddress()
    {

        $validated = $this->validate([
            'createAddress.type' => 'required|in:1,2',
            'createAddress.description' => 'required|string',
            'createAddress.estado' => 'required|string',
            'createAddress.reference' => 'required|string',
            'createAddress.receiver' => 'required|in:1,2',
            'createAddress.receiver_info' => 'required|array',
            'createAddress.default' => 'required|boolean',
            'createAddress.receiver_info.name' => 'required|string',
            'createAddress.receiver_info.last_name' => 'required|string',
            'createAddress.receiver_info.document_type' => [
                'required',
                new Enum(TypeOfDocuments::class)
            ],
            'createAddress.receiver_info.document_number' => 'required|integer|digits_between:6,8',
            'createAddress.receiver_info.phone_type' => [
                'required',
                new Enum(TypeOfPhone::class)
            ],
            'createAddress.receiver_info.phone_number' => 'required|integer|digits:7',
        ], [
            'createAddress.receiver_info.document_number.digits_between' => 'El campo Cedula/RIF debe tener entre 6 y 8 dígitos numéricos.',
            'createAddress.receiver_info.phone_number.digits' => 'El campo Teléfono debe contener exactamente 7 dígitos numéricos.'
        ], [
            'createAddress.type' => 'Tipo de dirección',
            'createAddress.description' => 'Dirección',
            'createAddress.estado' => 'Estado',
            'createAddress.reference' => 'Referencia',
            'createAddress.receiver' => 'Receptor',
            'createAddress.receiver_info.name' => 'Nombre',
            'createAddress.receiver_info.last_name' => 'Apellido',
            'createAddress.receiver_info.document_type' => 'Tipo de documento',
            'createAddress.receiver_info.document_number' => 'Cedula/RIF',
            'createAddress.receiver_info.phone_type' => 'Operadora',
            'createAddress.receiver_info.phone_number' => 'Teléfono',
        ]);

        //dd($validated);

        if (auth()->user()->addresses->count() === 0) {
            $this->createAddress['default'] = true;
        }

        Address::create([
            'user_id' => auth()->id(),
            'type' => $this->createAddress['type'],
            'description' => $this->createAddress['description'],
            'estado' => $this->createAddress['estado'],
            'reference' => $this->createAddress['reference'],
            'receiver' => $this->createAddress['receiver'],
            'receiver_info' => $this->createAddress['receiver_info'],
            'default' => $this->createAddress['default'],
        ]);

        $this->reset();

         $this->addresses = Address::where('user_id', auth()->id())->get();
         $this->createAddress['receiver_info'] = [
            'name' => auth()->user()->name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone_type' => auth()->user()->phone_type,
            'phone_number' => auth()->user()->phone_number,
        ];

        $this->newAddress = false;

        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Datos agregados!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function edit($id)
    {
        $address = Address::find($id);
        $this->editAddress['id'] = $address->id;
        $this->editAddress['type'] = $address->type;
        $this->editAddress['description'] = $address->description;
        $this->editAddress['estado'] = $address->estado;
        $this->editAddress['reference'] = $address->reference;
        $this->editAddress['receiver'] = $address->receiver;
        $this->editAddress['receiver_info'] = $address->receiver_info;
        $this->editAddress['default'] = $address->default;
    }

    public function updateAddress()
    {
        $validated = $this->validate([
            'editAddress.type' => 'required|in:1,2',
            'editAddress.description' => 'required|string',
            'editAddress.estado' => 'required|string',
            'editAddress.reference' => 'required|string',
            'editAddress.receiver' => 'required|in:1,2',
            'editAddress.receiver_info' => 'required|array',
            'editAddress.default' => 'required|boolean',
            'editAddress.receiver_info.name' => 'required|string',
            'editAddress.receiver_info.last_name' => 'required|string',
            'editAddress.receiver_info.document_type' => [
                'required',
                new Enum(TypeOfDocuments::class)
            ],
            'editAddress.receiver_info.document_number' => 'required|integer|digits_between:6,8',
            'editAddress.receiver_info.phone_type' => [
                'required',
                new Enum(TypeOfPhone::class)
            ],
            'editAddress.receiver_info.phone_number' => 'required|integer|digits:7',
        ], [
            'editAddress.receiver_info.document_number.digits_between' => 'El campo Cedula/RIF debe tener entre 6 y 8 dígitos numéricos.',
            'editAddress.receiver_info.phone_number.digits' => 'El campo Teléfono debe contener exactamente 7 dígitos numéricos.'
        ], [
            'editAddress.type' => 'Tipo de dirección',
            'editAddress.description' => 'Dirección',
            'editAddress.estado' => 'Estado',
            'editAddress.reference' => 'Referencia',
            'editAddress.receiver' => 'Receptor',
            'editAddress.receiver_info.name' => 'Nombre',
            'editAddress.receiver_info.last_name' => 'Apellido',
            'editAddress.receiver_info.document_type' => 'Tipo de documento',
            'editAddress.receiver_info.document_number' => 'Cedula/RIF',
            'editAddress.receiver_info.phone_type' => 'Operadora',
            'editAddress.receiver_info.phone_number' => 'Teléfono',
        ]);

        $address = Address::find($this->editAddress['id']);

        $address->update([            
            'type' => $this->editAddress['type'],
            'description' => $this->editAddress['description'],
            'estado' => $this->editAddress['estado'],
            'reference' => $this->editAddress['reference'],
            'receiver' => $this->editAddress['receiver'],
            'receiver_info' => $this->editAddress['receiver_info'],
            'default' => $this->editAddress['default'],
        ]);

        $this->reset();

        $this->addresses = Address::where('user_id', auth()->id())->get();

         $this->createAddress['receiver_info'] = [
            'name' => auth()->user()->name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone_type' => auth()->user()->phone_type,
            'phone_number' => auth()->user()->phone_number,
        ];
        
        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Datos actualizados!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function destroyAddress($id){

        $address = Address::find($id);

        $address->delete();

        $this->addresses = Address::where('user_id', auth()->id())->get();
        
        if ($this->addresses->count() > 0 && $this->addresses->where('default', true)->count() == 0) {
            $this->addresses->first()->update(['default' => true]);
        }

        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Datos eliminados!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function setDefaultAddress($id){
        $this->addresses->each(function($address) use ($id) {
            $address->update([
                'default' => $address->id == $id
            ]);
        });
    }

    public function render()
    {
        return view('livewire.shipping.shipping-addresses');
    }
}
