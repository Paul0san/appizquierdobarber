<!DOCTYPE html>
    <html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Panel | Izquierdo Barber</title>
        <link
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"
        />
        <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        
        @livewireStyles

        
      </head>
    <body>
        <div
          class="flex h-screen bg-gray-50 dark:bg-gray-900"
          :class="{ 'overflow-hidden': isSideMenuOpen }"><x-jet-banner />

            <x-desktop-sidebar />
            <x-mobile-sidebar />

            <div class="flex flex-col flex-1 w-full">

                <x-header />

                <!-- Page Content -->
                <main class="h-full overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('modals')
        @livewireScripts
        @stack('js')

    </body>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" ></script>
    <script src="{{asset('assets/js/init-alpine.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          Livewire.on('alert',function(message)
          {
            const Toast = Swal.mixin({
                toast: true,
                background: '#fff',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: message
              })
          })
        </script>
</html>
