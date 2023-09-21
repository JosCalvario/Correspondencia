@props([
    'label' => 'Nombre',
    'color' => '',
    'bgColor' => ''
])
<td data-label="{{$label}}" class=" before:content-[attr(data-label)] text-left  before:mb-2  sm:before:content-none px-2 py-3 sm:table-cell block before:block before:font-semibold  ">
    <p class="{{$bgColor}} {{$color}} w-fit block p-1 px-2 rounded-full">{{$slot}}</p></td>