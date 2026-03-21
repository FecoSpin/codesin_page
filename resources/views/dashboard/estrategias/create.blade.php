@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Estrategias</h1>
    <ul>
        <li>Nuevo</li>
    </ul>
</div>
@stop
@section('content')
<form id="eStore" method="POST" action="{{ route('admin.estrategias.store') }}" enctype="multipart/form-data">
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
                            <input class="banner" type="file" name="banner" id="banner" data-default-file="" data-max-file-size-preview="4M" >
                            {!! $errors->first('banner', '<span class="help-block">:message</span>') !!}
                        </div>
                        
                        <div class="col-md-6 form-group mb-3{{ $errors->has('bannerMobile') ? 'has-error' : ''}}">
                            <label for="bannerMobile">banner versión pequeña debe ser 360px X 400px</label>
                            <input type="file" class="form-control banner" name="bannerMobile" id="bannerMobile" data-default-file="" data-max-file-size-preview="4M">
                            {!! $errors->first('bannerMobile', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('urlvideo') ? 'has-error' : ''}}" >
                            <label for="urlvideo">Url de video de youtube</label>
                            <input class="form-control form-control-rounded" id="urlvideo" name="urlvideo" type="text" value="{{ old('urlvideo')}}" />
                            {!! $errors->first('urlvideo', '<span class="help-block">:message</span>') !!}
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
                                <label for="title">Titulo de la publicación</label>
                                <input class="form-control form-control-rounded" id="title" name="title" type="text" value="{{ old('title')}}" />
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('body') ? 'has-error' : ''}}">
                                <label for="title">Contenido de la publicació</label>
                                <textarea id="editor" class="textarea form-control form-control-rounded" name="body" aria-label="With textarea" style="height: 113px;">{{ old('body')}}</textarea>
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
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('excerpt') ? 'has-error' : ''}}">
                            <label for="excerpt">Titulo del thumbnail</label>
                            <textarea class="form-control form-control-rounded" id="excerpt" name="excerpt" cols="10" rows="10"  >{{ old('excerpt')}}</textarea>
                            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
                            <label for="thumbnail">thumbnail </label>
                            <input type="file" name="thumbnail" id="thumbnail" data-default-file="" data-max-file-size-preview="4M" >
                            {!! $errors->first('thumbnail', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary basic-ladda-buttonEstrategias">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop

@push('style')
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.date.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/js/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" >
    <link href="{{asset('dashboard/css/plugins/dropzone.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/dropzone.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
@endpush
@push('script')
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropzone.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/lang/summernote-es-ES.js')}}"></script>

    
    <script>
        // Summernote
        $('.textarea').summernote({
            height: 300,   //set editable area's height
            lang: 'es-ES', // default: 'en-US'
            toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ]
        });

        $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });

        $('#thumbnail').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
        $('.basic-ladda-buttonEstrategias').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#eStore').submit();
        });
    </script>
@endpush