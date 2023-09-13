@props(['toggleId'=>''])
<button type="button" class="text-white inline-flex items-center bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" data-modal-toggle="{{$toggleId}}">
    {{$icon}}
    {{$slot}}
</button>