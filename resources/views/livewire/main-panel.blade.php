<div>
    <div class="container px-6 mx-auto grid">
                <h2
                  class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                  Bienvenido {{Auth::user()->name}} !
                </h2>
                <!-- CTA -->
                <div
                  class="flex items-center justify-start p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                >
                  <div class="flex items-center">
                    <span>Datos de hoy: {{Date::parse($hoy)->format('l j \\de F Y h:i A')}}</span>
                  </div>
                </div>
                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                  <!-- Card -->
                  <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                  >
                    <div
                      class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                    >
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                          d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                        ></path>
                      </svg>
                    </div>
                    <div>
                      <p
                        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                      >
                        Clientes atendidos
                      </p>
                      <p
                        class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                      >
                        {{$clients}}
                      </p>
                    </div>
                  </div>
                  <!-- Card -->
                  <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                  >
                    <div
                      class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                    >
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                          fill-rule="evenodd"
                          d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </div>
                    <div>
                      <p
                        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                      >
                        Balance general
                      </p>
                      <p
                        class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                      >
                      $ {{ number_format($balance, 2) }}
                      </p>
                    </div>
                  </div>
                </div>
    
                <div class="flex items-center justify-between mb-4 font-semibold text-gray-700 dark:text-gray-200">
                  <h2 class="text-lg">
                    Última actividad
                    </h2>

                    <a href="{{route('sales')}}" class="text-sm underline">
                      Ver mas ...
                    </a >
                </div>
                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                  <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                      <thead>
                        <tr
                          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                        <th class="px-4 py-3">Servicios o productos</th>
                        <th class="px-4 py-3 text-center">Cantidad</th>
                        <th class="px-4 py-3 text-center">Hora y fecha</th>
                        </tr>
                      </thead>
                      <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                      >

                        @foreach ($sales as $sale)
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
                        </tr>
                        @endforeach

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
