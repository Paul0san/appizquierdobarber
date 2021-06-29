<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Support\Carbon;

class Barbers extends Component
{

  
    public $today;
    protected $listeners = ['render', 'deleteBarber'];

    public function mount(){
        $this->today = Carbon::now();
    }

    public function render()
    {

        $barbers = User::where('type','barber')->get();
        return view('livewire.barbers',compact('barbers'));
    }

    public function deleteBarber($id){
        $barber = User::findOrFail($id);
        $barber->delete();

        $this->emit('alert','Registro eliminado');
    }

}
