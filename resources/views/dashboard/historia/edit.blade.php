@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Historia</h1>
    <ul>
        <li>Editar</li>
    </ul>
    
</div>
@stop
@section('content')
<form id="historiaUpdate" class="form" method="POST" action="{{ route('admin.historia.update', $post) }}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    @csrf
    <div class="row mb-3">
        @include('dashboard.partials.banner')
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Formulario para contenido de la historia del codesin</div>
                    <div class="row">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}" >
                            <label for="title">Titulo del primer elemento</label>
                            <input class="form-control form-control-rounded" id="title" name="title" type="text" value="{{ old('title', $post->title)}}" readonly/>
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('body') ? 'has-error' : ''}}">
                            <label for="title">Contenido del elemento</label>
                            <textarea id="editor" class="textarea form-control form-control-rounded" name="body" aria-label="With textarea" style="height: 113px;">{{ old('body', $post->body)}}</textarea>
                            {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonHistoria m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $('.basic-ladda-buttonHistoria').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#historiaUpdate').submit();
        });
    </script>
@endpush


    

    