@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Staff</h1>
    <ul>
        <li></li>
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
                        <h4 class="card-title mb-3">Listado de staff @if (isset($departamento)) {{$departamento->name }}@endif</h4>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right">
                        <a href="{{route('admin.staff.create',$departamento)}}">
                            <button class="btn btn-primary ripple m-1" type="button">Crear personal</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="post-table" style="width:100%" data-sortable>
                        <thead>
                            <tr>
                                <th>posición</th>
                                <th></th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Puesto</th>
                                <th>Departamento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle" id="tablaStaff">
                            @foreach ($staffs as $staff)
                                <tr data-index="{{ $staff->id }}" data-position="{{ $staff->position }}">
                                    <!-- <td class="align-middle">{{ $loop->index + 1 }}</td> -->
                                    <td class="align-middle text-center" >{{ $staff->position }}</td>
                                    <td class="text-center"><a class="image-popup" href="{{ $staff->urlimg}}"><img src="{{ $staff->urlimg}}" alt="{{ $staff->name }}" class="avatar-md rounded"></a></th>
                                    <td class="align-middle">{{ $staff->name }}</td>
                                    <td class="align-middle">{{ $staff->email }}</td>
                                    <td class="align-middle">{{ $staff->job }}</td>
                                    <td class="align-middle">{{ $staff->departamento->name }}</td>
                                    <td class="align-middle">
                                        <a class="text-success mr-2" href="{{ route('admin.staff.edit', $staff)}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <form method="POST" action="{{ route('admin.staff.destroy',$staff)}}" style="display: inline">
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
        $('post-table').DataTable({
        "order": [[3, "desc"]]
    }); // multi column ordering

    $('#post-table #tablaStaff').sortable({
        update: function (event, ui) {
            $(this).children().each(function (index) {
                if ($(this).attr('data-position') != (index+1)) {
                    $(this).attr('data-position', (index+1)).addClass('updated');
                }
            });
            saveNewPositions();
        }
    });

    </script>
    <script type="text/javascript">
    function saveNewPositions() {
        var positions = [];
        $('.updated').each(function () {
            positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
            $(this).removeClass('updated');
        });

        $.ajax({
            url: '{{ route('position_update_posts') }}',
            method: 'PUT',
            dataType: 'text',
            data: {
                updated: 1,
                positions: positions,
                _token: '{{csrf_token()}}'
            }, success: function (response) {
                location.reload();
            },error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        });
    }
    </script>
@endpush