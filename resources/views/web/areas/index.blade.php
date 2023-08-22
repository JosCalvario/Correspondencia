<x-app-layout>


    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <h2 class="text-lg pt-4 pl-4 font-medium text-gray-900 dark:text-white">Departamentos</h2>
       <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        
        <div class="w-full md:w-1/2">
          
         <form class="flex items-center">
          <label for="simple-search" class="sr-only">Buscar</label>
          <div class="relative w-full">
           <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
             viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd" />
            </svg>
           </div>
           <input type="text" id="simple-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-sc_greener focus:ring-sc_greener block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Nombre documento, número o asunto" required="">
          </div>
         </form>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
         @can('areas.store')
         <button type="button" data-modal-toggle="createModal"
         class="flex items-center justify-center text-white bg-sc_greeny hover:bg-primary-800 focus:border-sc_greener focus:ring-sc_greener font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
         <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true">
          <path clip-rule="evenodd" fill-rule="evenodd"
           d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
         </svg>
         Agregar departamento
        </button>
         @endcan
         <div class="flex items-center space-x-3 w-full md:w-auto">
          <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
           class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-sc_green focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-1 focus:border-sc_greener focus:ring-sc_greener dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
           type="button">
           <svg class="-ml-1 mr-1.5 w-5 h-5 text-sc_green" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd"
             d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
           </svg>
           Actions
          </button>
          <div id="actionsDropdown"
           class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
           <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
            <li>
             <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
              Edit</a>
            </li>
           </ul>
           <div class="py-1">
            <a href="#"
             class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
             all</a>
           </div>
          </div>
          <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
           class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-sc_green focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-1  focus:border-sc_greener focus:ring-sc_greener dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
           type="button">
           <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-sc_green"
            viewbox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
             d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
             clip-rule="evenodd" />
           </svg>
           Filter
           <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd"
             d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
           </svg>
          </button>
          <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
           
           <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
            <li class="flex items-center">
             <input id="apple" type="checkbox" value=""
              class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
             <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Completados</label>
            </li>
           </ul>
          </div>
         </div>
        </div>
       </div>
       @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
       @endforeach
       {{-- Create Modal --}}
       @can('areas.create')
       <div id="createModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed m-auto top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-auto">
           <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
               <!-- Modal content -->
               <div class="relative m-auto p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                   <!-- Modal header -->
                   <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                       <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                           Agregar departamento
                       </h3>
                       <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createModal">
                           <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                           <span class="sr-only">Cerrar</span>
                       </button>
                   </div>
                   <!-- Modal body -->
                   <form action="{{route('areas.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                       <div class="grid gap-2 mb-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                           <div>
                               <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                               <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                           </div>
                           <div>
                            <label for="manager_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Encargado</label>
                            <select id="manager_id" name="manager_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected disabled hidden>Asigna un encargado</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div>
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                                <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                            <div>
                                <label for="unit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Secretaría</label>
                                <select id="unit_id" name="unit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected disabled hidden>Asigna una secretaría</option>
                                    @foreach ($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div>
                                <label for="abbr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abreviación</label>
                                <input type="text" name="abbr" id="abbr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                       </div>
                       <button type="submit" class="text-white inline-flex items-center bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                           <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                           Agregar
                       </button>
                   </form>
               </div>
           </div>
       </div>
       @endcan
       
       
       <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class=" uppercase text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
          <tr>
           <th scope="col" class="hidden sm:table-cell px-4 py-3">Abreviación</th>
           <th scope="col" class="hidden sm:table-cell px-4 py-3">Nombre</th>
           <th scope="col" class="hidden sm:table-cell px-2 py-3">Encargado de área</th>
           <th scope="col" class="hidden sm:table-cell px-2 py-3">Teléfono</th>
           <th scope="col" class="hidden sm:table-cell px-2 py-3">Dirección</th>

           <th scope="col" class="hidden sm:table-cell px-2 py-3">
            <span class="sr-only">Actions</span>
           </th>
          </tr>
         </thead>
         <tbody>

          @foreach ($areas as $area)

          <tr class="border-b text-sm text-gray-900 font-medium">
           <td data-label="Nombre de documento" scope="row" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none px-4 py-3 sm:table-cell block before:block before:font-semibold" >{{$area->abbr}}</td>
           <td data-label="Nombre de documento" scope="row" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none px-4 py-3 sm:table-cell block before:block before:font-semibold" >{{$area->name}}</td>
            @if ($area->manager != null)
           <td data-label="Tipo de documento" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none  px-4 py-3 sm:table-cell block before:block before:font-semibold">{{$area->manager->name}}</td>
            @else
           <td data-label="Tipo de documento" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none  px-4 py-3 sm:table-cell block before:block before:font-semibold"></td>
                
            @endif
           <td data-label="Tipo de documento" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none  px-4 py-3 sm:table-cell block before:block before:font-semibold">{{$area->phone}}</td>
           <td data-label="Tipo de documento" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none  px-4 py-3 sm:table-cell block before:block before:font-semibold">{{$area->address}}</td>


           <td class="px-4 py-3 flex items-center justify-end">
            <button data-modal-toggle="showModal{{$area->id}}"
             class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
             type="button">
             <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
             </svg>
            </button>
            <div id="showModal{{$area->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
               <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                   <!-- Modal content -->
                   <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                           <!-- Modal header -->
                           <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                               <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                   <h3 class="font-semibold ">
                                       Departamento: {{$area->name}}
                                   </h3>
                                   <p class="text-gray-500">
                                    {{$area->abbr}}
                                   </p>
                               </div>
                               <div>
                                   <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="showModal{{$area->id}}">
                                       <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                       <span class="sr-only">Close modal</span>
                                   </button>
                               </div>
                           </div>
                           <dl>
                               <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Encargado de departamento</dt>
                               <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{$area->manager->name}}</dd>
                               <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Número de teléfono</dt>
                               <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{$area->phone}}</dd>
                               <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Dirección</dt>
                               <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{$area->address}}</dd>
                               <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Secretaría</dt>
                               <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{$area->unit->name}}</dd>
                           </dl>
                           <div class="flex justify-between items-center">
                               <div class="flex items-center space-x-3 sm:space-x-4">
                                   <button type="button" class="text-white inline-flex items-center bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                       <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                       Responder
                                   </button>               
                                   <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                       Previsualizar
                                   </button>
                               </div>              
                           </div>
                   </div>
               </div>
           </div>
  
            {{-- Edit Modal --}}
            <div></div>
  
            {{-- Delete Modal --}}
            </div>
           </td>
          </tr>

          @endforeach

         </tbody>
        </table>
       </div>
      </div>

    
   </x-app-layout>
   