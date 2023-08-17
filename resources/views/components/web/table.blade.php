<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class=" uppercase text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
     <tr>
        @foreach(explode('|', $headers) as $header)
      <th scope="col" class="hidden sm:table-cell px-2 py-3">{{$header}}</th>
        @endforeach
       <span class="sr-only">Acciones</span>
      </th>
     </tr>
    </thead>
    <tbody>
        {{$data}}


    </tbody>
   </table>