@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Usuarios</h1>
    <ul>
        <li><a href="">Pages</a></li>
        <li>Usuario nuevo</li>
    </ul>
</div>
@stop
@section('content')
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
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
                <form id="UserCreate" action="{{ route('admin.users.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Nombre</label>
                            <input class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}" />
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" placeholder="" value="{{old('email')}}" />
                        </div>
                        <span id="emailHelp" class="form-text text-muted">La contraseña sera creada y envida alnuevo usuario por email.</span>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonUser m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

    <script>
        $('.basic-ladda-buttonUser').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#UserCreate').submit();
        });
    </script>
@endpush