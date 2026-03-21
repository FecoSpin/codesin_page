@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Principal</h1>
    <ul>
        <li><a href="">pagina</a></li>
        <li>Editar página Principal </li>
    </ul>
    
</div>
@stop
@section('content')
<form id="pageUpdate" class="form" method="POST" action="{{ route('admin.paginas.update', $post) }}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    @csrf
    <div class="row mb-3">
        @include('dashboard.partials.banner')
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Formulario para contenido de la pagina {{$post->pageName}}</div>
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
                    @if ($post->id == 1)
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonpages m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if ($post->id > 1)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="row">
                        @if ($post->id == 3)
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('externalUrl') ? 'has-error' : ''}}" >
                            <label for="externalUrl">Url externa</label>
                            <input class="form-control form-control-rounded" id="externalUrl" name="externalUrl" type="text" value="{{ old('externalUrl', $post->externalUrl)}}" />
                            {!! $errors->first('externalUrl', '<span class="help-block">:message</span>') !!}
                        </div>
                        @endif
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('img') ? 'has-error' : ''}}">
                            <label for="img">El tamaño debe ser 356px X 725px </label>
                            <input type="file" class="thumbnail" name="img" id="img" data-default-file="{{ $post->urlimage ? $post->urlimage: '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3{{ $errors->has('imgMobile') ? 'has-error' : ''}}">
                            <label for="imgMobile">imagen pequeña debe se 360px X 224px</label>
                            <input type="file" class="form-control thumbnail" name="imgMobile" id="imgMobile" data-default-file="{{ $post->urlimageMobile ? $post->urlimageMobile : '' }}" data-max-file-size-preview="4M">
                            {!! $errors->first('imgMobile', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonpages m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    @if ($post->id == 1)
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Segunda Sección</div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('titleSection') ? 'has-error' : ''}}" >
                                <label for="titleSection">Titulo del primer elemento</label>
                                <input class="form-control form-control-rounded" id="titleSection" name="titleSection" type="text" value="{{ old('titleSection', $post->sections->title)}}" />
                                {!! $errors->first('titleSection', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('bodySection') ? 'has-error' : ''}}">
                                <label for="title">Contenido del elemento</label>
                                <textarea class="textarea form-control form-control-rounded" name="bodySection" aria-label="With textarea" style="height: 113px;">{{ old('bodySection', $post->sections->body)}}</textarea>
                                {!! $errors->first('bodySection', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Seccion de los iconos</div>
                        <div class="row">
                            @include('dashboard.partials.iconsArea')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</form>


@stop

@push('style')
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/js/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" >
    
@endpush
@push('script')
    <script src="{{asset('dashboard/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropzone.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/lang/summernote-es-ES.js')}}"></script>
    
    
    <script>
         $('div.note-group-select-from-files').remove();

        $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
        $('.thumbnail').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
        $('.basic-ladda-buttonpages').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#pageUpdate').submit();
        });
    </script>
@endpush


    

    