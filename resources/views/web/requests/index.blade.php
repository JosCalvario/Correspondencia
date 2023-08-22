<x-app-layout>
 <x-web.container title="Solicitudes" addText="Agregar documento">
  <x-slot name="Table">
   <x-web.table headers="Número|Nombre|Tipo|Fecha|Remitente|Asunto|Área asignada|Documento|Contestación">
    <x-slot name="data">
     @foreach ($requests as $request)
      <x-web.tableRow requestId="showModal{{ $request->id }}">

       <x-slot name="tableData">
        <x-web.tableData>{{ $request->number }}</x-web.tableData>
        <x-web.tableData>{{ $request->name }}</x-web.tableData>
        <x-web.tableData>{{ $request->document_type }}</x-web.tableData>
        <x-web.tableData>{{ $request->date }}</x-web.tableData>
        <x-web.tableData>{{ $request->sender }}</x-web.tableData>
        <x-web.tableData>{{ $request->subject }}</x-web.tableData>
        <x-web.tableData>{{ $request->area->name }}</x-web.tableData>
        @if ($request->document != '')
         <x-web.tableDataFile>{{ $request->number }}</x-web.tableDataFile>
        @else
         <td></td>
        @endif
       </x-slot>

       <x-slot name="modalTitle">
            Acuse
       </x-slot>
       <x-slot name="modalHeader">
            Folio: {{ $request->number }}
       </x-slot>
       <x-slot name="dataList">
        <x-web.dataTerm>Nombre</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->name }}</x-web.dataDescription>

        <x-web.dataTerm>Fecha</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->date }}</x-web.dataDescription>

        <x-web.dataTerm>Remitente</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->sender }}</x-web.dataDescription>

        <x-web.dataTerm>Asunto</x-web.dataTerm>
        <x-web.dataDescription>{{ $request->subject }}</x-web.dataDescription>
       </x-slot>

       <x-slot name="modalActions">

            <x-web.modalAnchor>
                <x-slot name="icon">
                    <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                </x-slot>
                Responder
            </x-web.modalAnchor>
            <x-web.modalButton>
                Previsualizar
            </x-web.modalButton>
       </x-slot>
      </x-web.tableRow>
     @endforeach
    </x-slot>
   </x-web.table>
  </x-slot>

  <x-slot name="Modal">
   <x-web.createModal>
    <x-slot name="form">
     <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data" class="h-full">
      @csrf
      @method('POST')
      <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-scroll h-[calc(100%-8rem)] relative">
       <div>
        <label for="folio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folio asignado</label>
        <input type="text" name="folio" id="folio"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         readonly value="{{ $folio }}">
       </div>
       <div>
        <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
         documento</label>
        <input type="text" name="date" id="date"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="" list="document_types">
        <datalist id="document_types">
         <option value="Oficio"></option>
         <option value="Memorándum"></option>
         <option value="Circular"></option>
        </datalist>
       </div>
       <div>
        <label for="dependency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dependencia</label>
        <input type="text" name="dependency" id="dependency"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div>
        <label for="department"
         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
        <input type="text" name="department" id="department"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div>
        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
        <input type="date" name="date" id="date"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div>
        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número</label>
        <input type="text" name="number" id="number"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div>
        <label for="sender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remitente</label>
        <input type="text" name="sender" id="sender"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div>
        <label for="sender_position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posición del
         remitente</label>
        <input type="text" name="sender_position" id="sender_position"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div class="sm:col-span-2">
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tema</label>
        <input type="text" name="subject" id="subject"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div class="sm:col-span-2">
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asunto</label>
        <input type="text" name="subject" id="subject"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
       </div>
       <div>
        <label for="assigned_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignar
         departamento</label>
        <select id="assigned_area" name="assigned_area"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
         <option selected disabled hidden>Asigna un departamento</option>
         @foreach ($areas as $area)
          <option value="{{ $area->id }}">{{ $area->name }}</option>
         @endforeach
        </select>
       </div>

       <div class="sm:col-span-2">
        <label for="observations"
         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
        <textarea id="observations" name="observations" rows="2"
         class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         placeholder="Observaciones del documento"></textarea>
       </div>

       <div class="sm:col-span-2">
        <label for="document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documento</label>
        <input type="file" name="document" id="document"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         required="">
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
   </x-web.createModal>
  </x-slot>

  <x-slot name="navigation">
   {{ $requests->links() }}
  </x-slot>
 </x-web.container>
</x-app-layout>
