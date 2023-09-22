<div>
 <td data-label="Roles"
  class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none px-2 sm:px-o py-3 sm:table-cell block before:block before:font-semibold">
  <button wire:click="$set('open',true)" type="button"
   class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer ">Editar</button>
 </td>

 <div wire:model="open" tabindex="-1" aria-hidden="true"
  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
  <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
   <!-- Modal content -->
   <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
      Asignar rol
     </h3>
     <button type="button"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
       xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd"
        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
      </svg>
      <span class="sr-only">Close modal</span>
     </button>
    </div>
    <!-- Modal body -->
    <form action="{{ route('users.updateRoles') }}" method="POST">
     @csrf
     @method('PUT')
     <input type="hidden" name="user_id" value="{{ $user->id }}">
     <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Selecciona los roles</h3>
     <div class="grid gap-4 mb-4 sm:grid-cols-2">
      <ul
       class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
       @foreach ($roles as $role)
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
         <div class="flex items-center pl-3">
          {{-- <input type="checkbox" name="roles[]" value="{{ $role->id }}"
           {{ $user->hasRole($role->name) ? 'checked' : '' }}
           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="vue-checkbox"
           class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label> --}}
         </div>
        </li>
       @endforeach
      </ul>
     </div>
     <div class="flex items-center space-x-4">
      <button type="submit"
       class="text-white bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
       Actualizar
      </button>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
