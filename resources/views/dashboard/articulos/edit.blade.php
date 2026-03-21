@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Artículos</h1>
    <ul>
        <li>Editar Artículos</li>
    </ul>
</div>
@stop
@section('content')
<form id="nUpdate" method="POST" action="{{ route('admin.articulos.update', $post) }}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    @csrf
    <div class="row mb-3">
        <div class="return">
            <a href="{{route('admin.articulos.index')}}" class="btn btn-info">Regresar</a>
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
                                <textarea id="body" class="textarea form-control form-control-rounded" name="body" aria-label="With textarea" style="height: 113px;">{{ old('body', $post->body)}}</textarea>
                                {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                            </div>
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                            <input type="hidden" id="post_id" value="{{$post->id}}">
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
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
                            <label for="thumbnail">thumbnail 360x263px </label>
                            <input type="file" name="thumbnail" id="thumbnail" data-default-file="{{ old('thumbnail',$post->urlimage ? $post->urlimage : '' )}}" data-max-file-size-preview="2M" >
                            {!! $errors->first('thumbnail', '<span class="help-block">:message</span>') !!}
                        </div>
                        <input type="hidden" name="tags" value="1" >
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ladda-button basic-ladda-button basic-ladda-buttonNoticias m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
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
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/pickadate/classic.date.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/plugins/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
@endpush
@push('script')
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/js/MyUploadAdapter.js')}}"></script>


    <script>
        $('#picker2, #picker3').pickadate({
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdaysShort: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            today: 'Hoy',
            clear: 'Limpiar',
            close: 'Cerrar',
            formatSubmit: 'yyyy/mm/dd'
        });

        $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
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
        $('.basic-ladda-buttonNoticias').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#nUpdate').submit();
        });

        // ...

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter( loader );
            };
        }
        // ----------------------------------------------------  extraPlugins: [ MyCustomUploadAdapterPlugin ],
        ClassicEditor
			.create( document.querySelector( '#body' ), {
                extraPlugins: [ MyCustomUploadAdapterPlugin ],
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'underline',
						'removeFormat',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'indent',
						'outdent',
						'|',
						'alignment',
						'fontColor',
						'fontFamily',
						'fontSize',
						'highlight',
						'|',
						'imageUpload',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo'
					]
				},
                mediaEmbed: {
                    previewsInData: true
                },
                link: {
                    addTargetToExternalLinks: true
                },
				language: 'es',
				image: {
                    // Configure the available styles.
                    styles: [
                        'alignLeft', 'alignCenter', 'alignRight'
                    ],

                    // Configure the available image resize options.
                    resizeOptions: [
                        {
                            name: 'imageResize:original',
                            label: 'Original',
                            value: null
                        },
                        {
                            name: 'imageResize:50',
                            label: '50%',
                            value: '50'
                        },
                        {
                            name: 'imageResize:75',
                            label: '75%',
                            value: '75'
                        }
                    ],
					toolbar: [
                        'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                        '|',
                        'imageResize',
                        '|',
                        'imageTextAlternative'
                    ]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells',
						'tableCellProperties',
						'tableProperties'
					]
				},
				licenseKey: '',

			} )
			.then( editor => {
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 2l3duqkuq4fx-qmbfwqjqu424' );
				console.error( error );
			} );

    </script>
@endpush
