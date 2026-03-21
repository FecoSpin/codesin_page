@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Proyectos @if (isset($tag)) {{$tag->name }}@endif</h1>
    <ul>
        <li>inicio</li>
    </ul>
</div>
@stop
@section('content')
    <form id="Bannerform" action="{{ route('admin.tags.update', $tag)}}" id="form" method="post" enctype="multipart/form-data">
        @csrf 
        {{method_field('PUT')}}
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
                                            <input class="banner" type="file" name="banner" id="banner" data-default-file="{{ $tag->banners ? $tag->banners->urlBanner : '' }}" data-max-file-size-preview="4M" >
                                            {!! $errors->first('banner', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        
                                        <div class="col-md-6 form-group mb-3{{ $errors->has('bannerMobile') ? 'has-error' : ''}}">
                                            <label for="bannerMobile">banner versión pequeña debe ser 360px X 400px y pesar menos de 2Mb </label>
                                            <input type="file" class="form-control banner" name="bannerMobile" id="bannerMobile" data-default-file="{{ $tag->banners ? $tag->banners->urlBannerMobile : '' }}" data-max-file-size-preview="4M">
                                            {!! $errors->first('bannerMobile', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3 {{ $errors->has('urlvideo') ? 'has-error' : ''}}" >
                                            <label for="urlvideo">Url de video de youtube</label>
                                            <input class="form-control form-control-rounded" id="urlvideo" name="urlvideo" type="text" value="{{ old('urlvideo', !$tag->banners ?  '' : $tag->banners->urlvideo)}}" />
                                            {!! $errors->first('urlvideo', '<span class="help-block">:message</span>') !!}
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
                            <button class="btn btn-primary ripple m-1" data-toggle="modal" data-target="#proyectos" type="button">Crear proyecto</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="#post-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Extracto</th>
                                <th>Zona</th>
                                <th style="width: 8%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->excerpt }}</td>
                                    <td>@foreach ($post->tags as $tag)
                                        <div class="tag text-center {{$tag->id == 1 ? 'verde': ''}}{{$tag->id == 2 ? 'amarillo': ''}}{{$tag->id == 3 ? 'rojo': ''}}{{$tag->id == 4 ? 'azul': ''}}" style="margin: 0">{{$tag->name}} </div>
                                    @endforeach</td>
                                    <td>
                                        <a class="text-success mr-2" href="{{ route('admin.proyectos.edit', $post)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <form method="POST" action="{{ route('admin.proyectos.destroy',$post)}}" style="display: inline">
                                            @csrf {{method_field('DELETE')}}
                                            <button class="text-danger mr-2" style="border: none; background: transparent; cursor: pointer;"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>
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
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
    <style>
        .verde { background-color: #DAE8D0; color: #73AD49; font-weight: 700}
        .amarillo { background-color: #F5EAD6; color: #D89000; font-weight: 700}
        .rojo { background-color: #FBE4DD; color: #C5340B; font-weight: 700}
        .azul { background-color: #E6F0FE; color: #2567BF; font-weight: 700}
    </style>
@endpush

@push('script')
    <script src="{{asset('dashboard/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    <script>
        $('#post-table').DataTable({
        "order": [[3, "desc"]]
    }); // multi column ordering
    $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
    
        $('.basic-ladda-buttonBanner').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#Bannerform').submit();
        });
    </script>
@endpush