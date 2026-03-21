@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Aviso de privacidad</h1>
    <ul>
        <li>Nuevo</li>
    </ul>
</div>
@stop
@section('content')
<form id="formBB" method="POST" action="{{ route('admin.aviso.store') }}" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success text-center">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"></div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}" >
                                <label for="title">Titulo</label>
                                <input class="form-control form-control-rounded" id="titulo" name="titulo" type="text" value="{{ old('titulo', $aviso->vc_nombre)}}" />
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-primary ladda-button m-4" id="dynamic-area" ><span class="ladda-label">Nuevo</span></button>
                                </div>
                            </div>
                            
                            <div class="col-md-12 form-group" id="dynamicAddRemove1">
                                <label for="title">Contenido</label>
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>
                                        <label for="title">Titulo o nombre del área</label>
                                            <input type="text" name="addMoreInputFields[0][titulo]" value="" placeholder="Enter subject" class="form-control" required /></th>
                                        <th><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="addMoreInputFields[0][subject]" value="" placeholder="Enter subject" class="form-control" required /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonBB m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                </div>
            </div>
            
        </div>
    </div>
</form>

@stop

@push('script')
    
    <script>
        var i = 0;
        var area = 0;
        $("#dynamic-area").click(function () {
            ++area;
            $("#dynamicAddRemove1").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
        });
        //contenido
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
        });
        
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

        $('.basic-ladda-buttonBB').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#formBB').submit();
        });
    </script>
@endpush


    

    