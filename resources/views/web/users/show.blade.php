<x-app-layout>
 <div tabindex="-1" aria-hidden="true"
  class="m-0 overflow-y-auto overflow-x-hidden right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
  <!-- Modal content -->
  <div class="relative p-4 bg-white h-[calc(100vh-8rem)] rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-y-auto">
   <!-- Modal header -->
   <div class="flex justify-between mb-4 rounded-t sm:mb-5 w-full">
    <div class="flex justify-start items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600 w-full">
     <a href="{{ route('users.index') }}" type="button"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 mr-2 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
      <i class="bi bi-chevron-left"></i>
      <span class="sr-only">Close modal</span>
     </a>
     <h3 class="font-semibold text-gray-900 dark:text-white">
      Usuario
     </h3>
    </div>
    <div>

    </div>
   </div>
   <dl>
    <x-web.dataTerm>Nombre</x-web.dataTerm>
    <x-web.dataDescription>{{ $user->name }}</x-web.dataDescription>

    <x-web.dataTerm>Email</x-web.dataTerm>
    <x-web.dataDescription>{{ $user->email }}</x-web.dataDescription>

    <x-web.dataTerm>Area asignada</x-web.dataTerm>
    <x-web.dataDescription>{{ $user->area != null ? $user->area->name : '' }}</x-web.dataDescription>

   </dl>

   <button data-modal-toggle="editUser" type="button"
    class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer sm:w-fit w-full">Editar</button>

   <x-web.detailModal-sm button="false" toggleId="editUser">
    <x-slot name="modalTitle">Usuario</x-slot>
    <x-slot name="dataList">
     <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data" class="h-full">
      @csrf
      @method('PUT')
      <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-auto h-[calc(100%-8rem)] content-start relative p-1">

       <div class="sm:col-span-2">
        <x-web.formLabel for="name">Nombre</x-web.formLabel>
        <x-web.formInput type="text" name="name" id="name" required="true">
            {{ $user->name }}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="email">Correo</x-web.formLabel>
        <x-web.formInput type="text" name="email" id="email" required="true">
            {{ $user->email }}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="area_id">Departamento</x-web.formLabel>
        <x-web.formInput type="select" name="area_id" id="area_id" required="true"
         placeholder="Asigna un departamento" selectEdit="false">
            
         <x-slot name="options">
          @foreach ($areas as $area)
            @if ($area->name == $user->area)
            <option selected value="{{ $area->id }}">{{ $area->name }}</option> 
            @else
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endif
          @endforeach
         </x-slot>
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="password">Nueva contraseña</x-web.formLabel>
        <x-web.formInput type="password" name="password" id="password">
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="password_confirmation">Confirmación de contraseña</x-web.formLabel>
        <x-web.formInput type="password" name="password_confirmation" id="password_confirmation">
        </x-web.formInput>
       </div>

      </div>
      <div class="flex items-center space-x-4 p-5 justify-end m-0">
        <button type="submit"
         class="text-white bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
         Actualizar
        </button>
       </div>
      <x-slot name="modalActions">
        
      </x-slot>

     </form>
    </x-slot>

   </x-web.detailModal-sm>
   <div class="flex justify-between items-center">
    <div class="flex items-center space-x-3 sm:space-x-4">

    </div>
   </div>
  </div>
 </div>
 </div>
</x-app-layout>
