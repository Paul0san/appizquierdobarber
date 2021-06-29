<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateBarber extends Component
{
    public $modalOpen = false;
    public $name, $email,$nickname;

    protected $rules = [
        'name' => 'required|max:100',
        'nickname' => 'required|max:100',
        'email' => 'required|email'
    ];

    public function updated($propName){
        $this->validateOnly($propName);
    }

    public function addBarber(){

        $this->validate();
        User::create([
            'name' => $this->name,
            'nickname' => $this->nickname,
            'type' => 'barber',
            'email' => $this->email,
            'password' => Hash::make('admin1234')
        ]);

        $this->reset(['modalOpen','name','email','nickname']);
        //Emite un evento para renderizar los registros
        $this->emitTo('barbers','render');
        //Emite un evento para mostrar una alerta
        $this->emit('alert','Barber agregado');

    }
    
    public function render()
    {
        $barbers = User::where('type','barber')->get();
        return view('livewire.create-barber',compact('barbers'));

    }

    
}
