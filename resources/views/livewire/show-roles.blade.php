<x-web.container title="Roles" search="false" actions="false" filters="false" add="false" nav="false">

 <x-slot name="searchInput">
  <x-web.searchInput placeholder="Nombre documento, número o asunto" :optionsModel="$options" optionModel="option" searchModel="search"></x-web.searchInput>
 </x-slot>

 <x-slot name="actionsSelect">


 <x-slot name="Table">
  <x-web.table headers="Id|Nombre">
   <x-slot name="data">
    @foreach ($roles as $role)
     <x-web.tableRow options="true" extra="true">

      <x-slot name="tableData">
       <x-web.tableData label='Número'>{{ $role->id }}</x-web.tableData>
       <x-web.tableData label='Nombre'>{{ $role->name }}</x-web.tableData>
       
      </x-slot>
      <x-slot name="extraModal">
        {{-- Create Modal --}}
        @can('permissions.update')
        <div id="editPermissions{{$role->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed m-auto top-0 right-0 left-0 z-50 justify-center items-center w-full md:h-auto ">
            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative m-auto p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-y-scroll h-[calc(100vh-2rem)]">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                          Asignar permisos
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editPermissions{{$role->id}}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Cerrar</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <form action="{{route('roles.updatePermissions')}}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="role_id" value="{{$role->id}}">
                      <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Selecciona los permisos</h3>
                      <div class="grid gap-4 mb-4 sm:grid-cols-2">
                          <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                              @foreach ($permissions as $perm)
                              <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                  <div class="flex items-center pl-3">
                                      <input type="checkbox" name="permissions[]" value="{{$perm->id}}" {{$role->hasPermissionTo($perm->name)?'checked':''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                      <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$perm->name}}</label>
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

        @can('permissions.update')
        <div id="editPermissions{{$role->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Asignar permisos
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editPermissions{{$role->id}}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{route('roles.updatePermissions')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="role_id" value="{{$role->id}}">
                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Selecciona los permisos</h3>
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach ($permissions as $perm)
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input type="checkbox" name="permissions[]" value="{{$perm->id}}" {{$role->hasPermissionTo($perm->name)?'checked':''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$perm->name}}</label>
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

         <x-web.modalAnchor toggleId="editPermissions{{$role->id}}">
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
