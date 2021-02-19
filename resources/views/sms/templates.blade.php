@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">  Orodha ya Violezo </h1>
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
                    <div class="card-header">
                        <a href="{{ route('template.create') }}">
                            <button type="button" class="btn btn-info float-right">
                                Unda Kiolezo
                            </button>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="mydatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kichwa cha Habari</th>
                                    <th>Ujumbe</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sms as $s)
                                    <tr>
                                        <td>{{ $s->title }}</td>
                                        <td>{{ $s->message }}</td>
                                      
                                        <td>
                                        
                                            <a href="{{ route('template.edit', $s->id) }}">
                                                <span class="badge badge-primary">
                                                    <i class="fas fa-edit "></i>
                                                </span>
                                            </a>

                                            <a href="#">
                                                <button class="btn"
                                                        data-id="{{$s->id}}" data-title="{{$s->title}}"
                                                        type="button" data-toggle="modal" data-target="#deleteTemp">
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

@include('sms.template_delete')

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


  //delete template
  $('#deleteTemp').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
          var title = button.data('title');
          var modal = $(this);

          modal.find('.modal-body #message').text(title);
          modal.find('.modal-body #temp_id').val(button.data('id'));

      })//end
    </script>

@endpush
