<div>
    <div class="container px-6 mx-auto grid">
        <h2
          class="mt-6 mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Barbers
        </h2>
        <div class="pb-6">
          @livewire('create-barber')
        </div>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr
                  class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                  <th class="px-4 py-3">Barber</th>
                  <th class="px-4 py-3 text-center">Clientes atendidos</th>
                  <th class="px-4 py-3 text-center">Monto del día</th>
                  <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                @foreach ($barbers as $barber)
                @php
                    $dayTotal = $barber->sales()->whereDate('created_at','=',$today)->sum('total');
                    $todayCount = $barber->sales()->whereDate('created_at','=',$today)->count();
                @endphp
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="pl-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="{{$barber->profile_photo_url}}}"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">{{$barber->name}}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                          {{$barber->email}}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm text-center">
                    {{$todayCount}}
                  </td>
                  <td class="px-4 py-3 text-sm text-center">
                    $ {{ number_format($dayTotal, 2) }}
                  </td>
                  <td class="px-4 py-3 self-center">
                    <div class="flex items-center justify-center text-sm">
                      <button
                      title="Eliminar"
                      {{-- wire:loading.attr="disabled" wire:target="deleteBarber"
                      wire:click="deleteBarber({{$barber->id}})" --}}
                      wire:click="$emit('deleteConfirm',{{$barber->id}})"
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
                @endforeach
              </tbody>
            </table>
          </div>
          {{-- Paginación --}}
        </div>
  </div>
  @push('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Livewire.on('deleteConfirm', barberId =>{
      Swal.fire({
        title: '¿Estás seguro?',
        text: "Se borrarán todos los registros asociados a ese barber",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#24262d',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#7e3af2',
        confirmButtonText: 'Sí, borrar'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emitTo('barbers','deleteBarber', barberId)
        }
      })
    });
  </script>
  @endpush

</div>
