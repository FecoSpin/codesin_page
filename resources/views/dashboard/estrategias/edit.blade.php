@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Estrategias</h1>
    <ul>
        <li>Editar</li>
    </ul>
</div>
@stop
@section('content')
<form id="eUpdate" method="POST" action="{{ route('admin.estrategias.update' , $post) }}" enctype="multipart/form-data">
    @csrf {{method_field('PUT')}}
    <div class="row mb-3">
        @include('dashboard.partials.banner')
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Formulario para editar</div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}" >
                                <label for="title">Titulo de la publicación</label>
                                <input class="form-control form-control-rounded" id="title" name="title" type="text" value="{{ old('title', $post->title)}}" />
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('body') ? 'has-error' : ''}}">
                                <label for="title">Contenido de la publicació</label>
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
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('excerpt') ? 'has-error' : ''}}">
                            <label for="excerpt">Titulo del thumbnail</label>
                            <input type="text" class="form-control form-control-rounded" id="excerpt" name="excerpt" value="{{ old('excerpt', $post->excerpt)}}" />
                            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
                            <label for="thumbnail">thumbnail </label>
                            <input type="file" name="thumbnail" id="thumbnail" data-default-file="{{ $post->urlimage ? $post->urlimage : '' }}" data-max-file-size="2M" >
                            {!! $errors->first('thumbnail', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary basic-ladda-buttonEstrategiasUpdate">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop

@push('style')
    <link href="{{asset('dashboard/js/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" >
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
@endpush
@push('script')
    <script src="{{asset('dashboard/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('dashboard/lang/summernote-es-ES.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    

    
    <script>

        $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es demasiado grande. (2M max).',
                'imageFormat': 'El formato de imagen no está permitido. (solo imagen).'
            }
        });

        $('#thumbnail').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es demasiado grande. (2M max).',
                'imageFormat': 'El formato de imagen no está permitido. (solo imagen).'
            }
        });
        $('.basic-ladda-buttonEstrategiasUpdate').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#eUpdate').submit();
        });
    </script>
@endpush