<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Date;

class Sales extends Component
{
    use WithPagination;
    public $barberSelected;
    public $daySelected;


    protected $listeners = ['render' => 'render'];

    public function mount(){
        $this->daySelected = Carbon::now();
    }

    public function render()
    {
        Date::setLocale('es');

        $barbers = User::where('type','barber')->get();

        $sales = Sale::orderBy('created_at', 'desc')
                        ->where('user_id','like','%' . $this->barberSelected . '%')
                        ->whereDate('created_at', $this->daySelected)
                        ->paginate(8);

        return view('livewire.sales',compact('sales','barbers'));
    }

    public function deleteSale($id){
        $sale = Sale::findOrFail($id);
        $sale->delete();

        $this->emit('alert','Registro eliminado');
    }
    


}
