@extends("layouts.members_master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Taarifa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
      
          @if ($person->status == 0)
            <div class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                Tafadhali kamilisha kujaza taarifa zako ili kuendelea.
            </div>
          @endif

          @if ($person->status == 1)
            <div class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                Taarifa zako zina hakikiwa, utapokea taarifa uhakiki ukikamilika. 
            </div>
          @endif
          @if ($person->status == 2)
            <div class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                Taarifa zako zina kasoro, Tafadhali rekebisha na utume tena. 
            </div>
         @endif

        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            {{number_format($pledges, 2, '.', ',')}}

                        </h3>

                        <p>Jumla ya Ahadi Zote </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            {{number_format($paidPledges, 2, '.', ',')}}
                        </h3>

                        <p>Jumla ya Ahadi Zilizolipwa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
       
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            {{number_format($pledges-$paidPledges, 2, '.', ',')}}
                        </h3>

                        <p>Jumla ya Ahadi Zilizobaki</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <p class="text-info">{{ $person->name . ' ' . '(' . $person->gender . ')' }} </p>
                        </h3>
                    </div>
                    <div class="card-body">
                        <label>Tarehe ya Kuzaliwa: </label> {{ myDateFormat($person->dob) }} <br>
                        <label>Mahali Alipozaliwa: </label> {{ $person->birth_place }} <br>
                        <label>Hali ya Ndoa: </label> {{ $person->marriage_status }} <br>
                        <label>Aina ya Ndoa: </label> {{ $person->marriage_type }} <br>
                        <label>Tarehe ya Ndoa: </label> {{ myDateFormat($person->date_marriage) }} <br>
                        <label>Jina la Mwenzi: </label> {{ $person->partner_name }} <br>
                        <label>Mahali pa Kufunga Ndoa: </label> {{ $person->marriage_place }} <br>
                        <label>Namba ya Ahadi: </label> {{ $person->pledge_no }} <br>
                        <label>Nafasi katika Usharika: </label> {{ $person->position->name }} <br>
                        <label>Jina la Mzee wa Kanisa Anapoishi: </label> {{ getPersonName($person->church_elder) }} <br>

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
                                        <a class="nav-link " id="family-tab" data-toggle="pill" href="#family" role="tab" aria-controls="family" aria-selected="true">Wategemezi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="extrainfo-tab" data-toggle="pill" href="#extrainfo" role="tab" aria-controls="extrainfo" aria-selected="true">Elimu, Fani na Kazi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="huduma-tab" data-toggle="pill" href="#huduma" role="tab" aria-controls="huduma" aria-selected="true">Huduma za Kiroho</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="groups-tab" data-toggle="pill" href="#groups" role="tab" aria-controls="groups" aria-selected="false">Huduma Usharikani</a>
                                    </li>


                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="person-tabContent">

                                    {{-- Makazi --}}
                                    <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <label>Namba ya Simu: </label> {{ $person->mobile_phone }} &emsp;
                                        <label>Namba ya Mwenzi: </label> {{ $person->partner_phone }} <br>
                                        <label>Barua Pepe: </label> {{ $person->email }} <br>
                                        <label>Sanduku la Barua: </label> {{ $person->address }} <br>
                                        <label>Namba ya Nyumba: </label> {{ $person->house_no }} &emsp;
                                        <label>Block No: </label> {{ $person->block_no }} <br>
                                        <label>Eneo Analoishi: </label> {{ $person->residential_area }} <br>
                                        <label>Usharika wa Zamani: </label> {{ $person->previous_church }} <br>
                                        <label>Jina la Fellowship: </label> {{ $person->fellowship }} <br>
                                        <label>Msharika Jirani: </label> {{ getPersonName($person->neighbour) }} <br>
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

                                    {{-- huduma usharikani --}}
                                    <div class="tab-pane fade" id="groups" role="tabpanel" aria-labelledby="groups-tab">
                                        <label>Anashiriki Ibada ya Nyumba kwa Nyumba: </label> {{ $person->active_community_prayers }} <br>
                                        <label>Jina la Nyumba kwa Nyumba: </label> {{ $person->community_name }} <br>
                                        <label>Sababu ya Kutoshiriki: </label> {{ $person->participation_reason }} <br>
                                        <label>Jina la Mwenyekiti wa Nyumba kwa Nyumba: </label> {{ getPersonName($person->community_leader) }} <br>
                                        <label>Huduma Alizojiunga/ Anazopenda Kujiunga: </label> {{ getPersonServices($person->services) }} <br>
                                    </div>

                                    <div class="tab-pane fade" id="extrainfo" role="tabpanel" aria-labelledby="extrainfo-tab">
                                        <label>Kazi/Shughuli: </label> {{ $person->occupation }} <br>
                                        <label>Mahali pa Kazi: </label> {{ $person->work_place }} <br>
                                        <label>Elimu: </label> {{ $person->education }} <br>
                                        <label>Ujuzi/Fani: </label> {{ $person->profession }} <br>
                                        <label>Kujitolea Kutumika Kanisani: </label> {{ $person->volunteer }} <br>
                                    </div>

                                    <div class="tab-pane fade" id="huduma" role="tabpanel" aria-labelledby="huduma-tab">
                                        <label>Ubatizo: </label> {{ $person->baptised }} <br>
                                        <label>Tarehe ya Ubatizo: </label> {{ myDateFormat($person->date_baptism) }} <br>
                                        <label>Kipaimara: </label> {{ $person->confirmation }} <br>
                                        <label>Tarehe ya Kipaimara: </label> {{ myDateFormat($person->date_confirmation) }} <br>
                                        <label>Anashiriki Sakramenti ya Meza ya Bwana: </label> {{ $person->eucharist }} <br>
                                        <label>Tarehe ya Kujaza/Kurudisha fomu: </label> {{ myDateFormat($person->form_return_date) }} <br>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.row -->



    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')

    @include('partials.notification')

    <script>
        $(document).ready(function() {



        });

    </script>


@endpush
