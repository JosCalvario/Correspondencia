@if ($errors->any())
    <div {{ $attributes }}>
        <div class="absolute bottom-0 right-0 z-50 flex flex-col justify-center items-center mr-5 bluebag gap-1">
            @foreach ($errors->all() as $error)
             <div
              class="bg-red-600 w-full text-white font-semibold flex items-center justify-center m-5 mt-0 p-3 text-base rounded-lg gap-2 z-50">
              <i class="bi bi-x-circle"></i>
              Error:
              {{ $error }}
           
             </div>
            @endforeach
           
           </div>
    </div>
@endif
