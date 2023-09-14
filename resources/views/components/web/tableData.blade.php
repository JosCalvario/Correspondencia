@props([
    'label' => 'Nombre',
    'color' => ''
])
<td data-label="{{$label}}" class=" before:content-[attr(data-label)] text-left  before:mb-2   sm:before:content-none px-4 py-3 sm:table-cell block before:block before:font-semibold  {{$color}}">{{$slot}}</td>