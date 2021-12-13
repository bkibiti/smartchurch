@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Orodha ya Matoleo</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
         
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
          <a href="{{route('offerings.create')}}">
              <button type="button" class="btn btn-info float-right">
                  Ingiza Matoleo
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tarehe</th>
                    <th>Aina ya Matoleo</th>
                    <th>Kiasi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($offering as $o)
                <tr>
                  <td>{{myDateFormat($o->offering_date)}}</td>
                  <td>{{$o->type->name}}</td>
                  <td>{{number_format($o->amount, 2, '.', ',')}}</td>
                  <td>
                    <a href="{{ route('offerings.edit', $o->id) }}">
                        <span class="badge badge-primary">
                          <i class="fas fa-edit "></i>
                        </span>
                    </a>

                    <a href="#">
                        <button class="btn"
                                data-id="{{$o->id}}" data-name=""
                                type="button" data-toggle="modal" data-target="#delete">
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

@push("page_scripts")
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
      'columnDefs': [
        {
            "targets": 2,
            "className": "text-right",
        }
        ],
    });

    $('#delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var message = button.data('name');
          var modal = $(this);

          modal.find('.modal-body #message').text(message);
          modal.find('.modal-body #id').val(button.data('id'));
      });


</script>

@endpush
