<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CreateReport extends Component
{
    public $modalOpen = false;


    public function render()
    {
        $barbers = User::where('type','barber')->get();
        return view('livewire.create-report',compact('barbers'));
    }
}
