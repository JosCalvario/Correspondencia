<x-web.container title="Departamentos" search="true" actions="true" filters="true" add="true">

 <x-slot name="searchInput">
  <x-web.searchInput placeholder="Nombre departamento o abreviatura" :optionsModel="$options" optionModel="option"
   searchModel="search"></x-web.searchInput>
 </x-slot>

 <x-slot name="addbutton">
  @can('areas.store')
   <x-web.addTableButton createModalId="createModal">Agregar área</x-web.addTableButton>
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
  <x-web.table headers="Abreviatura|Nombre|Encargado de área|Teléfono">
   <x-slot name="data">
    @foreach ($areas as $area)
     <x-web.tableRow options="true" edit="true">

      <x-slot name="tableData">
       <x-web.tableData label='Abreviatura'>{{ $area->abbr }}</x-web.tableData>
       <x-web.tableData label='Nombre'>{{ $area->name }}</x-web.tableData>
       <x-web.tableData label='Encargado de área'>{{ $area->manager?->name }}</x-web.tableData>
       <x-web.tableData label='Teléfono'>{{ $area->phone }}</x-web.tableData>
      </x-slot>
       
      <x-slot name="detailModal">
       <x-web.detailModal-sm toggleId="showModal{{ $area->id }}">
        <x-slot name="modalTitle">
         Departamento
        </x-slot>
        <x-slot name="modalHeader">
         Nombre: {{ $area->name }}
        </x-slot>
        <x-slot name="dataList">
         <x-web.dataTerm>Abreviatura</x-web.dataTerm>
         <x-web.dataDescription>{{ $area->abbr }}</x-web.dataDescription>

         <x-web.dataTerm>Encargado de área</x-web.dataTerm>
         <x-web.dataDescription>{{ $area->manager?->name }}</x-web.dataDescription>

         <x-web.dataTerm>Teléfono</x-web.dataTerm>
         <x-web.dataDescription>{{ $area->phone }}</x-web.dataDescription>

         <x-web.dataTerm>Dirección</x-web.dataTerm>
         <x-web.dataDescription>{{ $area->address }}</x-web.dataDescription>

        </x-slot>

        <x-slot name="modalActions">

         <x-web.modalAnchor toggleId="editModal{{$area->id}}">
          <x-slot name="icon">
           <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
            <path fill-rule="evenodd"
             d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
             clip-rule="evenodd"></path>
           </svg>
          </x-slot>
          Editar departamento
         </x-web.modalAnchor>
        </x-slot>
       </x-web.detailModal-sm>
      </x-slot>

      <x-slot name="editModal">
        <x-web.createModal-lg createmodalId="editModal{{$area->id}}" title="Editar departamento" permission="areas.update">
          <x-slot name="form">
           <form action="{{ route('areas.update',[$area->id]) }}" method="POST" class="h-full">
            @csrf
            @method('PUT')
            
     <input type="hidden" name="area_id" value="{{$area->id}}">
            <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-scroll h-[calc(100%-8rem)] relative p-1">
             <div>
              <x-web.formLabel for="name">Nombre</x-web.formLabel>
              <x-web.formInput type="text" name="name" id="name" required="true">
                {{$area->name}}
              </x-web.formInput>
             </div>
             <div>
              <x-web.formLabel for="abbr">Abreviatura</x-web.formLabel>
              <x-web.formInput type="text" name="abbr" id="abbr" required="true">
                {{$area->abbr}}
              </x-web.formInput>
             </div>
             <div>
              <x-web.formLabel for="phone">Teléfono</x-web.formLabel>
              <x-web.formInput type="text" name="phone" id="phone" required="true">
                {{$area->phone}}
              </x-web.formInput>
             </div>
             <div>
              <x-web.formLabel for="address">Dirección</x-web.formLabel>
              <x-web.formInput type="text" name="address" id="address" required="true">
                {{$area->address}}
              </x-web.formInput>
             </div>
             <div>
              <x-web.formLabel for="unit_id">Asignar
               Secretaría</x-web.formLabel>
              <x-web.formInput type="select" name="unit_id" id="unit_id" required="true"
               placeholder="Asigna una secretaría">
       
               <x-slot name="options">
                @foreach ($units as $unit)
                 <option {{$area->unit_id == $unit->id ? 'selected' : ''}} value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
               </x-slot>
              </x-web.formInput>
             </div>
       
             <div>
               <x-web.formLabel for="manger_id">Asignar
                Encargado</x-web.formLabel>
               <x-web.formInput type="select" name="manager_id" id="manager_id" required="true"
                placeholder="Asigna un encargado">
        
                <x-slot name="options">
                  <option value="{{null}}">Sin asignar</option>
                 @foreach ($users as $user)
                  <option {{$area->manager_id == $user->id ? 'selected' : ''}} value="{{ $user->id }}">{{ $user->name }}</option>
                 @endforeach
                </x-slot>
               </x-web.formInput>
              </div>
       
            </div>
            <x-web.addModalButton>Actualizar</x-web.addModalButton>
           </form>
          </x-slot>
         </x-web.createModal-lg>
      </x-slot>
     </x-web.tableRow>
    @endforeach
   </x-slot>
  </x-web.table>
 </x-slot>
 
 <x-slot name="Modal">
  <x-web.createModal-lg createmodalId="createModal" title="Agregar departamento" permission="areas.store">
   <x-slot name="form">
    <form action="{{ route('areas.store') }}" method="POST" class="h-full">
     @csrf
     @method('POST')
     <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-scroll h-[calc(100%-8rem)] relative p-1">
      <div>
       <x-web.formLabel for="name">Nombre</x-web.formLabel>
       <x-web.formInput type="text" name="name" id="name" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="abbr">Abreviatura</x-web.formLabel>
       <x-web.formInput type="text" name="abbr" id="abbr" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="phone">Teléfono</x-web.formLabel>
       <x-web.formInput type="text" name="phone" id="phone" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="address">Dirección</x-web.formLabel>
       <x-web.formInput type="text" name="address" id="address" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="unit_id">Asignar
        Secretaría</x-web.formLabel>
       <x-web.formInput type="select" name="unit_id" id="unit_id" required="true"
        placeholder="Asigna una secretaría">

        <x-slot name="options">
         @foreach ($units as $unit)
          <option value="{{ $unit->id }}">{{ $unit->name }}</option>
         @endforeach
        </x-slot>
       </x-web.formInput>
      </div>

      <div>
        <x-web.formLabel for="manger_id">Asignar
         Encargado</x-web.formLabel>
        <x-web.formInput type="select" name="manager_id" id="manager_id" required="true"
         placeholder="Asigna un encargado">
 
         <x-slot name="options">
          @foreach ($users as $user)
           <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
         </x-slot>
        </x-web.formInput>
        
       </div>

     </div>
     <x-web.addModalButton>Agregar</x-web.addModalButton>
    </form>
   </x-slot>
  </x-web.createModal-lg>
 </x-slot>

 <x-slot name="navigation">
  {{ $areas->links() }}
 </x-slot>
</x-web.container>
