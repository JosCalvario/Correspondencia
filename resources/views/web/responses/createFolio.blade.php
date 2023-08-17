<x-app-layout>
    <section class="bg-white dark:bg-gray-900 rounded">
        <div class="py-4 px-4 mx-auto w-4/5 lg:py-12">
            <h2 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Solicita un folio de respuesta</h2>
            <h3 class="mb-4 text-md text-gray-700 dark:text-white">Ingresa los datos para ingresar tu solicitud</h3>
            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
            <form action="{{route('folios.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="">
                        <label for="applicant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" name="applicant" id="applicant" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled readonly value="{{auth()->user()->name}}">
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{auth()->user()->email}}">
                    </div>
                    <div class="">
                        <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
                        <input type="text" name="area" id="area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly disabled value="{{auth()->user()->area->name}}">
                    </div>
                    <div>
                        <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de documento</label>
                        <input type="text" name="document_type" id="document_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" list="document_types">
                        <datalist id="document_types">
                         <option value="Oficio"></option>
                         <option value="Memorándum"></option>
                         <option value="Circular"></option>
                        </datalist>
                    </div>
                    <div class="">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="">
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asunto</label>
                        <input type="text" name="subject" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="">
                        <label for="recieves" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receptor</label>
                        <input type="text" name="recieves" id="recieves" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="">
                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo del receptor</label>
                        <input type="text" name="position" id="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="request_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Solicitud</label>
                        <select name="request_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="">
                            <option value="" disabled selected hidden>Selecciona una solicitud</option>
                            @foreach ($requests as $request)
                                <option value="{{$request->id}}">{{$request->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Hiddens--}}
                    <input type="hidden" name="area_id" value="{{auth()->user()->area->id}}">
                    <input type="hidden" name="applicant_id" value="{{auth()->user()->id}}">
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Solicitar folio
                </button>
            </form>
        </div>
      </section>
</x-app-layout>