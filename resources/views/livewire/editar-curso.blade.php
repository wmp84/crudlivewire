<div class="px-3 py-4">

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="nombre_curso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre curso</label>
            <input type="text" id="nombre_curso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="cursoeditar.nombre_curso" placeholder="Nombre del curso" required/>
            @error('curso.nombre_curso')
            <span class="text-red-600 m-2">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
            <input type="text" id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="cursoeditar.descripcion" placeholder="Breve descripción" required/>
        </div>
    </div>
    <div class="mb-6">
        <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
        <input type="text" id="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="cursoeditar.precio" placeholder="Precio" required/>
        @error('curso.precio')
        <span class="text-red-600 m-2">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" wire:click="updateDatCurso" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
       Actualizar
    </button>

</div>
