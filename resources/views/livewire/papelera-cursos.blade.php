<div class="px-3 py-4">


    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h1 class="font-bold mb-2">Cursos en papelera</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-blue-600 hover:bg-blue-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre curso
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripción
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($cursos_papelera as $index=>$curso)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" wire:click="activar('{{$curso->id_curso}}')">Activar</button>

                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" wire:click="ConfirmarBorrado('{{$curso->id_curso}}','{{$curso->nombre_curso}}')">Borrar</button>
                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="px-3 py-2">
                        <span class="px-3 py-2 text-red-500">
                        Ningún registro por mostrar
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@script
    <script>
        $wire.on('confirm-borrado', function (mensaje){
            Swal.fire({
                title: mensaje,
                text: "Esta acción es irrevesrible, desea continuar!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si"
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.dispatch("ok-borrado");
                }
            });
        });
        $wire.on('success-borrado',function (msj){
            Swal.fire({
                title:"Mensaje",
                text:msj,
                icon:"success"
            })
        })

        $wire.on('activado',function (msj){
            Swal.fire({
                title:"Mensaje",
                text:msj,
                icon:"success"
            })
        })
    </script>
@endscript
