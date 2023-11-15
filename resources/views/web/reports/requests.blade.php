<x-app-layout>
    <x-validation-errors></x-validation-errors>
    @if(session('success'))
    <x-success-message>{{session('success')}}</x-success-message>
    @endif
    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <th style="text-align: center; font-size:30px; width:min-content; padding: 1.5rem" colspan="{{count($areas)+1}}"><b>Dirección Administrativa</b></th>
        </thead>
        <tbody>
        <tr>
            <th style="width:100px"></th>
            @foreach ($areas as $area)
            <th scope="col" class="px-6 py-3">
            {{$area->name}}
                </th>
            @endforeach
        </tr>
        <tr>
            <th style="width:100px">Atendidos</th>
            @foreach ($data as $da)
            <th scope="col" class="px-6 py-3">
            {{$da['Atendidos']}}
                </th>
            @endforeach
        </tr>
        <tr>
            <th style="width:100px">Conocimiento</th>
            @foreach ($data as $da)
            <th scope="col" class="px-6 py-3">
            {{$da['Conocimiento']}}
                </th>
            @endforeach
        </tr>
        <tr>
            <th style="width:100px">Sin Respuesta</th>
            @foreach ($data as $da)
            <th scope="col" class="px-6 py-3">
            {{$da['Sin Respuesta']}}
                </th>
            @endforeach
        </tr>
        <tr>
            <th style="width:100px">Total</th>
            @foreach ($data as $da)
            <th scope="col" class="px-6 py-3">
            {{$da['Total']}}
                </th>
            @endforeach
        </tr>
            
        </tbody>
    </table>
</div>

  
</x-app-layout>