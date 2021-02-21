@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Muhtasari</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('sms.send') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <input type="hidden" name="message" value="{{$message}}">
                            <input type="hidden" name="receiver" value="{{ implode (", ", $receiver) }}">
                            <input type="hidden" name="totalSMS" value="{{$totalSMS}}">


                            <div class="form-group row">

                                <div class="col-sm-6">
                                
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                          
                                        <div class="info-box-content">
                                          <span class="info-box-text">Ujumbe</span>
                                          <span class="info-box-number">SmartChurch</span>

                                        </div>

                                    </div>
                                    <textarea class="form-control" rows="8" name="message" readonly>{{ $message }}</textarea>

                                </div>


                                <div class="col-sm-6">
                                    <div class="info-box">

                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Salio SMS Kwenye Akaunti</td>
                                                    <td>{{ $totalSmsAccount }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Idadi ya SMS kwa Ujumbe</td>
                                                    <td>{{ $smsCount }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Idadi ya Wapokeaji SMS</td>
                                                    <td>{{ $num_receivers }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jumla ya SMS</td>
                                                    <td>{{ $totalSMS }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Salio la SMS baada ya Kutuma</td>
                                                    <td>{{ $totalSmsAccount - $totalSMS }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>



                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-9"></div>

                                <div class="col-sm-1.5">
                                    <a href="{{ url()->previous() }}">
                                        <button type="button" class="btn btn-danger">Rudi Nyuma</button> &nbsp;
                                    </a>
                                </div>
                                <div class="col-sm-1.5">
                                    <button type="submit" class="btn btn-success ">Tuma SMS</button>&nbsp;
                                </div>

                            </div>




                        </div>

                    </form>
                </div>
                <!-- /.card -->

            </div>

        </div>

    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')

    @include('partials.notification')

    <script>


    </script>


@endpush
