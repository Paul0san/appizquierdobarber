<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Sale;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Date;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class Reports extends Component
{
    use WithPagination;
    public $barberSelected;
    public $dayStart;
    public $dayEnd;


    protected $listeners = ['render' => 'render'];

    public function mount(){
        $this->barberSelected = null;
        $this->dayStart = null;
        $this->dayEnd = null;
    }

    public function render()
    {
        Date::setLocale('es');

        $barbers = User::where('type','barber')->get();

        if ($this->dayStart == null || $this->dayEnd == null) {
            $sales = Sale::orderBy('created_at', 'desc')
                        ->where('user_id','like','%' . $this->barberSelected . '%')
                        ->paginate(8);
        }else{
            $sales = Sale::orderBy('created_at', 'desc')
                        ->where('user_id','like','%' . $this->barberSelected . '%')
                        ->whereDate('created_at','>=' ,$this->dayStart)
                        ->whereDate('created_at','<=' ,$this->dayEnd)
                        ->paginate(8);
        }

        return view('livewire.reports',compact('sales','barbers'));
    }


    public function resetFilters(){
        $this->dayStart = null;
        $this->dayEnd = null;
        $this->barberSelected = null;
    }

    public function goToView(){
        return redirect()->route('reportView');
    }

    public function reportView(Request $request){


        $data = $request->all();
        if ($request->barberSeleccionado == null && $request->fechaInicio == null && $request->fechaFin == null) {
            $sales = Sale::orderBy('created_at', 'desc')->get();
            $barberName = "No especificado";
            $fechaInicio = "No especificada";
            $fechaFin = "No especificada";
        }elseif($request->barberSeleccionado == null && $request->fechaInicio == null)
        {
            $sales = Sale::orderBy('created_at', 'desc')
                        ->whereDate('created_at','<=' ,$request->fechaFin)->get();
            $barberName = "No especificado";
            $fechaInicio = "No especificada";
            $fechaFin = $request->fechaFin;
        }elseif($request->barberSeleccionado == null && $request->fechaFin == null)
        {
            $sales = Sale::orderBy('created_at', 'desc')
                                    ->whereDate('created_at','>=' ,$request->fechaInicio)->get();
            $barberName = "No especificado";
            $fechaInicio = $request->fechaInicio;
            $fechaFin = "No especificada";
        }elseif($request->barberSeleccionado == null)
        {
            $sales = Sale::orderBy('created_at', 'desc')
                                    ->whereDate('created_at','>=' ,$request->fechaInicio)
                                    ->whereDate('created_at','<=' ,$request->fechaFin)->get();
            $barberName = "No especificado";
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;
        }elseif($request->fechaInicio == null && $request->fechaFin == null)
        {
            $sales = Sale::orderBy('created_at', 'desc')
                                    ->where('user_id','=', $request->barberSeleccionado)->get();
            $barber = $request->barberSeleccionado;
            $fechaInicio = "No especificada";
            $fechaFin = "No especificada";
            $barb = User::find($barber);
            $barberName = $barb->name;
        }elseif($request->fechaInicio == null)
        {
            $sales = Sale::orderBy('created_at', 'desc')
                                    ->where('user_id','=', $request->barberSeleccionado)
                                    ->whereDate('created_at','<=' ,$request->fechaFin)->get();

            $barber = $request->barberSeleccionado;
            $fechaInicio = "No especificada";
            $fechaFin = $request->fechaFin;
            $barb = User::find($barber);
            $barberName = $barb->name;

        }elseif($request->fechaFin == null)
        {
            $sales = Sale::orderBy('created_at', 'desc')
                                    ->where('user_id','=', $request->barberSeleccionado)
                                    ->whereDate('created_at','>=' ,$request->fechaInicio)->get();

            $barber = $request->barberSeleccionado;
            $fechaInicio = $request->fechaInicio;
            $fechaFin = "No especificada";
            $barb = User::find($barber);
            $barberName = $barb->name;

        }else {
            $sales = Sale::orderBy('created_at', 'desc')
                                    ->where('user_id','=', $request->barberSeleccionado)
                                    ->whereDate('created_at','>=' ,$request->fechaInicio)
                                    ->whereDate('created_at','<=' ,$request->fechaFin)->get();

            $barber = $request->barberSeleccionado;
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;
            $barb = User::find($barber);
            $barberName = $barb->name;
        }



        $total = 0;
        foreach ($sales as $item) {
            $venta = Sale::findOrFail($item['id']);            
            $total = $total + $item['total'];
        }

        


        $pdf = PDF::loadView('reports.main',compact('sales','barberName','fechaInicio','fechaFin','total'));

        $this->emit('alert','Reporte creado, revisa tus descargas');
        return $pdf->download('reporte.pdf');
    }
}
