@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Quiénes Somos</h1>
    <ul>
        <li>Editar página Principal </li>
    </ul>
</div>
@stop
@section('content')
<form method="POST" action="{{ route('admin.about.update', $post) }}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    @csrf
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card md-3">
                <div class="card-body"></div>
                <div class="card-title">Banner Area</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group mb-4 {{ $errors->has('banner') ? 'has-error' : ''}}">
                            <label for="">banner el tamaño debe ser 1440px X 451px </label>
                            <input type="file" name="banner" id="banner" data-default-file="{{ $post->urlBanner ? $post->urlBanner : '' }}" data-max-file-size-preview="2M" >
                            {!! $errors->first('banner', '<span class="help-block">:message</span>') !!}
                        </div>
                        
                        <div class="col-md-6 form-group mb-3{{ $errors->has('bannerMobile') ? 'has-error' : ''}}">
                            <label for="bannerMobile">banner versión pequeña debe ser 360px X 400px</label>
                            <input type="file" class="form-control" name="bannerMobile" id="bannerMobile" data-default-file="{{ $post->urlBannerMobile ? $post->urlBannerMobile : '' }}" data-max-file-size-preview="2M">
                            {!! $errors->first('bannerMobile', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Formulario para editar</div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}" >
                                <label for="title">Titulo del primer elemento</label>
                                <input class="form-control form-control-rounded" id="title" name="title" type="text" value="{{ old('title', $post->title)}}" />
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('body') ? 'has-error' : ''}}">
                                <label for="title">Contenido del elemento</label>
                                <textarea id="editor" class="textarea form-control form-control-rounded" name="body" aria-label="With textarea" style="height: 113px;">{{ old('body', $post->body)}}</textarea>
                                {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="row">
                        <div class="col-md-12 form-group mb-3">
                            <label for="photos"></label>
                            <div class="dropzone" id="photos"></div>
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('urlvideo') ? 'has-error' : ''}}" >
                            <label for="urlvideo">Url de video de youtube</label>
                            <input class="form-control form-control-rounded" id="urlvideo" name="urlvideo" type="text" value="{{ old('urlvideo', $post->urlvideo)}}" />
                            {!! $errors->first('urlvideo', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-button m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@if ($post->photos->count())
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Imagenes</div>
                <div class="row">
                    @foreach ($post->photos as $photo)
                    <form method="POST" action=" {{route('admin.photos.destroy', $photo)}}">
                        {{method_field('DELETE')}} @csrf
                        <div class="col-md-3">
                            <button class="btn btn-danger btn-sx" style="position:absolute"><i class="fas fa-times"></i></button>
                            <img class="img-responsive" src ="{{ url($photo->url)}}"/>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@stop

@push('style')
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.date.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/js/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" >
    <link href="{{asset('dashboard/css/plugins/dropzone.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
@endpush
@push('script')
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropzone.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    
    <script>
        $('#picker2, #picker3').pickadate({
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdaysShort: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            today: 'Hoy',
            clear: 'Limpiar',
            close: 'Cerrar',
            formatSubmit: 'yyyy/mm/dd'
        });

        $('#banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
        $('#bannerMobile').dropify();

        var myDropzone = new Dropzone('.dropzone', {
            url:'./photos',
            paramName: 'photo',
            acceptedFile:'image/*',
            maxFilesize: 2,
            headers: {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            dictDefaultMessage: 'Arrastra las todos aquí para subirlas'
        });

        myDropzone.on('error', function(file, res){
            var msn = res.errors.photo[0];
            $('.dz-error-message:last > span').text(msn);
        });

        Dropzone.autoDiscover = false;
    </script>
@endpush


    

    