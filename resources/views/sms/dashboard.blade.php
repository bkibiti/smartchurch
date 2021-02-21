@extends("layouts.master")


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('menu.dashboard') }}</h1>
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
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$balance->balance}}</h3>

                        <p>Salio la SMS</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <a href="{{route('sms.createPayment')}}" class="small-box-footer">
                        Ongeza Salio <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{$outbox}}</h3>

                        <p>SMS Zilizotumwa (Mwezi huu)</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-envelope-open"></i>
                    </div>
                    <a href="{{route('sms.outbox')}}" class="small-box-footer">
                        Zaidi <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
          
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>0</h3>

                        <p>SMS Zilizofeli</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <a href="{{route('sms.outbox')}}" class="small-box-footer">
                        Zaidi <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">

            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-chart-bar"></i> SMS Zilizotumwa Mwezi Huu</h3>

                       
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="trend" style="min-height: 300px; height: 300px; max-height: 400px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
       
    @endsection

    @push('page_scripts')

@include('partials.notification')
<!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

        <script>// reporting trends
                         
            var chartData = {
                labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
                datasets: [{
                        borderColor: '#3cba9f',
                        fill: false,
                        data: @json($values)
                    },
    
                ]
            }
    
            var chartOptions = {
                legend: {
                    display: false,
                    position: 'top',
                }
            };
    
    
            var reportTrend = $('#trend')
    
            var trendChart = new Chart(reportTrend, {
                type: 'line',
                data: chartData,
                options: chartOptions
            })
    
        </script>
    


    @endpush
