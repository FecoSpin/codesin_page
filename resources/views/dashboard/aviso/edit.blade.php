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
<form id="formaviso" method="POST" action="{{ route('admin.aviso.update', '$aviso') }}" enctype="multipart/form-data">
    @csrf {{method_field('PUT')}}
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
        <li>Favor de verificar los campos en rojo</li>
            <!-- @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            <li>Favor de verificar los campos en rojo</li>
            @endforeach -->
        </ul>
    </div>
    @endif
    <div class="alert alert-danger" style="display:none;" role="alert">
        <ul>
        <li>Favor de verificar los campos en rojo</li>
            <!-- @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            <li>Favor de verificar los campos en rojo</li>
            @endforeach -->
        </ul>
    </div>
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
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('vc_nombre') ? 'has-error' : ''}}" >
                                <label for="title">Título</label>
                                <input class="form-control form-control-rounded  {{ $errors->has('vc_nombre') ? 'has-error' : ''}}" id="vc_nombre" name="vc_nombre" type="text" value="{{ old('vc_nombre', $aviso->vc_nombre)}}" />
                                {!! $errors->first('vc_nombre', '<span class="help-block">:message</span>') !!}
                                <span class="help-block has-error" style="display:none;">:El campo Título o área es obligatorio.</span>
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-primary ladda-button m-4" id="dynamic-area" ><span class="ladda-label">Nuevo</span></button>
                                </div>
                            </div>
                            <div id="areasContainer" class="col-md-12 form-group mb-3">
                            @if(isset($aviso->avisosarea) && count($aviso->avisosarea) > 0 )
                                @foreach($aviso->avisosarea as $key =>$aviso)
                                <div class="col-md-12 form-group mb-3 AreaAddRemove" id="dynamicAddRemove_{{$key}}">
                                    <label for="title">Título o nombre del área</label>
                                    <input type="hidden" name="avisoAreas[{{$key}}][id]" value="{{$aviso->id}}" />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control form-control-rounded {{ $errors->has('avisoAreas.'.$key.'.vc_nombre') ? 'has-error' : ''}}" id="titulo" name="avisoAreas[{{$key}}][vc_nombre]" type="text" value="{{ old('avisoAreas.'.$key.'.vc_nombre', $aviso->vc_nombre)}}" />
                                            {!! $errors->first('avisoAreas.'.$key.'.vc_nombre', '<span class="help-block has-error">:message</span>') !!}
                                            <span class="help-block has-error" style="display:none;">:El campo Título o área es obligatorio.</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <form action="" method="post" style="display:none"></form>
                                            <form method="POST" id="areaDelete{{$aviso->id}}" class="borrar" action="{{ route('admin.avisos.destroy',$aviso->id)}}" style="display: inline">
                                                @csrf {{method_field('DELETE')}}
                                                <button type="button"  class="btn btn-danger ladda-button mr-4 btn-delete-confirm" id="dynamic-ar" ><span class="ladda-label">eliminar</span></button>
                                            </from>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="button" onclick="addArchivo({{$key}})" class="btn btn-warning ladda-button m-4" id="dynamic-ar" ><span class="ladda-label">Agregar otro archivo</span></button>
                                        </div>
                                    </div>
                                    <table class="table table-bordered" id="dynamicAddRemove_{{$key}}">
                                    <tbody>
                                        @foreach($aviso->avisoscontenidos as $k =>$contenido)
                                        <tr>
                                            <td><input type="hidden" name="avisoAreas[{{$key}}][addMoreInputFields][{{$k}}][id]" value="{{$contenido->id}}"><input type="text" name="avisoAreas[{{$key}}][addMoreInputFields][{{$k}}][vc_nombre]" value="{{$contenido->vc_nombre}}" placeholder="Nombre del archivo" class="form-control" required /><span class="help-block has-error" style="display:none;">:El campo Título o área es obligatorio y debe contener por lo menos 1 registro de Nombre de archivo y 1 archivo seleccionado.</span></td>
                                            <td><input type="file" name="avisoAreas[{{$key}}][addMoreInputFields][{{$k}}][archivo]" id="archivo"></td>
                                            <td>
                                                @if($contenido->vc_url != "" || $contenido->vc_url != NULL )
                                                
                                                <a class="text-success mr-2" href="{{ $contenido->vc_url }}"><i class="nav-icon fas fa-cloud-download-alt font-weight-bold"></i></a>
                                                @endif

                                                <form action="" method="post" style="display:none"></form>
                                                <form method="POST" id="chDelete{{$contenido->id}}" class="borrar" action="{{ route('admin.aviso.destroy',$contenido)}}" style="display: inline">
                                                    @csrf {{method_field('DELETE')}}
                                                    <button id="btn_{{$contenido->id}}" class="text-danger mr-2"  style="border: none; background: transparent; cursor: pointer;"><i  class="nav-icon i-Close-Window font-weight-bold delete-confirm"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    <hr/>
                                </div>
                                @endforeach        
                            @else
                                @if(old('avisoAreas'))
                                    @foreach(old('avisoAreas') as $key => $val)
                                    <div class="col-md-12 form-group mb-3 AreaAddRemove {{ $errors->has('avisoAreas[$key][vc_nombre]') ? 'has-error' : ''}}" id="dynamicAddRemove_{{$key}}">
                                        <label for="title">Título o nombre del área</label>
                                        <input class="form-control form-control-rounded  {{ $errors->has('avisoAreas.'.$key.'.vc_nombre') ? 'has-error' : ''}}" id="titulo" name='avisoAreas[{{$key}}][vc_nombre]' type="text" value=" {{$val['vc_nombre']}}" />
                                        {!! $errors->first('avisoAreas.'.$key.'.vc_nombre', '<span class="help-block has-error">:message</span>') !!}
                                        <div class="col-md-12 text-right">
                                            <button type="button" onclick="addArchivo({{$key}})" class="btn btn-warning ladda-button m-4" id="dynamic-area" ><span class="ladda-label">Agregar otro archivo</span></button>
                                        </div>
                                        <table class="table table-bordered" id="dynamicAddRemove_{{$key}}">
                                        <tr>
                                            <td><input type="text" name="avisoAreas[{{$key}}][addMoreInputFields][0][vc_nombre]" placeholder="Nombre del archivo" class="form-control" required /></td>
                                            <td><input type="file" name="avisoAreas[{{$key}}][addMoreInputFields][0][archivo]" id="archivo"></td></td>
                                            <td><button type="button" class="btn btn-outline-danger remove-input-field ">Borrar</button></td>
                                        </tr>
                                    </table>
                                    </div>
                                    @endforeach
                                @else
                                <div class="col-md-12 form-group mb-3 AreaAddRemove" id="dynamicAddRemove_0">
                                    <label for="title">Título o nombre del área</label>
                                    <input class="form-control form-control-rounded" id="titulo" name="avisoAreas[0][vc_nombre]" type="text" value="" />
                                    <span class="help-block has-error" style="display:none;">:El campo Título o área es obligatorio.</span>
                                    <div class="col-md-12 text-right">
                                        <button type="button" onclick="addArchivo(0)" class="btn btn-warning ladda-button m-4" id="dynamic-ar" ><span class="ladda-label">Agregar otro archivo</span></button>
                                    </div>
                                    <table class="table table-bordered" id="dynamicAddRemove_0">
                                        <tr>
                                            <td><input type="text" name="avisoAreas[0][addMoreInputFields][0][vc_nombre]" placeholder="Nombre del archivo" class="form-control" required /><span class="help-block has-error" style="display:none;">:El campo Título o área es obligatorio y debe contener por lo menos 1 registro de Nombre de archivo y 1 archivo seleccionado.</span></td>
                                            <td><input type="file" name="avisoAreas[0][addMoreInputFields][0][archivo]" id="archivo"></td>
                                            <td><button type="button" class="btn btn-outline-danger remove-input-field ">Borrar</button></td>
                                        </tr>
                                    </table>
                                    <hr>
                                </div>
                                @endif
                            @endif
                            </div>
                        </div>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary ladda-button basic-ladda-buttonBB m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
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
            // ++area;
            var area = $('#areasContainer .AreaAddRemove').length;
            $("#areasContainer").append('<div class="col-md-12 form-group mb-3 AreaAddRemove" id="dynamicAddRemove_'+area+'" ><label for="title">Titulo o nombre del área</label><input class="form-control form-control-rounded" id="titulo" name="avisoAreas['+ area +'][vc_nombre]" type="text"/> <span class="help-block has-error" style="display:none;">:El campo Título o área es obligatorio y debe contener por lo menos 1 registro de Nombre de archivo y 1 archivo seleccionado.</span> <div class="col-md-12 text-right"> <button type="button" onclick="addArchivo('+area+')" class="btn btn-warning ladda-button m-4" id="dynamic-ar" ><span class="ladda-label">Agregar otro archivo</span></button></div><table class="table table-bordered" id="dynamicAddRemove_'+ area +'"><tr><td><input type="text" name="avisoAreas['+ area +'][addMoreInputFields][0][vc_nombre]" placeholder="Nombre del archivo" class="form-control" required /></td><td><input type="file" name="avisoAreas['+ area +'][addMoreInputFields][0][archivo]" id="archivo"></td></tr></table><hr></div>');
        });
        //contenido
        function addArchivo(index){
            var childs = $("#dynamicAddRemove_"+index+" tbody tr").length;
            $("#dynamicAddRemove_"+index+" tbody").append('<tr><td><input type="text" name="avisoAreas['+index+'][addMoreInputFields]['+childs+'][vc_nombre]" placeholder="Nombre del archivo" class="form-control" required /> <span class="help-block has-error" style="display:none;">:El campo Título o área es obligatorio y debe contener por lo menos 1 registro de Nombre de archivo y 1 archivo seleccionado.</span></td><td><input type="file" name="avisoAreas['+index+'][addMoreInputFields]['+childs+'][archivo]" id="archivo"></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Borrar</button></td></tr>'
                );
        }
        $(".dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
        });
        
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

        $('.basic-ladda-buttonBB').on('click', function (e) {
            
            $('.alert-success').hide();
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            var haserror = false;
            $('#formaviso').find('input[type=text]').each(function(){

                console.log($(this).val());
                if($(this).val() == ''){
                    $(this).addClass('has-error');
                    $(this).siblings('span').show();
                    haserror = true;
                }else{
                    $(this).removeClass('has-error');
                    $(this).siblings('span').hide()
                }

            });
            if(haserror){
                $('.alert-danger').show();
                return;
            }
            l.start();
            $('#formaviso').submit();
        });

        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const form = $(this).parents().parents().attr("id");
            const url = $(this).attr('href');
            console.log(form);
            swal({
                title: 'Estas seguro?',
                text: 'Este registro y sus detalles se eliminarán de forma permanente!',
                icon: 'warning',
                buttons: ["Cancel", "Sí!"],
            }).then(function(value) {
                if (value) {
                    $('#'+form).submit();
                }
            });
        });
        $('.btn-delete-confirm').on('click', function (event) {
        event.preventDefault();
        const form = $(this).parents('form').attr("id");
        const url = $(this).attr('href');
        console.log(form);
        swal({
            title: 'Estas seguro?',
            text: 'Este registro y sus detalles se eliminarán de forma permanente!',
            icon: 'warning',
            buttons: ["Cancel", "Sí!"],
        }).then(function(value) {
            if (value) {
                $('#'+form).submit();
            }
        });
    });
    </script>
@endpush


    

    