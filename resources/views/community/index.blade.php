@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Orodha ya Jumuiya</h1>
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
          <a href="#">
              <button class="btn btn-info float-right"
                      type="button" data-toggle="modal" data-target="#add">
                      Ongeza Jumuiya
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Parokia</th>
                    <th>Kanda</th>
                    <th>Jumuiya</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($community as $a)
              <tr>
                <td>{{$a->kanda->kigango->name}}</td>
                <td>{{$a->kanda->name}}</td>
                <td>{{$a->name}}</td>
    
                <td>
               
                  <a href="#">
                      <button class="btn"
                              data-id="{{$a->id}}" data-name="{{$a->name}}" 
                              data-kanda_id="{{$a->kanda_id}}" type="button" data-toggle="modal" data-target="#edit">
                              <span class="badge badge-primary">
                                <i class="fas fa-edit"></i>
                              </span>
                      </button>
                  </a>
                  <a href="#">
                      <button class="btn"
                              data-id="{{$a->id}}" data-name="{{$a->name}}"
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
@include('community.delete')
@include('community.create')
@include('community.edit')


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



    $('#delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var message = button.data('name');
          var modal = $(this);

          modal.find('.modal-body #message').text(message);
          modal.find('.modal-body #id').val(button.data('id'));
      });

      $('#edit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var name = button.data('name');

      
          var modal = $(this);

          $('#eid').val(id);
          $('#kanda_id2').val(button.data('kanda_id'));
          $('#ename').val(name);
    

      });


</script>

@endpush
