<x-web.container title="Usuarios" search="true" actions="false" filters="true" add="true">

 <x-slot name="searchInput">
  <x-web.searchInput placeholder="Nombre documento, número o asunto" :optionsModel="$options" optionModel="option"
   searchModel="search"></x-web.searchInput>
 </x-slot>

 <x-slot name="addbutton">
  @can('users.store')
   <x-web.addTableButton createModalId="createModal">Agregar usuario</x-web.addTableButton>
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
    <x-web.filterOption filterModel="xd" value="0">filtro 1</x-web.filterOption>
   </x-slot>
  </x-web.filtersSelect>
 </x-slot>
 <x-slot name="Table">
  <x-web.table headers="Id|Nombre|Correo|Area asignada|Roles">
   <x-slot name="data">
    @foreach ($users as $user)
     <x-web.tableRow options="true" extra="true">

      <x-slot name="tableData">
       <x-web.tableData>{{ $user->id }}</x-web.tableData>
       <x-web.tableData>{{ $user->name }}</x-web.tableData>
       <x-web.tableData>{{ $user->email }}</x-web.tableData>
       <x-web.tableData>{{ $user->area != null ? $user->area->name : '' }}</x-web.tableData>
       @can('permissions.update')
        <td data-label="Fecha"
         class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none px-0 py-3 sm:table-cell block before:block before:font-semibold">
         <a href="{{ route('users.editRoles', $user->id) }}" type="button"
          class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer">Editar</a>
        </td>
       @endcan
        <td class="flex justify-end items-center">
          <a href="{{ route('users.show', $user->id) }}"
            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
            type="button">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
             <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
           </a>

        </td>
       

      </x-slot>

      <x-slot name="extraModal">

      </x-slot>

      <x-slot name="detailModal">
       
      </x-slot>



     </x-web.tableRow>
    @endforeach
   </x-slot>
  </x-web.table>
 </x-slot>

 <x-slot name="Modal">
  <x-web.createModal-lg createmodalId="createModal" title="Agregar usuario" permission="users.store">
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
         d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd">
        </path>
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
