@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">  {{ __('menu.memberslist')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">  {{ __('menu.home')}}</a></li>
                    <li class="breadcrumb-item active">  {{ __('menu.members')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">
                        searc
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <a href="{{ route('people.create') }}">
                            <button type="button" class="btn btn-info float-right">
                                {{ __('menu.addmember')}}
                            </button>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="mydatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kanda/Kigango</th>
                                    <th>Jumuiya</th>
                                    <th>Jina</th>
                                    <th>{{ __('members.gender')}}</th>
                                    <th>{{ __('members.phone')}}</th>
                                    <th>Namba ya Zaka</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($people as $p)
                                    <tr>
                                        <td>{{ $p->kanda->name }}</td>
                                        <td>{{ $p->community->name }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->gender }}</td>
                                        <td>{{ $p->mobile_phone }}</td>
                                        <td>{{ $p->tithe_no }}</td>
                                        <td>
                                            <a href="{{ route('people.show', $p->id) }}">
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            <a href="{{ route('people.edit', $p->id) }}">
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
