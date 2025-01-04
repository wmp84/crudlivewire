
<div class="px-3 py-4">
    <div
        class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h1 class="font-bold mb-2">Listado de cursos</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <button wire:navigate href="{{route('curso.create')}}" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Agregar nuevo
            </button>
            @if($response = Session::get("success"))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                     role="alert">
                    <span class="font-medium">Success alert!</span> {{$response}}
                </div>
            @endif
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search"
                       class="px-2 py-3 w-full p-4 ps-10 mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       wire:model="search" wire:keydown="mostrarCurso" placeholder="Buscar curso..."/>
            </div>


            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-blue-600 hover:bg-blue-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3"
                        wire:click="order('nombre_curso')">
                        <div class="flex items-center">
                            Curso
                            @if($sort == 'nombre_curso')
                                @if($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                @endif
                            @else
                                <i class="fas fa-sort ml-2"></i>
                            @endif
                        </div>
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3"
                        wire:click="order('descripcion')">
                        <div class="flex items-center">
                            Descripción
                            @if($sort == 'descripcion')
                                @if($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                @endif
                            @else
                                <i class="fas fa-sort ml-2"></i>
                            @endif
                        </div>
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3"
                        wire:click="order('precio')">
                        <div class="flex items-center">
                            Precio
                            @if($sort == 'precio')
                                @if($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                @endif
                            @else
                                <i class="fas fa-sort ml-2"></i>
                            @endif
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($cursos as $index=>$curso)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{$index+1}}
                        </th>
                        <td class="px-6 py-4">
                            {{$curso->nombre_curso}}
                        </td>
                        <td class="px-6 py-4">
                            {{$curso->descripcion}}
                        </td>
                        <td class="px-6 py-4">
                            {{$curso->precio}}
                        </td>
                        <td class="px-6 py-4">

                            <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    wire:navigate href="{{route("curso.editar",$curso)}}">Editar
                            </button>
                            <button type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    wire:click="confirmarEliminado('{{$curso->id_curso}}','{{$curso->nombre_curso}}')">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@script
<script>
    $wire.on('confirmareliminado', function (mensaje, nombre_curso) {
        Swal.fire({
            title: mensaje,
            text: "Al realizar esta acción, este elemento será enviado a la papelera!",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.dispatch("eliminar");
            }
        });
    });

    $wire.on('borrado', function (mensaje) {
        Swal.fire(
            {
                title: "Notición",
                text: mensaje,
                icon: "success",
            }
        )
    });
</script>
@endscript
