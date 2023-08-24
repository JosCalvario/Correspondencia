<button data-modal-toggle="{{$toggleId}}"
class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
type="button">
<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
 xmlns="http://www.w3.org/2000/svg">
 <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
</svg>
</button>
<div id="{{$toggleId}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
  <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
              <!-- Modal header -->
              <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                  <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                      <h3 class="font-semibold ">
                          {{$modalTitle}}
                      </h3>
                      @isset($modalHeader)
                          <p class="font-bold">
                          {{$modalHeader}}
                      </p>
                      @endisset
                      
                  </div>
                  <div>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{$toggleId}}">
                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                          <span class="sr-only">Cerrar modal</span>
                      </button>
                  </div>
              </div>
              <dl>
                   {{$dataList}}
              </dl>
              <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-3 sm:space-x-4">
                       {{$modalActions}}   
                  </div>              
              </div>
      </div>
  </div>
</div>

{{-- Edit Modal --}}
<div></div>

{{-- Delete Modal --}}
</div>