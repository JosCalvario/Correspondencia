<button type="button" data-modal-toggle="{{ $createModalId }}"
     class="flex items-center justify-center text-white bg-sc_greeny hover:bg-primary-800 focus:border-sc_greener focus:ring-sc_greener font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 h-10">
     <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
      aria-hidden="true">
      <path clip-rule="evenodd" fill-rule="evenodd"
       d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
     </svg>
     {{ $slot }}
    </button>