@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Sinaloa en Números</h1>
    <ul>
        <li>Editar</li>
    </ul>
</div>
@stop
@section('content')
<form id="sinaloaNumerosUpdate" method="POST" action="{{ route('admin.sinaloaNumeros.update', $post) }}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    @csrf
    <div class="row mb-3">
        <div class="return">
            <a href="{{route('admin.sinaloaNumeros.index')}}" class="btn btn-info">Regresar</a>
        </div>
        @include('dashboard.partials.banner')
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Formulario para Sinaloa en Números</div>
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
                            <div class="col-md-6 form-group mb-3">
                                <label for="archivo">Archivo en pdf</label>
                                <input type="file" name="archivo" id="archivo" data-default-file="" data-max-file-size-preview="2M" >
                                {!! $errors->first('archivo', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-md-6 form-group mb-3{{ $errors->has('imgBody') ? 'has-error' : ''}}">
                                <label for="imgBody">imagen del pdf</label>
                                <input type="file" class="form-control banner" name="imgBody" id="imgBody" data-default-file="{{ $post->urlimage ? $post->urlimage : '' }}" data-max-file-size="2M">
                                {!! $errors->first('thumbnailspotify', '<span class="help-block">:message</span>') !!}
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
                            <label for="picker2">fecha de publicación </label>
                            <input class="form-control" id="picker2" placeholder="dd-mm-yyyy" name="published_at" data-value="{{ old('published_at', $post->published_at ? $post->published_at : null )}}" />
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('excerpt') ? 'has-error' : ''}}">
                            <label for="excerpt">Extracto publicación</label>
                            <textarea class="form-control form-control-rounded" id="excerpt" name="excerpt" cols="10" rows="10"  >{{ old('excerpt', $post->excerpt)}}</textarea>
                            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>
                        <input type="hidden" name="category_id" value="9">
                        <div class="col-md-12 form-group mb-3">
                            <div class="dropzone"></div>
                        </div>
                        <input type="hidden" name="tags" value="1" >
                        
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <button type="submit" class="btn btn-primary ladda-button basic-ladda-button basic-ladda-buttonsinaloaNumeros m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.partials.homeXtra')
</form>
@if ($post->photos->count())
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Imagenes</div>
                <div class="row">
                    @foreach ($post->photos as $photo)
                    <div class="col-md-3">
                    <form method="POST" action=" {{route('admin.photos.destroy', $photo)}}">
                        {{method_field('DELETE')}} @csrf
                        <div class="col-md-12">
                            <button class="btn btn-danger btn-sx" style="position:absolute"><i class="fas fa-times"></i></button>
                            <img class="d-block w-100 rounded" src ="{{ url($photo->url)}}" alt="Second slide">
                        </div>
                    </form>
                    </div>
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

    
    <script>
        $('#picker2, #picker3').pickadate({
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdaysShort: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            today: 'Hoy',
            clear: 'Limpiar',
            close: 'Cerrar',
            formatSubmit: 'yyyy/mm/dd'
        });
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

        $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
        $('.basic-ladda-buttonsinaloaNumeros').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#sinaloaNumerosUpdate').submit();
        });
    </script>
@endpush