@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Codetalks</h1>
    <ul>
        <li><a href=""> </a></li>
        <li>inicio</li>
    </ul>
   
</div>
@stop
@section('content')
    <form id="Bannerform" action="{{ route('admin.codetalks.banners', $banners)}}" id="form" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="col-md-12 mt-2 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card md-3">
                                <div class="card-body"></div>
                                <div class="card-title">Banner Area</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-4 {{ $errors->has('banner') ? 'has-error' : ''}}">
                                            <label for="">banner el tamaño debe ser 1440px X 451px y pesar menos de 2Mb </label>
                                            <input class="banner" type="file" name="banner" id="banner" data-default-file="{{ $banners->urlBanner ? $banners->urlBanner : '' }}" data-max-file-size-preview="4M" >
                                            {!! $errors->first('banner', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        
                                        <div class="col-md-6 form-group mb-3{{ $errors->has('bannerMobile') ? 'has-error' : ''}}">
                                            <label for="bannerMobile">banner versión pequeña debe ser 360px X 400px y pesar menos de 2Mb </label>
                                            <input type="file" class="form-control banner" name="bannerMobile" id="bannerMobile" data-default-file="{{ $banners->urlBannerMobile ? $banners->urlBannerMobile : '' }}" data-max-file-size-preview="4M">
                                            {!! $errors->first('bannerMobile', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonBanner m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end of col-->
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-right">
                            <button class="btn btn-primary ripple m-1" data-toggle="modal" data-target="#codetalks" type="button">Nuevo</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="#post-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Extracto</th>
                                <th>Fecha</th>
                                <th style="width: 8%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->excerpt }}</td>
                                    <td>{{ $post->published_at }}</td>
                                    <td>
                                        <a class="text-success mr-2" href="{{ route('admin.codetalks.edit', $post)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <form method="POST" id="ctDelete{{$post->id}}" action="{{ route('admin.codetalks.destroy',$post)}}" style="display: inline">
                                            @csrf {{method_field('DELETE')}}
                                            <button class="text-danger mr-2" style="border: none; background: transparent; cursor: pointer;"><i class="nav-icon i-Close-Window font-weight-bold delete-confirm"></i></button>
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
    <!-- Modal -->
    <div class="modal fade" id="codetalks" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Titulo del codetalk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.codetalks.store', '#create-codetalks') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('titleCodetalk') ? 'has-error' : ''}}" >
                                <label for="titleCodetalk"></label>
                                <input class="form-control form-control-rounded" id="titleCodetalk" name="titleCodetalk" type="text" value="{{ old('titleCodetalk')}}" required/>
                                {!! $errors->first('titleCodetalk', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary ml-2" type="submit">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@push('style')
    <link rel="stylesheet" href="{{asset('dashboard/css/plugins/datatables.min.css')}}" />
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
@endpush

@push('script')
    <script src="{{asset('dashboard/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    <script>
     $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
        $('#post-table').DataTable({
        "order": [[3, "desc"]]
    }); // multi column ordering
    $('.delete-confirm').on('click', function (event) {
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
    if(window.location.hash == '#create-codetalks')
        {
            $('#codetalks').modal('show');
        }
        $('#codetalks').on('hide.bs.modal',function(){
            window.location.hash = '#';
        });
        $('#codetalks').on('shown.bs.modal',function(){
            $('#title').focus();
            window.location.hash = '#create-codetalks';
        });
    </script>
@endpush