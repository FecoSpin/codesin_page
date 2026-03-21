@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Biblioteca</h1>
    <ul>
        <li>Nuevo</li>
    </ul>
</div>
@stop
@section('content')
<form id="formBB" method="POST" action="{{ route('admin.biblioteca.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="return">
                    <a href="{{route('admin.biblioteca.index')}}" class="btn btn-info">Regresar</a>
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}" >
                                <label for="title">Título</label>
                                <input class="form-control form-control-rounded" id="title" name="title" type="text" value="{{ old('title')}}" />
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="col-md-12 form-group mb-3 {{ $errors->has('excerpt') ? 'has-error' : ''}}">
                                <label for="title">Contenido</label>
                                <div id="charNum">0 / 300</div>
                                <textarea id="field" class="form-control form-control" rows="5" name="excerpt" aria-label="With textarea" >{{ old('excerpt')}}</textarea>
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
                        <div class="col-md-12 form-group mb-3">
                            <label for="picker2">Fecha de publicación </label>
                            <input class="form-control" id="picker2" placeholder="dd-mm-yyyy" name="published_at" data-value="{{ old('published_at')}}" />
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('category_id') ? 'has-error' : ''}}">
                            <label for="picker1">Seleccione una catagoría {{ old('categories')}}</label>
                            <select class="form-control form-control-rounded select2" name="category_id"   data-placeholder="Seleccionar una categoria">
                                <option value="">Seleccionar...</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"{{(old('category_id')==$category->id)? 'selected':''}}>{{$category->nombre}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="help-block">El campo categoria es obligatorio.</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('subcategory_id') ? 'has-error' : ''}}">
                            <label for="picker1">Seleccione una subcategoría {{ old('subcategories')}}</label>
                            <select class="form-control form-control-rounded select2" name="subcategory_id"   data-placeholder="Seleccionar una subcategoria">
                                <option value="">Seleccionar...</option>
                                {{-- @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}"{{(old('subcategory_id')==$subcategory->id)? 'selected':''}}>{{$subcategory->nombre}}</option>

                                @endforeach --}}
                            </select>
                            {!! $errors->first('subcategory_id', '<span class="help-block">El campo subcategoria es obligatorio.</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('archivo') ? 'has-error' : ''}}">
                            <label for="archivo">Archivo </label>
                            <input type="file" name="archivo" id="archivo" data-default-file="" data-max-file-size-preview="2M" >
                            {!! $errors->first('archivo', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            {{-- <input type="hidden" name="category_id" value="{{$category_id}}"> --}}
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonBB m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center"><span id="loader3"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
    </div>

</form>

@stop

@push('style')
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.date.css')}}" rel="stylesheet" />
    <style>
        #charNum {position: absolute;  right: 19px;  top: 0; display: none;}
        #loader3{ visibility:hidden;}
    </style>
@endpush
@push('script')


    <script src="{{asset('dashboard/js/plugins/pickadate/picker.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.date.js')}}"></script>
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

        // valida que solo se capture 300 caracteres
        // $("#fields").keyup(function(){
        //     el = $(this);
        //     if(el.val().length >= 300){
        //         el.val( el.val().substr(0, 300) );
        //     } else {
        //         $("#charNum").text(300-el.val().length + " / 300");
        //     }
        // });

        $('.basic-ladda-buttonBB').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#formBB').submit();
        });
        $('select[name="category_id"]').on('change', function(){
            var countryId = $(this).val();
            if(countryId) {
                getSubcategories(countryId)
            } else {
                $('select[name="subcategory_id"]').empty();
            }
        });
        $(document).ready(function() {
                var OldValue = '{{ old('category_id') }}';
                var OldValueSubCategory = '{{ old('subcategory_id') }}';
            if(OldValue !== '') {
                console.log(OldValueSubCategory);
                getSubcategories(OldValue, OldValueSubCategory);
            }

            });
        function getSubcategories(id_category, id_SubCategory){
            $.ajax({
                url: '/admin/biblioteca/get/'+id_category,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader3').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="subcategory_id"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="subcategory_id"]').append('<option value="'+ key +'">' + value + '</option>');
                        //
                        if(id_SubCategory !== '') {
                            $("select[name='subcategory_id'] option[value='"+id_SubCategory+"']").attr("selected", true);
                        }

                    });
                },
                complete: function(){
                    $('#loader3').css("visibility", "hidden");
                }
            });
        }
    </script>
@endpush




