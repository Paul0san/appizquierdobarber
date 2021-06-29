<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithPagination;

class MainPanel extends Component
{

    use WithPagination;

    public $balance = 0;
    public $clients = 0;
    public $today;

    public function mount(){
        $today = Carbon::now();

        $salesToday = Sale::whereDate('created_at', $today)->get();
        
        foreach ($salesToday as $sale) {
            $this->balance = $this->balance + $sale->total;
        }

        $clients = $salesToday->count();
        $this->clients = $clients;

    }


    public function render()
    {
        Date::setLocale('es');
        $hoy = Carbon::now()->toDayDateTimeString();
        $sales = Sale::orderBy('created_at', 'desc')->paginate('3');
        return view('livewire.main-panel',compact('hoy','sales'));
    }

    public function deleteSale($id){
        $sale = Sale::findOrFail($id);
        $sale->delete();

        $this->emit('alert','Registro eliminado');
    }
}
