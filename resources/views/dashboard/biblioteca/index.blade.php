@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Biblioteca</h1>
    <ul>
        <li>inicio</li>
    </ul>
</div>
@stop
@section('content')
    <!-- end of col-->
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <h4 class="card-title mb-3">Listado de la biblioteca</h4>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right">
                        {{-- <a href="{{route('admin.biblioteca.create', $category_id)}}"> --}}
                        <a href="{{route('admin.biblioteca.create')}}">
                            <button class="btn btn-primary ripple m-1" type="button">Crear</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="post-table" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th style="width: 10%"></th>
                                <th style="width: 15%">Título</th>
                                <th style="width: 15%">Categoría</th>
                                <th style="width: 15%">Subcategoría</th>
                                <th>Cuerpo</th>
                                <th style="width: 10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($Posts as $Post)
                                <tr>
                                    {{-- <td class="align-middle">{{ $loop->index + 1 }}</td> --}}
                                    <th class="text-center align-middle">
                                        <div >
                                            <a  href="{{ $Post->urlArchivo}}" target="_self" download>
                                                Descargar
                                            </a>
                                        </div>

                                    </th>
                                    <td class="align-middle">{{ $Post->titulo }}</td>
                                    <td class="text-center align-middle">{{ $Post->Category_nombre}}</td>
                                    <td class="text-center align-middle">{{ $Post->subCategories_nombre}}</td>
                                    <td class="align-middle">{{ $Post->excerpt }}</td>
                                    <td class="align-middle">
                                        <a class="text-success mr-2" href="{{ route('admin.biblioteca.edit', $Post)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <form method="POST" class="formulario" id="bbDelete{{$Post->id}}"  action="{{ route('admin.biblioteca.destroy',$Post)}}" style="display: inline">
                                            @csrf {{method_field('DELETE')}}
                                            <button class="text-danger mr-2" style="border: none; background: transparent; cursor: pointer;"><i id="bbDeleted{{$Post->id}}" class="nav-icon i-Close-Window font-weight-bold delete-confirm-biblioteca"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('style')
    <link rel="stylesheet" href="{{asset('dashboard/css/plugins/datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <style>

    </style>

@endpush

@push('script')
    <script src="{{asset('dashboard/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>

    <script>
        $.extend( true, $.fn.dataTable.defaults, {
            "language": {
                "decimal": ",",
                "thousands": ".",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoPostFix": "",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Buscar:",
                "searchPlaceholder": "Término de búsqueda",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "aria": {
                    "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                    "create": "Nuevo",
                    "edit": "Cambiar",
                    "remove": "Borrar",
                    "copy": "Copiar",
                    "csv": "fichero CSV",
                    "excel": "tabla Excel",
                    "pdf": "documento PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad columnas",
                    "collection": "Colección",
                    "upload": "Seleccione fichero...."
                },
                "select": {
                    "rows": {
                        _: '%d filas seleccionadas',
                        0: 'clic fila para seleccionar',
                        1: 'una fila seleccionada'
                    }
                }
            }
        } );
        $('#post-table').DataTable({
            "paging":   false,
            // "order": [[2, "ASC"],[3, "DESC"]]
    }); // multi column ordering
    $('.delete-confirm-biblioteca').on('click', function (event) {
        event.preventDefault();
        const form = $(this).parents("form").attr("id");
        const url = $(this).attr('href');
        swal({
            title: 'Estas seguro?',
            text: 'Este registro y sus detalles se eliminarán de forma permanente!',
            icon: 'warning',
            buttons: ["Cancel", "Sí!"],
        }).then(function(value) {
            if (value) {
                $('#'+form).submit();
            }
        });
    });

    </script>
@endpush
