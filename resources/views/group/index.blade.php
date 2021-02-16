@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Orodha ya Vyama vya Kitume</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Mwanzo</a></li>
          <li class="breadcrumb-item active">Huduma</li>
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
          <a href="{{route('services.create')}}">
              <button type="button" class="btn btn-info float-right">
                  Ongeza Chama cha Kitume
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Jina la Chama</th>
                    <th>Maelezo ya Chama</th>
                    <th>Idadi ya Wanachama</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($group as $g)
              <tr>
                <td>{{$g->name}}</td>
                <td>{{$g->description}}</td>
                <td>{{$g->countMembers()}}</td>
                <td>
                  <a href="{{ route('services.show', $g->id) }}">
                      <span class="badge badge-success">
                        <i class="fas fa-eye"></i>
                      </span>
                  </a>
                  <a href="{{ route('services.edit', $g->id) }}">
                      <span class="badge badge-primary">
                        <i class="fas fa-edit "></i>
                      </span>
                  </a>
                  <span class="badge badge-danger">
                    <i class="fas fa-trash"></i>
                  </span>

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
    });


</script>

@endpush
