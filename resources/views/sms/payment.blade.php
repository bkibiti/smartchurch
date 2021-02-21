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
                        <h3 class="card-title">Nunua SMS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('sms.pay') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h5> <strong>Vifurushi</strong> </h5>
                            <div class="form-group row">

                                @foreach ($SmsBundle as $b)
                                    <div class="col-sm-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{ number_format($b->min,0,'.',',') . ' - ' . number_format($b->max,0,'.',',') }}</span>
                                                <span class="info-box-number">Tshs {{ $b->price }}</span>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Idadi SMS <font color="red">*</font></label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="sms" id="sms" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label" id="cost" name="cost"> 0</label>
                                </div>

                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-9"></div>

                             
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success btn-block">LIPA</button>&nbsp;
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
        $('#sms').keyup(function() {

            var smsCount = $(this).val();
            var cost = 0;
            $.each(@json($SmsBundle), function(key, value) {
                if ((parseInt(smsCount) >= parseInt(value.min)) && (parseInt(smsCount) <= parseInt(value.max))) {
                    cost = parseInt(smsCount) * parseInt(value.price)
                }
                if ((parseInt(smsCount) > 100000) && (parseInt(value.max) == 100000)) {
                    cost = parseInt(smsCount) * parseInt(value.price)
                }
            });
            costStr = "Tshs ";
            
            $('#cost').text(costStr.concat(formatMoney(cost)));

        });


        function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
            try {
                decimalCount = Math.abs(decimalCount);
                decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
                const negativeSign = amount < 0 ? "-" : "";
                let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
                let j = (i.length > 3) ? i.length % 3 : 0;
                return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount)
                    .slice(2) : "");
            } catch (e) {}
        }

    </script>


@endpush
