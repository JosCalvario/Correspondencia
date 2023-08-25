@props(['title', 'search' => 'true', 'add' => 'true', 'actions' => 'false', 'filters' => 'false'])

<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
 <h2 class="text-lg pt-4 pl-4 font-medium text-gray-900 dark:text-white">{{ $title }}</h2>
 <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

  <div class="w-full md:w-1/2">
   @if ($search == 'true')
    {{ $searchInput}}
   @endif
  </div>
  <div
   class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

   {{-- Botón agregar --}}
   @if ($add == 'true')
    {{ $addbutton }}
   @endif


   <div class="flex items-center space-x-3 w-full md:w-auto">
    @if ($actions == 'true')
     {{$actionsSelect}}
    @endif

    @if ($filters == 'true')
    {{$filtersSelect}}
    @endif


   </div>
  </div>
 </div>
 @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
 @endforeach

 {{-- Modal agregar --}}
 {{ $Modal }}

 <div class="overflow-x-auto">

  {{-- Tabla --}}
  {{ $Table }}
 </div>
 <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
  aria-label="Table navigation">
  {{ $navigation }}
 </nav>
</div>
