@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Badilisha Kiolezo (Template)</h1>
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">SMS Template</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('template.update') }}" method="POST">
                        @csrf
                        @method('put')

                      
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{$sms->id}}">
                            <div class="row">

                                <div class="col-sm-8">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kichwa cha Habari <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="title" id="title" value="{{$sms->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Ujumbe <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="8" id="message" name="message" >{{$sms->message}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3">
                                    <div class="form-group row">
                                        <label class="col-sm-7 col-form-label">SMS Count</label>
                                        <font color="Blue"><label class="col-form-label" id="smsCount"> 0</label></font>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-7 col-form-label">Chars Used</label>
                                        <font color="Blue"><label class="col-form-label" id="charUsed"> 0</label></font>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-7 col-form-label" >Chars Remaining</label>
                                        <font color="Blue"><label class="col-form-label" id="charRemaining"> 160</label></font>

                                    </div>
                                    <div class="row">
                                        <label class="col-sm-7 col-form-label">Chars per SMS</label>
                                        <font color="Blue"><label class="col-form-label"> 160</label></font>

                                    </div>
                                </div>
                            </div>




                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <a href="{{ url()->previous() }}">
                                        <button type="button" class="btn btn-danger btn-block">Rudi Nyuma</button>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success float-right btn-block">Hifadhi</button>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-footer -->
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
            var chars = $('#message').val().length;
            messages = Math.ceil(parseInt(chars)/160);
            remaining = parseInt(messages) * 160 - (parseInt(chars) % (messages * 160) || messages * 160);
            
            $('#charUsed').text(chars);
            $('#charRemaining').text(remaining);
            $('#smsCount').text(messages);

        $('#message').keyup(function() {
            var chars = $(this).val().length;
            messages = Math.ceil(parseInt(chars)/160);
            remaining = parseInt(messages) * 160 - (parseInt(chars) % (messages * 160) || messages * 160);
            
            $('#charUsed').text(chars);
            $('#charRemaining').text(remaining);
            $('#smsCount').text(messages);

        });

    </script>


@endpush
