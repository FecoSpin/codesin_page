@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Proyectos de la estrategia @if (isset($estrategia)) {{$estrategia->name }}@endif</h1>
</div>
@stop
@section('content')
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-right">
                            <a href="{{route('admin.estrategias.index')}}" class="btn btn-info">Regresar</a>
                            <button class="btn btn-primary ripple m-1" data-toggle="modal" data-target="#projects" type="button">Crear proyecto</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="#post-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Extracto</th>
                                <th style="width: 8%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->excerpt }}</td>
                                    <td>
                                        <a class="text-success mr-2" href="{{ route('admin.estrategiasProyectos.edit', $post)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <form method="POST" action="{{ route('admin.estrategiasProyectos.destroy',$post)}}" style="display: inline">
                                            @csrf {{method_field('DELETE')}}
                                            <button class="text-danger mr-2" style="border: none; background: transparent; cursor: pointer;"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('style')
    <link rel="stylesheet" href="{{asset('dashboard/css/plugins/datatables.min.css')}}" />
    <link href="{{asset('dashboard/css/plugins/dropify.min.css')}}" rel="stylesheet"/>
@endpush

@push('script')
    <script src="{{asset('dashboard/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins/dropify.min.js')}}"></script>
    <script>
        $('#post-table').DataTable({
        "order": [[3, "desc"]]
    }); // multi column ordering
    $('.banner').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Remover',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
    
        $('.basic-ladda-buttonBanner').on('click', function (e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            l.start();
            $('#Bannerform').submit();
        });
    </script>
@endpush