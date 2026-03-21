@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Contenido de interes</h1>
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
                        <h4 class="card-title mb-3">Listado de contenidos de interes</h4>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right">
                        <a href="{{route('admin.contenidos.create')}}">
                            <button class="btn btn-primary ripple m-1" type="button">Crear</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="#post-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 10%"></th>
                                <th style="width: 15%">titulo</th>
                                <th>cuerpo</th>
                                <th style="width: 10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($Posts as $Post)
                                <tr>
                                    <td class="align-middle">{{ $loop->index + 1 }}</td>
                                    <th class="text-center">
                                        <div >
                                            <a class="image-popup" href="{{ $Post->urlimage}}">
                                                <img src="{{ $Post->urlimage}}" alt="" class="avatar-md rounded mr-3 image-popup">
                                            </a>
                                        </div>
                                            
                                    </th>
                                    <td class="align-middle">{{ $Post->title }}</td>
                                    <td class="align-middle">{{ $Post->excerpt }}</td>
                                    <td class="align-middle">
                                        <a class="text-success mr-2" href="{{ route('admin.contenidos.edit', $Post)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <form method="POST" id="cnDelete{{$Post->id}}"  action="{{ route('admin.contenidos.destroy',$Post)}}" style="display: inline">
                                            @csrf {{method_field('DELETE')}}
                                            <button class="text-danger mr-2" style="border: none; background: transparent; cursor: pointer;"><i class="nav-icon i-Close-Window font-weight-bold delete-confirm-contenido"></i></button>
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
        .image-popup {cursor: -webkit-zoom-in;}
    </style>

@endpush

@push('script')
    <script src="{{asset('dashboard/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>

    <script>
        $('#post-table').DataTable({
        "order": [[3, "desc"]]
    }); // multi column ordering
    $('.delete-confirm-contenido').on('click', function (event) {
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
    /*------------------------------------
        Video Player
    --------------------------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        zoom: {
            enabled: true,
        },
        iframe: {
            patterns: {
                youtube_short: {
                    index: 'https://youtu.be/',
                    id: 'youtu.be/',
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                },
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                }
            },
            srcAction: 'iframe_src',
        }
    });

    $('.image-popup').magnificPopup({
        type: 'image',
        gallery:{
            enabled:false
        }
    });
    </script>
@endpush