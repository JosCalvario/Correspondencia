<x-app-layout>

 <div tabindex="-1" aria-hidden="true"
  class="m-0 overflow-y-auto overflow-x-hidden right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
  <div class="relative w-full h-full">
   <!-- Modal content -->
   <div class="relative p-4 bg-white h-[calc(100vh-8rem)] rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-y-auto">
    <!-- Modal header -->
    <div class="flex justify-start items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
     <button type="button"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 mr-2 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
      <i class="bi bi-chevron-left"></i>
      <span class="sr-only">Close modal</span>
     </button>
     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
      Asignar rol
     </h3>

    </div>
    <!-- Modal body -->
    <form class=" w-full h-[calc(100%-5rem)]" action="{{ route('users.updateRoles') }}" method="POST">
     @csrf
     @method('PUT')
     <input type="hidden" name="user_id" value="{{ $user->id }}">
     <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Selecciona los roles</h3>
     <div class="grid gap-4 mb-4 sm:grid-cols-2">
      <ul
       class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
       @foreach ($roles as $role)
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 relative">
         <div class="flex items-center pl-3">
          <input type="checkbox" name="roles[]" value="{{ $role->id }}"
           {{ $user->hasRole($role->name) ? 'checked' : '' }}
           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="vue-checkbox"
           class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
         </div>
        </li>
        
       @endforeach
      </ul>
     </div>
     <div class="flex items-center space-x-4 p-5 justify-end m-0">
      <button type="submit"
       class="text-white bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
       Actualizar
      </button>
     </div>

    </form>
   </div>
  </div>
 </div>

</x-app-layout>
