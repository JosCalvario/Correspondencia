@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'readonly' => 'false',
    'required' => 'false',
    'list' => '',
    'placeholder' => '',
    'rows' => ''
])


@switch($type)
    @case('text')
    @case('comboBox')
        <input type="text" 
        @break
    @case('select')
        <select 
        @break
    @case('textarea')
        <textarea rows={{$rows}} 
        @break
    @case('file')
        <input type="file" 
        @break
    @case('date')
        <input type="date" 
        @break
    @case('password')
        <input type="password"
        @break
    @default
        
@endswitch

 name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  
 {{$readonly == 'true' ? 'readonly' : '' }} 
 {{$required == 'true' ? 'required' : '' }} 


 @if ($type == 'comboBox')
 list = {{$list}} 
 @endif
 
 @if ($type != 'select')
 value="{{$slot}}" 
 @endif
 
 @if ($type == 'textarea')
 ></textarea>
 @else
 > 
 @endif

 @if ($type == 'comboBox')
 <datalist id="{{$list}}">
    {{$dataListOptions}}
 </datalist>
@endif

@if ($type == 'select')
    <option selected disabled hidden>{{$placeholder}}</option>
    {{$options}}
</select>
@endif