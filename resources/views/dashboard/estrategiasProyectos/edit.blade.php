@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Proyecto de la @if (isset($post->estrategias)) {{$post->estrategias[0]->name }} @endif</h1>
    <ul>
        <li>Editar</li>
    </ul>
</div>
@stop
@section('content')
<form id="ProjectsUpdate" method="POST" action="{{ route('admin.estrategiasProyectos.update', $post) }}" enctype="multipart/form-data">
    @csrf {{method_field('PUT')}}
    
    <div class="row mb-3">
        <div class="return">
            <a href="{{route('admin.estrategias.show', $return)}}" class="btn btn-info">Regresar</a>
        </div>
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
                            <label for="excerpt">Extracto publicación</label>
                            <textarea class="form-control form-control-rounded" id="excerpt" name="excerpt" cols="10" rows="10"  >{{ old('excerpt', $post->excerpt)}}</textarea>
                            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('tag_id') ? 'has-error' : ''}}">
                            <label for="picker1">Seleccione una Zona</label>
                            <select class="form-control form-control-rounded" name="tag_id" >
                                <option value="">Seleccionar...</option>
                                @foreach ($tags as $tag)
                                    <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}} value="{{ $tag->id }}">{{$tag->name}}</option>
                                    {{-- <option value="{{$tag->id}}" {{ old('tag_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$tag->name}}</option> --}}
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <div class="dropzone"></div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonProyectos m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <link href="{{asset('dashboard/js/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" >
    <link href="{{asset('dashboard/css/plugins/dropzone.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/dropzone.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
@endpush
@push('script')
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropzone.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>

    
    <script>
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
        $('.basic-ladda-buttonposts').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#ProjectsUpdate').submit();
        });
    </script>
@endpush