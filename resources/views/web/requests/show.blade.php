<x-app-layout>
<x-validation-errors></x-validation-errors>
 <div tabindex="-1" aria-hidden="true"
  class="m-0 overflow-y-auto overflow-x-hidden right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
  <!-- Modal content -->
  <div class="relative p-4 bg-white h-[calc(100vh-8rem)] rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-y-auto">
   <!-- Modal header -->
   <div class="flex justify-between mb-4 rounded-t sm:mb-5 w-full">
    <div class="flex justify-start items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600 w-full">
     <a href="{{ route('requests.index') }}" type="button"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 mr-2 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
      <i class="bi bi-chevron-left"></i>
      <span class="sr-only">Close modal</span>
     </a>
     <h3 class="font-semibold text-gray-900 dark:text-white">
      Solicitudes
     </h3>
    </div>
    <div>

    </div>
   </div>
   <dl>
        <x-web.dataTerm>Folio</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->folio }}</x-web.dataDescription>

        <x-web.dataTerm>Nombre</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->name }}</x-web.dataDescription>

        <x-web.dataTerm>Fecha</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->date }}</x-web.dataDescription>

        <x-web.dataTerm>Remitente</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->sender }}</x-web.dataDescription>

        <x-web.dataTerm>Asunto</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->subject }}</x-web.dataDescription>

        <x-web.dataTerm>Departamento asignado</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->area->name }}</x-web.dataDescription>
   </dl>

   @can('requests.update')
   <button data-modal-toggle="editRequest" type="button"
   class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer sm:w-fit w-full">Editar</button>

   <x-web.createModal-lg createmodalId="editRequest" title="Agregar documento" permission="requests.update">
    <x-slot name="form">
     <form action="{{ route('requests.update',$request->id) }}" method="POST" enctype="multipart/form-data" class="h-full">
      @csrf
      @method('PUT')
      <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-scroll h-[calc(100%-8rem)] relative p-1">
       <div>
        <x-web.formLabel for="folio">Folio asignado</x-web.formLabel>
        <x-web.formInput type="text" name="folio" id="folio" readonly="true">
         {{$request->folio}}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="document_type">Tipo de documento</x-web.formLabel>
        <select type="text" name="document_type" id="document_type"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
      required="" list="document_types">
      <datalist id="document_types">
       <option {{$request->document_type == 'Oficio' ? 'selected' : ''}} value="Oficio">Oficio</option>
       <option {{$request->document_type == 'Memorándum' ? 'selected' : ''}} value="Memorándum">Memorándum</option>
       <option {{$request->document_type == 'Circular' ? 'selected' : ''}} value="Circular">Circular</option>
      </datalist>
     </select>
       </div>
       <div>
        <x-web.formLabel for="dependency">Dependencia</x-web.formLabel>
        <x-web.formInput type="text" name="dependency" id="dependency" required="false">
         {{$request->dependency}}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="department">Departamento</x-web.formLabel>
        <x-web.formInput type="text" name="department" id="department" required="false">
         {{$request->department}}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="date">Fecha</x-web.formLabel>
        <x-web.formInput type="date" name="date" id="date" required="true">
         {{$request->date}}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="number">Número</x-web.formLabel>
        <x-web.formInput type="text" name="number" id="number" required="true">
         {{$request->number}}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="sender">Remitente</x-web.formLabel>
        <x-web.formInput type="text" name="sender" id="sender" required="true">
         {{$request->sender}}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="sender_position">Posición del
         remitente</x-web.formLabel>
        <x-web.formInput type="text" name="sender_position" id="sender_position" required="true">
         {{$request->sender_position}}
         </x-web.formInput>
       </div>
       <div class="sm:col-span-2">
        <x-web.formLabel for="subject">Asunto</x-web.formLabel>
        <x-web.formInput type="text" name="subject" id="subject" required="true">
         {{$request->subject}}
        </x-web.formInput>
       </div>
       <div>
        <x-web.formLabel for="assigned_area">Asignar
         departamento</x-web.formLabel>
         <select name="assigned_area" id="area"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="" list="areas">
         <datalist id="areas">
              @foreach ($areas as $area)
          <option {{$request->area->id == $area->id ? 'selected' : ''}} value="{{$area->id}}">{{$area->name}}</option>
              @endforeach
         </datalist>
        </select>
       </div>
       <div>
         <x-web.formLabel for="knowledge">¿Es de conocimiento?</x-web.formLabel>
 
         <div class="h-11 flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
             <input id="bordered-radio-1" type="radio" value="1" {{$request->knowledge == true ? 'checked' : ''}} name="knowledge" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
             <label for="bordered-radio-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Si</label>
             <input id="bordered-radio-2" type="radio" value="0" {{$request->knowledge == false ? 'checked' : ''}} name="knowledge" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
             <label for="bordered-radio-2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
         </div>
 
       </div>
       <div class="sm:col-span-2">
        <x-web.formLabel for="observations">Observaciones</x-web.formLabel>
        <x-web.formInput type="textarea" name="observations" id="observations" rows="2" required="false"
         placeholder="Observaciones del documento">
         {{$request->observations}}
        </x-web.formInput>
       </div>
 
       <div class="sm:col-span-2">
        <x-web.formLabel for="document">Cambiar documento</x-web.formLabel>
        <x-web.formInput type="file" name="document" id="document">
        </x-web.formInput>
       </div>
 
      </div>
      <div class="flex items-center sm:justify-end relative text-center">
         <button type="submit"
          class="text-white inline-flex items-center bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600  dark:hover:bg-primary-700 sm:w-auto w-full dark:focus:ring-primary-800">
          Guardar
         </button>
        </div>
     </form>
    </x-slot>
   </x-web.createModal-lg>
   @endcan
   <div class="flex justify-between items-center">
    <div class="flex items-center space-x-3 sm:space-x-4">
     
    </div>
   </div>
  </div>
 </div>
 </div>
</x-app-layout>
