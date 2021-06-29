<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class CreateSale extends Component
{

    public $modalOpen = false;
    public $qty;
    public $subtotal = 0;
    public $descuento = 0;
    public $cantidadDescuento = 0;
    public $total = 0;
    public $orderProducts = [];
    public $barbero = 3;
    

    public function mount()
    {
        $this->orderProducts = [
            ['service_id' => '1', 'quantity' => 1]
        ];
    }
    
    public function addSale(){

        $this->subtotal= 0;
        if ($this->orderProducts == []) {
            $this->orderProducts = [
                ['service_id' => '1', 'quantity' => 1]
            ];
        }
        // Calcula el subtotal
        $selected = $this->orderProducts;
        
        foreach ($selected as $item) {
            $servicio = Service::findOrFail($item['service_id']);            
            $this->subtotal = $this->subtotal + $servicio->price * $item['quantity'];
        }

        // Calcula el total
        $cantidadDescuento = $this->subtotal * $this->descuento/100;
        $this->total = $this->subtotal - $cantidadDescuento;

        // Proceso de registro de venta
        $sale = Sale::create([
            'subtotal' => $this->subtotal,
            'discount' => $this->descuento,
            'total' => $this->total,
            'user_id' => $this->barbero
        ]);

        foreach ($this->orderProducts as $product) {
            $sale->services()->attach($product['service_id'],
            ['quantity' => $product['quantity']]);
        }
        // Resetea a los valores por defecto

        $this->reset(['modalOpen']);
        $this->subtotal=0;
        $this->descuento= 0;
        $this->total=0;
        $this->orderProducts = [
            ['service_id' => '1', 'quantity' => 1]
        ];

        //Emite un evento para renderizar los registros
        $this->emitTo('sales','render');
        //Emite un evento para mostrar una alerta
        $this->emit('alert','Venta agregada');

    }

    public function render()
    {

        
        // Verifica si el input está vacío, y calcula el total
        if ($this->descuento == "") {
            $this->descuento = 0;
            $cantidadDescuento = $this->subtotal * $this->descuento/100;
            $this->total = $this->subtotal - $cantidadDescuento;
        }else{
            $cantidadDescuento = $this->subtotal * $this->descuento/100;
            $this->total = $this->subtotal - $cantidadDescuento;
        }

        info($this->orderProducts);

        $servicios = Service::all();
        $barbers = User::where('type','barber')->get();
        return view('livewire.create-sale',compact('servicios','barbers'));
    }

    public function addService($index){
        $servicio = Service::find($index);
        $this->orderProducts[] = ['service_id' => $servicio->id, 'service_name' => $servicio->service_name];
        
        $this->subtotal = $this->subtotal + $servicio->price;
        // $this->serviciosAgregados = Arr::prepend($this->serviciosAgregados,$servicio->service_name);
        // dd($this->serviciosAgregados);

    }

    public function calculateTotal(){
        
        $this->subtotal= 0;
        $selected = $this->orderProducts;
        // dd($selected);
        foreach ($selected as $item) {
            $servicio = Service::findOrFail($item['service_id']);
            // $query = DB::table('Services')->whereIn('id',$item->service_id)->get();
            
            $this->subtotal = $this->subtotal + $servicio->price * $item['quantity'];
        }

        $cantidadDescuento = $this->subtotal * $this->descuento/100;
        $this->total = $this->subtotal - $cantidadDescuento;
        
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['service_id' => '1', 'quantity' => 1];
        
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);


    }
}
