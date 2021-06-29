<div>
    <button 
        x-data="{ isModalOpen: @entangle('modalOpen') }"
        @click="isModalOpen = true"
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        + Nueva venta
    </button>

    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div
    x-data="{ isModalOpen: @entangle('modalOpen') }"
    x-show="isModalOpen"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed overflow-y-auto inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    >
    <!-- Modal -->
    <div class="absolute inset-y-0">
        <div
    x-data="{ isModalOpen: @entangle('modalOpen') }"
    x-show="isModalOpen"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 transform translate-y-1/2"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0  transform translate-y-1/2"
    @click.away="isModalOpen = false"
    @keydown.escape="closeModal"
    class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
    role="dialog"
    id="modal">
    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
    <header class="flex justify-end">
        
        <button
        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
        aria-label="close"
        x-data="{ isModalOpen: @entangle('modalOpen') }"
        @click="isModalOpen = false"
        >
        <svg
            class="w-4 h-4"
            fill="currentColor"
            viewBox="0 0 20 20"
            role="img"
            aria-hidden="true"
        >
            <path
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
            fill-rule="evenodd"
            ></path>
        </svg>
        </button>
    </header>
    <!-- Modal body -->
    <div class="mt-4 mb-6">
        <!-- Modal title -->
        <p
        class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"
        >
        Registrar nueva venta
        </p>
        
        <!-- Modal description -->
        <p class="text-xs text-gray-700 dark:text-gray-400">
        Recuerda añadir todos los productos y servicios ofrecidos, asi como la persona que atendió al cliente
        </p>
        <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"            >
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Barber que atendió</span>
                    <select wire:model="barbero" name="barber" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @foreach ($barbers as $barber)

                        <option value="{{$barber->id}}">{{$barber->name}}</option>
                            
                        @endforeach
                    </select>
                </label>

                <div class="mt-4 text-sm dark:text-gray-300">
                    <table id="products_table">
                    <thead>
                    <tr class="text-left">
                        <th style="font-weight: normal; color:#9e9e9e">Servicio o producto</th>
                        <th style="font-weight: normal; color:#9e9e9e">Cantidad</th>
                        {{-- <th></th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderProducts as $index => $orderProduct)
                        <tr>
                            <td>
                                <select name="orderProducts[{{$index}}][service_id]"
                                        wire:model="orderProducts.{{$index}}.service_id"
                                        class="block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    @foreach ($servicios as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->service_name }} (${{ number_format($product->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" min="1" max="10" step="1"
                                        id="inputBox"
                                        name="orderProducts[{{$index}}][quantity]"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input "
                                        wire:model="orderProducts.{{$index}}.quantity" />
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeProduct({{$index}})">Quitar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addProduct">+ Agregar otro</button>
                    </div>
                </div>
                </div>

                {{-- <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                    {{json_encode($serviciosItems,TRUE)}}
                    </span>
                </div> --}}

                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400">Sub Total</span>
                    <!-- focus-within sets the color for the icon when input is focused -->
                    <div
                    class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                    >
                    <input
                        readonly
                        name="subtotal"
                        wire:model="subtotal"
                        type="number" value="{{$subtotal}}"
                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        placeholder="{{$subtotal}}"
                    />
                    
                    <div
                        class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    </div>
                </label>

                

                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400">Descuento</span>
                    <!-- focus-within sets the color for the icon when input is focused -->
                    <div
                    class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                    >
                    <input
                    name="descuento"
                    wire:model="descuento"
                    value="{{$descuento}}"
                        type="number" min="0" max="100" step="5"
                        id="inputBox"
                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        placeholder="{{$descuento}}"
                    />
                    <div
                        class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                    </svg>
                    </div>
                    </div>
                </label>

                <div class="mt-4 text-sm">
                    <div class="mt-2">
                    <button
                    wire:click="calculateTotal"
                    class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Calcular total
                    </button>
                    
                    </div>
                </div>

                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400">Total</span>
                    <!-- focus-within sets the color for the icon when input is focused -->
                    <div
                    class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                    >
                    <input
                    name="total"
                        readonly
                        wire:model="total"
                        value="{{$total}}"
                        type="number"
                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        placeholder="{{$total}}"
                    />
                    <div
                        class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    </div>
                </label>

                
                </div>
    </div>
    <footer
        class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
    >

        <button
        x-data="{ isModalOpen: @entangle('modalOpen') }"
        @click="isModalOpen = false"
        class="w-full px-5 py-3 text-sm font-medium leading-5 dark:text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
        >
        Cancelar
        </button>

        <button
        wire:loading.remove wire:target="addSale"
        wire:click="addSale"
        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
        Registrar
        </button>
    </footer>
    </div>
    </div>
    </div>
    <!-- End of modal backdrop -->
</div>
