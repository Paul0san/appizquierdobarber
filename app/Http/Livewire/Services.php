<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    
    protected $listeners = ['render', 'deleteService'];

    public function render()
    {
        
        $servicios = Service::paginate('6');
        return view('livewire.services',compact('servicios'));
    }

    public function deleteService($id){
        $service = Service::findOrFail($id);
        $service->delete();

        $this->emit('alert','Registro eliminado');
    }
}
