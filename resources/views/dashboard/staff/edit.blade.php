@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Staff</h1>
    <ul>
        <li>Editar Personal</li>
    </ul>
</div>
@stop
@section('content')
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="return">
                <a href="{{route('admin.departamentos.show', $staff->departamento->id)}}" class="btn btn-info">Regresar</a>
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
                <form id="staffupdate" action="{{ route('admin.staff.update', $staff)}}" id="form" method="post" enctype="multipart/form-data">
                    @csrf 
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6 colxs-12">
                            <div class="col-xs-12 form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name">Nombre</label>
                                <input class="form-control" id="name" name="name" placeholder="" value="{{old('name', $staff->name)}}" />
                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-xs-12 form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" placeholder="" value="{{old('email', $staff->email)}}" />
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-xs-12 form-group mb-3 {{ $errors->has('job') ? 'has-error' : ''}}">
                                <label for="email">Puesto</label>
                                <input class="form-control" id="job" name="job" placeholder="" value="{{old('job', $staff->job)}}" />
                                {!! $errors->first('job', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-xs-12 form-group mb-3 {{ $errors->has('departamento_id') ? 'has-error' : ''}}">
                                <label for="email">Departamento</label>
                                <select class="form-control" name="departamento_id" id="departamento_id">
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{old('departamento_id',$staff->departamento_id)}}">{{ $departamento->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('departamento_id', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-4 {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
                            <label for="">imagen del personal </label>
                            <input type="file" name="thumbnail" id="thumbnail" data-default-file="{{ $staff->urlimg ? $staff->urlimg : '' }}" data-max-file-size-preview="2M" >
                            {!! $errors->first('thumbnail', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonStaffu m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
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
        $('.basic-ladda-buttonStaffu').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#staffupdate').submit();
        });
    </script>
@endpush