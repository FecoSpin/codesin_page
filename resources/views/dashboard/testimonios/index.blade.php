@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Testimonios</h1>
    <ul>
        <li>inicio</li>
    </ul>
</div>
@stop
@section('content')
    <!-- end of col-->
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <h4 class="card-title mb-3">Listado de testimonios</h4>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right">
                        <a href="{{route('admin.testimonios.create')}}">
                            <button class="btn btn-primary ripple m-1" type="button">Crear testimonio</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="#post-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 10%"></th>
                                <th style="width: 15%">Nombre</th>
                                <th >cuerpo</th>
                                <th style="width: 8%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($testimonios as $testimonio)
                                <tr>
                                    <td class="align-middle">{{ $loop->index + 1 }}</td>
                                    <td class="align-middle text-center">
                                        <div >
                                            <a class="image-popup" href="{{ $testimonio->urlImg}}">
                                                <img src="{{ $testimonio->urlImg}}" alt="" class="avatar-md rounded mr-3">
                                            </a>
                                        </div>
                                            
                                    </td>
                                    <td class="align-middle">{{ $testimonio->name }}</td>
                                    <td class="align-middle">{{ $testimonio->body }}</td>
                                    <td class="align-middle">
                                        <a class="text-success mr-2" href="{{ route('admin.testimonios.edit', $testimonio)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <form method="POST" action="{{ route('admin.testimonios.destroy',$testimonio)}}" style="display: inline">
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

@endpush

@push('script')
    <script src="{{asset('dashboard/js/plugins/datatables.min.js')}}"></script>
    <script>
        $('#post-table').DataTable({
        "order": [[3, "desc"]]
    }); // multi column ordering
    
    </script>
@endpush