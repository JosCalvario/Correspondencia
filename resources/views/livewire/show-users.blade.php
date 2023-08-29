<x-web.container title="Usuarios" search="true" actions="true" filters="true" add="true">

    <x-slot name="searchInput">
        <x-web.searchInput placeholder="Nombre documento, número o asunto" searchModel="search"></x-web.searchInput>
    </x-slot>
    
    <x-slot name="addbutton">
        @can('requests.store')
        <x-web.addTableButton createModalId="createModal">Agregar documento</x-web.addTableButton>
        @endcan
    </x-slot>
    
    <x-slot name="actionsSelect">
        <x-web.actionsSelect dropDownId="actionsDropdown">
        <x-slot name="actions">
        <x-web.actionAnchor actionModel="xd">acción 1</x-web.actionAnchor>
        </x-slot>
    
        <x-slot name="mainAction">
        <x-web.mainActionAnchor actionModel="xd">acción principal</x-web.mainActionAnchor>
        </x-slot>
        </x-web.actionsSelect>
    </x-slot>
    
    <x-slot name="filtersSelect">
        <x-web.filtersSelect dropDownId="filterDropdown">
        <x-slot name="filterOptions">
        <x-web.filterOption filterModel="xd">filtro 1</x-web.filterOption>
        </x-slot>
        </x-web.filtersSelect>
    </x-slot>
    <x-slot name="Table">
  <x-web.table headers="Id|Nombre|Correo|Area asignada|Roles|Opciones">
   <x-slot name="data">
    @foreach ($users as $user)
     <x-web.tableRow options="true" extra="true">

      <x-slot name="tableData">
       <x-web.tableData>{{ $user->id }}</x-web.tableData>
       <x-web.tableData>{{ $user->name }}</x-web.tableData>
       <x-web.tableData>{{ $user->email }}</x-web.tableData>
       <x-web.tableData>{{ $user->area != null ? $user->area->name : '' }}</x-web.tableData>
       @can('permissions.update')
           <td data-label="Fecha" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none px-4 py-3 sm:table-cell block before:block before:font-semibold"><button type="button" data-modal-toggle="editPermissions{{$user->id}}" class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer">Editar</button></td>
        @endcan

      </x-slot>

      <x-slot name="extraModal">
        @can('permissions.update')
        <div id="editPermissions{{$user->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Asignar rol
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editPermissions{{$user->id}}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{route('users.updateRoles')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Selecciona los roles</h3>
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach ($roles as $role)
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}" {{$user->hasRole($role->name)?'checked':''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$role->name}}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>


                        </div>
                        <div class="flex items-center space-x-4">
                            <button type="submit" class="text-white bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan
      </x-slot>

      <x-slot name="detailModal">
       <x-web.detailModal-sm toggleId="showModal{{ $user->id }}">
        <x-slot name="modalTitle">
         Usuario
        </x-slot>
        <x-slot name="dataList">
         <x-web.dataTerm>Nombre</x-web.dataTerm>
         <x-web.dataDescription>{{ $user->name }}</x-web.dataDescription>

         <x-web.dataTerm>Email</x-web.dataTerm>
         <x-web.dataDescription>{{ $user->email }}</x-web.dataDescription>

         <x-web.dataTerm>Area asignada</x-web.dataTerm>
         <x-web.dataDescription>{{ $user->area != null ? $user->area->name : '' }}</x-web.dataDescription>

        </x-slot>

        <x-slot name="modalActions">

         <x-web.modalAnchor>
          <x-slot name="icon">
           <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
            <path fill-rule="evenodd"
             d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
             clip-rule="evenodd"></path>
           </svg>
          </x-slot>
          Responder
         </x-web.modalAnchor>
         <x-web.modalButton>
          Previsualizar
         </x-web.modalButton>
        </x-slot>
       </x-web.detailModal-sm>
      </x-slot>

      

     </x-web.tableRow>
    @endforeach
   </x-slot>
  </x-web.table>
 </x-slot>

 <x-slot name="Modal">
  <x-web.createModal-lg createmodalId="createModal">
   <x-slot name="form">
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="h-full">
     @csrf
     @method('POST')
     <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-auto h-[calc(100%-8rem)] content-start relative p-1">
     
      <div class="sm:col-span-2">
       <x-web.formLabel for="name">Nombre</x-web.formLabel>
       <x-web.formInput type="text" name="name" id="name" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="email">Correo</x-web.formLabel>
       <x-web.formInput type="text" name="email" id="email" required="true">
       </x-web.formInput>
      </div>
      <div>
        <x-web.formLabel for="area_id">Departamento</x-web.formLabel>
        <x-web.formInput type="select" name="area_id" id="area_id" required="true"
         placeholder="Asigna un departamento">
 
         <x-slot name="options">
          @foreach ($areas as $area)
           <option value="{{ $area->id }}">{{ $area->name }}</option>
          @endforeach
         </x-slot>
        </x-web.formInput>
       </div>
      <div>
       <x-web.formLabel for="password">Contraseña</x-web.formLabel>
       <x-web.formInput type="password" name="password" id="password" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="password_confirmation">Confirmación de contraseña</x-web.formLabel>
       <x-web.formInput type="password" name="password_confirmation" id="password_confirmation" required="true">
       </x-web.formInput>
      </div>

     </div>
     <div class="flex items-center sm:justify-end relative text-center">
      <button type="submit"
       class="text-white inline-flex items-center bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600  dark:hover:bg-primary-700 sm:w-auto w-full dark:focus:ring-primary-800">
       <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
         d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
         clip-rule="evenodd"></path>
       </svg>
       Agregar
      </button>
     </div>
    </form>
   </x-slot>
  </x-web.createModal-lg>
 </x-slot>

 <x-slot name="navigation">
  {{ $users->links() }}
 </x-slot>
</x-web.container>
