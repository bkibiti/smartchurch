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
        <!-- Small boxes (Stat box) -->
        <div class="row">
   
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Idadi ya Waumini</span>
                    <span class="info-box-number">{{ $personCount[0]->count + $personCount[1]->count .' (Me ' . $personCount[1]->count . ', Ke ' . $personCount[0]->count . ')' }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </div>

            <!-- ./col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Idadi ya Kanda</span>
                    <span class="info-box-number">{{ $data[1]}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </div>

            <!-- ./col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Idadi ya Jumuiya</span>
                    <span class="info-box-number">{{ $data[2] }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </div>

            <!-- ./col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Idadi ya Vyama</span>
                    <span class="info-box-number">{{ $data[0] }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </div>
                

        
        
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-bar"></i> Idadi ya Waumini kwa Kanda</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="memberByKanda" style="min-height: 250px; height: 250px;  max-width: 100%;"></canvas>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-chart-bar"></i> {{ __('menu.memberage') }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="stackedBarChart" style="min-height: 250px; height: 250px;  max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
        </div>




    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')

    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <!-- Members by Age group chart -->
    <script>
        $(function() {

         
            var males = [];
            var females = [];

            $.each(@json($ageCategory[0]), function(key, value) {
                if (value != 'Ke') {
                    females.push(value);
                }
            });
            $.each(@json($ageCategory[1]), function(key, value) {
                if (value != 'Me') {
                    males.push(value);
                }
            });


            var chartData = {
                labels: ['Under 10', '10 - 19', '20 - 29', '30 - 39', '40 - 49', '50 - 59', '60 - 69', '70 - 79', 'Over 80'],
                datasets: [{
                        label: 'Wanaume',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        data: males
                    },
                    {
                        label: 'Wanawake',
                        backgroundColor: 'rgba(66, 138, 107, 1)',
                        borderColor: 'rgba(66, 138, 107, 1)',
                        data: females
                    },
                ]
            }


            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: chartData,
                options: chartOptions
            })

        })

    </script>
 
   <!-- Members by Kanda and Gender -->
   <script>
    $(function() {

     
        var males = [];
        var females = [];
        var labels = []
        $.each(@json($members), function(key, value) {
       
            labels.push(value.kanda);
            females.push(value.Female);
            males.push(value.Male);
        });
        console.log(labels,males,females);



        var chartData = {
            labels: labels,
            datasets: [{
                    label: 'Wanaume',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    data: males
                },
                {
                    label: 'Wanawake',
                    backgroundColor: 'rgba(66, 138, 107, 1)',
                    borderColor: 'rgba(66, 138, 107, 1)',
                    data: females
                },
            ]
        }


        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        var stackedBarChartCanvas = $('#memberByKanda').get(0).getContext('2d')

        var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: chartData,
            options: chartOptions
        })

    })

</script>


@endpush
