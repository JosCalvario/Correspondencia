@props([
    'searchModel' => '',
    'placeholder' => 'Buscar',
    'optionsModel' => '',
    'optionModel' => ''
])
    <div class="sm:flex block">
        <select wire:model="{{ $optionModel }}" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-3 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 sm:rounded-l-lg rounded-t-lg sm:rounded-tr-none hover:bg-gray-200 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600 w-full sm:w-fit">Todos los campos
            <option class="bg-white text-left" value="" selected>Todos los campos</option>
            @foreach ($optionsModel as $key => $searchOption)
                <option class="bg-white text-left" value="{{ $key }}"> {{$searchOption}}</option>
            @endforeach
        </select>
        <div class="relative w-full">
            <input wire:model="{{ $searchModel }}" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg sm:border-l-gray-50 border-l-2 border border-gray-300 focus:ring-sc_greeny focus:border-sc_greeny dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 sm:rounded-l-none sm:rounded-tr-lg rounded-b-lg rounded-t-none" placeholder="{{$placeholder}}">
        
        </div>
    </div>
</form>