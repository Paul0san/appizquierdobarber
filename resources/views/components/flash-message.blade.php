@if ($message = Session::get('success'))
<div class="rounded-md flex items-end px-5 py-4 mb-2 bg-theme-18 text-theme-9 float-right md:float-left alert">
    <i data-feather="check-circle" class="w-6 h-6 mr-2"></i> {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6 float-right md:float-left alert">
    <i data-feather="x" class="w-6 h-6 mr-2"></i> {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11 float-right md:float-left alert">
    <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10 float-right md:float-left alert">
    <i data-feather="check-circle" class="w-6 h-6 mr-2"></i> {{ $message }}
</div>
@endif

@if ($errors->any())
<div class="rounded-md flex items-center px-5 py-4 mb-2 border text-gray-700 dark:text-gray-300 dark:border-dark-5 float-right md:float-left alert">
    <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{ $message }}
</div>
@endif
