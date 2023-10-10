<x-app-layout>
<x-validation-errors></x-validation-errors>
 <div tabindex="-1" aria-hidden="true"
  class="m-0 overflow-y-auto overflow-x-hidden right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
  <!-- Modal content -->
  <div class="relative p-4 bg-white h-[calc(100vh-8rem)] rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-y-auto">
   <!-- Modal header -->
   <div class="flex justify-between mb-4 rounded-t sm:mb-5 w-full">
    <div class="flex justify-start items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600 w-full">
     <a href="{{ route('areas.index') }}" type="button"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 mr-2 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
      <i class="bi bi-chevron-left"></i>
      <span class="sr-only">Close modal</span>
     </a>
     <h3 class="font-semibold text-gray-900 dark:text-white">
      Departamento
     </h3>
    </div>
    <div>

    </div>
   </div>
   <dl>
     <x-web.dataTerm>Nombre</x-web.dataTerm>
     <x-web.dataDescription>{{ $area->name }}</x-web.dataDescription>

     <x-web.dataTerm>Abreviatura</x-web.dataTerm>
     <x-web.dataDescription>{{ $area->abbr }}</x-web.dataDescription>

    <x-web.dataTerm>Encargado de área</x-web.dataTerm>
    <x-web.dataDescription>{{ $area->manager?->name ?? 'Sin encargado asignado' }}</x-web.dataDescription>

    <x-web.dataTerm>Teléfono</x-web.dataTerm>
    <x-web.dataDescription>{{ $area->phone }}</x-web.dataDescription>

    <x-web.dataTerm>Dirección</x-web.dataTerm>
    <x-web.dataDescription>{{ $area->address }}</x-web.dataDescription>
   </dl>
   <button data-modal-toggle="editArea" type="button"
    class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer sm:w-fit w-full">Editar</button>

   <x-web.detailModal-sm button="false" toggleId="editArea">
    <x-slot name="modalTitle">Departamento</x-slot>
    <x-slot name="dataList">
     <form action="{{ route('areas.update',$area->id) }}" method="POST" enctype="multipart/form-data" class="h-full">
      @csrf
      @method('PUT')
      <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-auto h-[calc(100%-8rem)] content-start relative p-1">

       <div class="sm:col-span-2">
          <x-web.formLabel for="name">Nombre</x-web.formLabel>
          <x-web.formInput type="text" name="name" id="name" required="true">
               {{ $area->name }}
          </x-web.formInput>
         </div>
         <div class=""> 
          <x-web.formLabel for="abbr">Abreviatura</x-web.formLabel>
          <x-web.formInput type="text" name="abbr" id="abbr" required="true">
               {{ $area->abbr }}
          </x-web.formInput>
         </div>
         <div>
          <x-web.formLabel for="phone">Teléfono</x-web.formLabel>
          <x-web.formInput type="text" name="phone" id="phone" required="true">
               {{ $area->phone }}
          </x-web.formInput>
         </div>
         <div>
          <x-web.formLabel for="address">Dirección</x-web.formLabel>
          <x-web.formInput type="text" name="address" id="address" required="true">
               {{ $area->address }}
          </x-web.formInput>
         </div>

         <div>
          <x-web.formLabel for="unit_id">Asignar
               Secretaría</x-web.formLabel>
              <x-web.formInput type="select" name="unit_id" id="unit_id" required="true"
               placeholder="Asigna una secretaría" selectEdit="false">
       
               <x-slot name="options">
                @foreach ($units as $unit)
                @if ($unit->name == $area->unit)
                <option selected value="{{ $unit->id }}">{{ $unit->name }}</option>
                @else
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endif
                 
                @endforeach
               </x-slot>
              </x-web.formInput>
         </div>
         <div>
          <x-web.formLabel for="manger_id">Asignar
           Encargado</x-web.formLabel>
          <x-web.formInput type="select" name="manager_id" id="manager_id"
           placeholder="Asigna un encargado" selectEdit="true">
          
           <x-slot name="options">
               <option value="{{null}}" selected>Sin encargado</option>

            @foreach ($users as $user)
             <option value="{{ $user->id }}" {{$user->id == $area->manager->id ? 'selected' : ''}}>{{ $user->name }}</option>
            @endforeach
           </x-slot>
          </x-web.formInput>
          
         </div>
         

      </div>
      <div class="flex items-center sm:justify-end relative text-center">
          <button type="submit"
           class="text-white inline-flex items-center bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600  dark:hover:bg-primary-700 sm:w-auto w-full dark:focus:ring-primary-800">
           Guardar
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
