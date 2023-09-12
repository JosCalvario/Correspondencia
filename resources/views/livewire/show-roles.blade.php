<x-web.container title="Roles" search="true" actions="true" filters="true" add="false" nav="false">

 <x-slot name="searchInput">
  <x-web.searchInput placeholder="Nombre documento, número o asunto" :optionsModel="$options" optionModel="option" searchModel="search"></x-web.searchInput>
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
  <x-web.table headers="Id|Nombre">
   <x-slot name="data">
    @foreach ($roles as $role)
     <x-web.tableRow options="true">

      <x-slot name="tableData">
       <x-web.tableData label='Número'>{{ $role->id }}</x-web.tableData>
       <x-web.tableData label='Nombre'>{{ $role->name }}</x-web.tableData>
       
      </x-slot>

      <x-slot name="detailModal">
       <x-web.detailModal-sm toggleId="showModal{{ $role->id }}">
        <x-slot name="modalTitle">Rol</x-slot>
        <x-slot name="dataList">
         <x-web.dataTerm>Nombre</x-web.dataTerm>
         <x-web.dataDescription>{{ $role->name }}</x-web.dataDescription>

         <x-web.dataTerm>Permisos</x-web.dataTerm>
          <x-web.dataDescription>
            @foreach ($role->permissions as $per)
          {{ __($per->name) }}
          @if (!$loop->last)
              |
          @endif
          @endforeach
          </x-web>
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
          Editar permisos
         </x-web.modalAnchor>
        </x-slot>
       </x-web.detailModal-sm>
      </x-slot>

     </x-web.tableRow>
    @endforeach
   </x-slot>
  </x-web.table>
 </x-slot>

</x-web.container>
