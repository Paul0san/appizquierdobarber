<div>
    <button 
        x-data="{ isModalOpen: @entangle('modalOpen') }"
        @click="isModalOpen = true"
        class="px-4 py-2 text-sm font-medium leading-5 dark:text-white text-gray-700 transition-colors duration-150 bg-gray-50 dark:bg-gray-900 border dark:border-gray-700 border-gray-900 rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Generar reporte
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
        Reporte de ventas
        </p>
        
        <!-- Modal description -->
        <p class="text-xs text-gray-700 dark:text-gray-400">
        Puedes generar un reporte de ventas general (de todos los barbers) o puedes especificar, puedes generarlo por día en especifico o en un rango de fechas predeterminado.
        </p>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Barber</span>
                <select wire:model="barbero" name="barber" class="block w-full mt-1 mb-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="">Todos</option>
                    @foreach ($barbers as $barber)

                    <option value="{{$barber->id}}">{{$barber->name}}</option>
                        
                    @endforeach
                </select>
            </label>

              <div class="flex">
                <label class="block text-sm mb-2 mr-4">
                    <span class="text-gray-700 dark:text-gray-400">Inicio</span>
                    <input
                      type="date"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Escribe un correo electronico"
                    />
                  </label>
    
                  <label class="block text-sm mb-2">
                    <span class="text-gray-700 dark:text-gray-400">Fin</span>
                    <input
                      type="date"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Escribe un correo electronico"
                    />
                  </label>
              </div>



        </div>
        
    </div>
    <footer
        class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
    >
        <span wire:loading wire:target="" class="text-white">Cargando . . .</span>

        <button
        x-data="{ isModalOpen: @entangle('modalOpen') }"
        @click="isModalOpen = false"
        class="w-full px-5 py-3 text-sm font-medium leading-5 dark:text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
        >
        Cancelar
        </button>

        <button
        wire:click=""
        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
        Generar
        </button>
    </footer>
    </div>
    </div>
    </div>
    <!-- End of modal backdrop -->
</div>
