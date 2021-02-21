@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Taarifa za Muumini</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <p class="text-info">{{ $person->name . ' ' . '(' . $person->gender . ')' }} </p>
                        </h3>
                    </div>
                    <div class="card-body">
                        <label>Kigango/Kanda: </label> {{ $person->kanda->name }} <br>
                        <label>Jumuiya: </label> {{ $person->community->name  }} <br>
                        <label>Namba ya Zaka: </label> {{ $person->tithe_no }} <br>
                        <label>Tarehe ya Kuzaliwa: </label> {{ myDateFormat($person->dob) }} <br>
                        <label>Mahali Alipozaliwa: </label> {{ $person->birth_place }} <br>
                        <label>Hali ya Ndoa: </label> {{ $person->marriage_status }} <br>
                     
                       

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-8">
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="person-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="address-tab" data-toggle="pill" href="#address" role="tab" aria-controls="address" aria-selected="false">Mawasiliano na Makazi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="huduma-tab" data-toggle="pill" href="#huduma" role="tab" aria-controls="huduma" aria-selected="true">Huduma za Kiroho</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="family-tab" data-toggle="pill" href="#family" role="tab" aria-controls="family" aria-selected="true">Wategemezi</a>
                                    </li>
                                  
                                    
                                    <li class="nav-item">
                                        <a class="nav-link " id="extrainfo-tab" data-toggle="pill" href="#extrainfo" role="tab" aria-controls="extrainfo" aria-selected="true">Elimu, Fani na Kazi</a>
                                    </li>


                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="person-tabContent">

                                    {{-- Makazi --}}
                                    <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <label>Namba ya Simu: </label> {{ $person->mobile_phone }} <br>
                                        <label>Jina la Mwenzi: </label> {{ $person->partner_name }} <br>
                                        <label>Namba ya Mwenzi: </label> {{ $person->partner_phone }} <br>
                                        <label>Barua Pepe: </label> {{ $person->email }} <br>
                                        <label>Sanduku la Barua: </label> {{ $person->address }} <br>
                                        <label>Namba ya Nyumba: </label> {{ $person->house_no }} <br>
                                        <label>Eneo Analoishi: </label> {{ $person->residential_area }} <br>
                                
                                    </div>

                                    {{-- Wategemezi --}}
                                    <div class="tab-pane fade " id="family" role="tabpanel" aria-labelledby="family-tab">
                                        @if ($person->dependants->isNotEmpty())
                                            <table id="mydatatable" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Jina</th>
                                                        <th>Jinsia</th>
                                                        <th>Umri</th>
                                                        <th>Uhusiano</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               
                                                    @foreach ($person->dependants as $p)
                                                        <tr>
                                                            <td>{{ $p->name }}</td>
                                                            <td>{{ $p->gender }}</td>
                                                            @if ($p->dob == '')
                                                                <td>-</td>
                                                            @else
                                                                <td>{{'Miaka ' . $person->age($p->dob) }}</td>
                                                            @endif
                                                            <td>{{ $p->relationship->name }}</td>

                                                        </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        @else

                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <i class="icon fas fa-info"></i>
                                                Hakuna Wategemezi
                                            </div>
                                        @endif

                                    </div>

                                  
                                    <div class="tab-pane fade" id="extrainfo" role="tabpanel" aria-labelledby="extrainfo-tab">
                                        <label>Kazi/Shughuli: </label> {{ $person->occupation }} <br>
                                        <label>Mahali pa Kazi: </label> {{ $person->work_place }} <br>
                                        <label>Elimu: </label> {{ $person->education }} <br>
                                        <label>Ujuzi/Fani: </label> {{ $person->profession }} <br>
                                       
                                    </div>

                                    <div class="tab-pane fade" id="huduma" role="tabpanel" aria-labelledby="huduma-tab">
                                        <label>Amebatizwa: </label> {{ $person->baptised }} <br>
                                        <label>Tarehe ya Ubatizo: </label> {{ myDateFormat($person->date_baptism) }} <br>
                                        <label>Komunio: </label> {{ $person->communion }} <br>
                                        <label>Tarehe ya Komunio: </label> {{ myDateFormat($person->date_communion) }} <br>
                                        <label>Kipaimara: </label> {{ $person->confirmation }} <br>
                                        <label>Tarehe ya Kipaimara: </label> {{ myDateFormat($person->date_confirmation) }} <br>
                                        <label>Aina ya Ndoa: </label> {{ $person->marriage_type }} <br>
                                        <label>Tarehe ya Ndoa: </label> {{ myDateFormat($person->date_marriage) }} <br>
                                        <label>Mahali pa Kufunga Ndoa: </label> {{ $person->marriage_place }} <br>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.row -->


{{-- Pledges and Payments --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-money-check-alt"></i>
                            &nbsp; Ahadi na Michango
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                        <div class="card-body">

                            @if ($person->pledges->isNotEmpty())
                                <table id="mydatatable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pledge Date</th>
                                            <th>Activity</th>
                                            <th>Amount</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($person->pledges as $p)
                                            <tr>
                                                <td>{{ myDateFormat($p->pledge_date) }}</td>
                                                <td>{{ $p->activity->name }}</td>
                                                <td>{{ number_format($p->amount, 2, '.', ',') }}</td>
                                                <td>{{ $p->comment }}</td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            @else

                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fas fa-info"></i>
                                    Hakuna taarifa za Ahadi
                                </div>
                            @endif


                        </div>

                </div>
                <!-- /.card -->

            </div>

        </div>

 {{-- Approve Member --}}
        @if ($person->status == 1)

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            
                            Thibitisha Taarifa
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('people.approve') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <input type="hidden" name="person_id" value = "{{$person->id}}" >

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sababu ya Kuthibitisha<font color="red">*</font></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="approval_note" id="approval_note" value="{{ old('approval_note') }}" required>
                                </div>
                            
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <button type="submit" name="selection" value="0" class="btn btn-danger btn-block">Kataa</button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="selection" value="1" class="btn btn-success float-right btn-block">Thibitisha</button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <!-- /.card -->

            </div>

        </div>
            
        @endif



    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')

    @include('partials.notification')

    <script>
        $(document).ready(function() {



        });

    </script>


@endpush
