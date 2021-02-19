@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">  Outbox </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
    

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                  
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="mydatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tarehe</th>
                                    <th>Kwenda</th>
                                    <th>Ujumbe</th>
                                    <th>Mtumaji</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($outbox as $out)
                                    <tr>
                                        <td>{{ date_format(date_create($out->created_at),"d-m-Y  H:i") }}</td>
                                        <td>{{ $out->recipient }}</td>

                                        <td>{{ $out->message }}</td>
                                        <td>{{ $out->user->name }}</td>
                                        <td>{{ $out->status }}</td>
                                  
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
    </script>



@endpush
