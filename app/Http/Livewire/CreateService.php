<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateService extends Component
{
    public $modalOpen = false;
    public $name, $price;

    protected $rules = [
        'name' => 'required|max:100',
        'price' => 'required',
    ];

    public function updated($propName){
        $this->validateOnly($propName);
    }

    public function addService(){

        $this->validate();
        Service::create([
            'service_name' => $this->name,
            'price' => $this->price,
            'slug' => Str::slug($this->name),
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombres-texturizado-cabello-largo-peinado-arreglado-2.jpg'
        ]);

        $this->reset(['modalOpen','name','price']);
        //Emite un evento para renderizar los registros
        $this->emitTo('services','render');
        //Emite un evento para mostrar una alerta
        $this->emit('alert','Servicio agregado');

    }

    public function render()
    {
        return view('livewire.create-service');
    }
}
