@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Testimonio</h1>
    <ul>
        <li>Nuevo</li>
    </ul>
</div>
@stop
@section('content')
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="return">
                <a href="{{route('admin.testimonios.index')}}" class="btn btn-info">Regresar</a>
            </div>
            <div class="card-body">
                <div class="card-title mb-3">Formulario</div>
                <div>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <form id="testicreate" action="{{ route('admin.testimonios.store')}}" id="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-md-6 form-group mb-4 {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
                            <label for="">thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" data-default-file="" data-max-file-size-preview="2M" >
                            {!! $errors->first('thumbnail', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="col-xs-12 form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name">Nombre</label>
                                <input class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}" />
                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-xs-12 form-group mb-3 {{ $errors->has('body') ? 'has-error' : ''}}">
                                <label for="body">mensaje</label>
                                <textarea class="form-control" id="body" rows="6" name="body" placeholder="">{{old('body')}} </textarea>
                                {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonTestc m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
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

        $('.basic-ladda-buttonTestc').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#testicreate').submit();
        });
    </script>
@endpush