@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Contenido de interes</h1>
    <ul>
        <li>Nuevo</li>
    </ul>
</div>
@stop
@section('content')
<form id="interesU" method="POST" action="{{ route('admin.contenidos.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="return">
                    <a href="{{route('admin.contenidos.index')}}" class="btn btn-info">Regresar</a>
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}" >
                                <label for="title">Titulo del primer elemento</label>
                                <input class="form-control form-control-rounded" id="title" name="title" type="text" value="{{ old('title')}}" />
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('excerpt') ? 'has-error' : ''}}">
                                <label for="title">Contenido del elemento</label>
                                <div id="charNum">190 / 190</div>
                                <textarea id="field" class="form-control form-control" maxlength="192" rows="5" name="excerpt" aria-label="With textarea" >{{ old('excerpt')}}</textarea>
                                {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
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
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('urlvideo') ? 'has-error' : ''}}" >
                            <label for="urlvideo">Url de video de youtube</label>
                            <input class="form-control form-control-rounded" id="urlvideo" name="urlvideo" type="text" value="{{ old('urlvideo')}}" />
                            {!! $errors->first('urlvideo', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
                            <label for="thumbnail">thumbnail del video </label>
                            <input type="file" name="thumbnail" id="thumbnail" data-default-file="" data-max-file-size-preview="2M" >
                            {!! $errors->first('thumbnail', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonInteU m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop

@push('style')
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
    <style>
        #charNum {position: absolute;  right: 19px;  top: 0;}
    </style>
@endpush
@push('script')
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    
    <script>

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

        $("#field").keyup(function(){
            el = $(this);
            if(el.val().length >= 190){
                el.val( el.val().substr(0, 190) );
            } else {
                $("#charNum").text(190-el.val().length + " / 190");
            }
        });

        $('.basic-ladda-buttonInteU').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#interesU').submit();
        });
    </script>
@endpush


    

    