<button id="filterDropdownButton" data-dropdown-toggle="{{$dropDownId}}"
      class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-sc_green focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-1  focus:border-sc_greener focus:ring-sc_greener dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 h-10"
      type="button">
      <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-sc_green" viewbox="0 0 20 20"
       fill="currentColor">
       <path fill-rule="evenodd"
        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
        clip-rule="evenodd" />
      </svg>
      Filtros
      <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
       aria-hidden="true">
       <path clip-rule="evenodd" fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
      </svg>
     </button>
     <div id="{{$dropDownId}}" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">

      <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
       {{$filterOptions}}
      </ul>
     </div>