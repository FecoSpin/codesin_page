@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Usuarios</h1>
    <ul>
        <li><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li>Usuarios</li>
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
                        <h4 class="card-title mb-3">Listado de usuarios</h4>
                    </div>
                        <div class="col-md-4 col-sm-12 text-right">
                            <a href="{{route('admin.users.create')}}">
                                <button class="btn btn-primary ripple m-1" type="button">Crear usuario</button>
                            </a>
                        </div>
                    
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="#post-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->id != 1)
                                            <a class="text-success mr-2" href="{{ route('admin.users.edit', $user)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>

                                            <form method="POST" action="{{ route('admin.users.destroy',$user)}}" style="display: inline">
                                                @csrf {{method_field('DELETE')}}
                                                <button class="text-danger mr-2" style="border: none; background: transparent; cursor: pointer;"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                        @endif
                                        
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
    <link rel="stylesheet" href="{{asset('adminlte/css/plugins/datatables.min.css')}}" />
@endpush

@push('script')
    <script src="{{asset('adminlte/js/plugins/datatables.min.js')}}"></script>
    <script>
        $('#post-table').DataTable({
        "order": [[3, "desc"]]
    }); // multi column ordering
    </script>
@endpush