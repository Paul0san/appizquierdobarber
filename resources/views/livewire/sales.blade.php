<div>
    <div class="container px-6 mx-auto sm:grid">
      <div>
        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Ventas
        </h2>
      </div>
        <div class="flex sm:justify-between">
            
              <div class="block">
                <div class=" flex pt-4">
                  <div class="mr-4">
                    @livewire('create-sale')
                  </div>

                </div>

                <div class="pb-4 sm:hidden">
                  <div class="my-2 sm:flex-row flex-col justify-end">
                    <div class="flex flex-col sm:flex-row mb-1 sm:mb-2">
                      <div class=" justify-items-center mt-4 mr-4 text-white dark:text-gray-300">
                        Filtros
                      </div>
                        <div class="relative dark:bg-gray-800">
                            <select
                                wire:model="barberSelected"
                                class="h-full rounded-l border block w-full dark:text-gray-300 form-select dark:border-gray-600 dark:bg-gray-700 bg-white border-gray-400 text-gray-700 py-2 px-4 pr-16 leading-tight focus:outline-none  focus:border-gray-500">
                                <option value="">Todos</option>
                                @foreach ($barbers as $barbero)
                                <option value="{{$barbero->id}}">{{$barbero->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative">
                            <input 
                            wire:model="daySelected"
                            type="date" class="h-full rounded-r border-t sm:rounded-r sm:border-r border-r border-b block w-full dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 bg-white border-gray-400 text-gray-700 py-2 px-4 pr-6 leading-tight focus:outline-none focus:border-l focus:border-r focus:border-gray-500 " />                  
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          
          
          <div class="hidden sm:block my-2 sm:flex-row justify-end">
            <div class="flex flex-col sm:flex-row mb-1 sm:mb-2">
              <div class="justify-items-center mt-2 mr-4 text-white dark:text-gray-300">
                Filtros
              </div>
                <div class="relative dark:bg-gray-800">
                    <select
                        wire:model="barberSelected"
                        class="h-full rounded-l border block w-full dark:text-gray-300 form-select dark:border-gray-600 dark:bg-gray-700 bg-white border-gray-400 text-gray-700 py-2 px-4 pr-16 leading-tight focus:outline-none  focus:border-gray-500">
                        <option value="">Todos</option>
                        @foreach ($barbers as $barbero)
                        <option value="{{$barbero->id}}">{{$barbero->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative">
                    <input 
                    wire:model="daySelected"
                    type="date" class="h-full rounded-r border-t sm:rounded-r sm:border-r border-r border-b block w-full dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 bg-white border-gray-400 text-gray-700 py-2 px-4 pr-6 leading-tight focus:outline-none focus:border-l focus:border-r focus:border-gray-500 " />                  
                </div>
            </div>
          </div>
        </div>
        <!-- Tabla -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr
                  class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                  <th class="px-4 py-3">Servicios o productos</th>
                  <th class="px-4 py-3 text-center">Cantidad</th>
                  <th class="px-4 py-3 text-center">Hora y fecha</th>
                  <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
              </thead>
              <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
              >
                @forelse ($sales as $sale)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div>
                        <p class="font-semibold mb-2">{{$sale->user->name}}</p>

                        @foreach ($sale->services as $service)
                          <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{$service->service_name}}
                          </p
                        @endforeach
                        >

                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm  text-center">
                    $ {{ number_format($sale->total, 2) }}
                  </td>
                  <td class="px-4 py-3 text-sm capitalize text-center">
                    {{Date::parse($sale->created_at)->format('l j \\de F Y h:i A')}}
                  </td>
                  <td class="px-4 py-3 text-center">
                    <div class="flex items-center text-sm justify-center">
                      <button
                      title="Eliminar Venta"
                      wire:loading.attr="disabled" wire:target="deleteSale"
                      wire:click="deleteSale({{$sale->id}})"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Delete"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                      {{-- <button
                      title="Editar"
                      wire:click="#"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Delete"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                      </button> --}}
                    </div>
                  </td>
                </tr>
                @empty
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    
                  </td>
                  
                  <td class="px-4 py-3 text-sm">
                    No hay ventas aun...
                  </td>
                  <td class="px-4 py-3 text-sm">
                  </td>
                  <td class="px-4 py-3 text-sm">
                  </td>
                </tr>
                @endforelse

              </tbody>
            </table>
          </div>
          <div
            class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 border-t bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800" >
            {{$sales->links()}}
          </div>
        </div>
</div>
</div>
