@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Aina ya Matukio</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Matukio</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <a href="{{ route('event-types.create') }}">
                        <button type="button" class="btn btn-info float-right">
                            Ongeza Tukio
                        </button>
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="mydatatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Jina</th>
                                <th>Kujirudia</th>
                                <th>Rangi ya Kalenda</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etype as $e)
                                <tr>
                                    <td>{{ $e->name }}</td>
                                    <td>
                                        @if ($e->occurance == 'weekly')
                                            {{ 'Kila Wiki ' . $e->occurance_dow }}
                                        @endif
                                        @if ($e->occurance == 'monthly')
                                            {{ 'Kila Mwezi ' . $e->occurance_dom }}
                                        @endif
                                        @if ($e->occurance == 'yearly')
                                            {{ 'Kila Mwaka  ' . date('F j', strtotime($e->occurance_doy)) }}
                                        @endif
                                        @if ($e->occurance == 'none')
                                            Hakuna
                                        @endif


                                    </td>
                                    <td>
                                      <i class="fas fa-square" style ="color: {{$e->color}}" > {{$e->color}}</i> 
                                    </td>
                                    <td>

                                        <a href="{{ route('event-types.edit', $e->id) }}">
                                            <span class="badge badge-primary">
                                                <i class="fas fa-edit "></i>
                                            </span>
                                        </a>

                                        <a href="#">
                                            <button class="btn" data-id="{{ $e->id }}" data-name="{{ $e->name }}" type="button" data-toggle="modal" data-target="#delete">
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>

    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')
    @include('partials.notification')
    @include('event_types.delete')

    <script>
        $('#mydatatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });



        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var message = button.data('name');
            var modal = $(this);

            modal.find('.modal-body #message').text(message);
            modal.find('.modal-body #id').val(button.data('id'));
        });

    </script>

@endpush
