@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Tuma SMS</h1>
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
                        <h3 class="card-title">SMS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('sms.send') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kiolezo</font></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="templ" name="templ">
                                        <option value="0">--Chagua--</option>
                                        @foreach ($tempate as $t)
                                            <option value={{ $t->id }}>{{ $t->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tuma kwenda <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="receiver[]" id="receiver" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ujumbe <font color="red">*</font></label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control" rows="8" placeholder="Andika ujumbe" id="message" name="message" required></textarea>
                                        </div>
                                        <div class="col-sm-1"></div>

                                        <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label class="col-sm-7 col-form-label">Idadi ya SMS</label>
                                                <font color="Blue"><label class="col-form-label" id="smsCount"> 0</label></font>
        
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-7 col-form-label">Herufi Zilizotumika</label>
                                                <font color="Blue"><label class="col-form-label" id="charUsed"> 0</label></font>
        
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-7 col-form-label" >Herufi Zilizobaki</label>
                                                <font color="Blue"><label class="col-form-label" id="charRemaining"> 160</label></font>
        
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-7 col-form-label">Herufi kwa Ujumbe</label>
                                                <font color="Blue"><label class="col-form-label"> 160</label></font>
        
                                            </div>
                                        </div>
                                    </div>
                              
                      <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-8"></div>

                                        <div class="col-sm-1.5">
                                            <a href="{{ url()->previous() }}">
                                                <button type="button" class="btn btn-danger">Rudi Nyuma</button> &nbsp;
                                            </a>
                                        </div>
                                        <div class="col-sm-1.5">
                                            <button type="submit" class="btn btn-success ">Tuma</button>&nbsp;
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

        $('#message').keyup(function() {
           
            var chars = $(this).val().length;
            messages = Math.ceil(parseInt(chars)/160);
            remaining = parseInt(messages) * 160 - (parseInt(chars) % (messages * 160) || messages * 160);
            
            $('#charUsed').text(chars);
            $('#charRemaining').text(remaining);
            $('#smsCount').text(messages);


        });
        
        $("#templ").change(function () {
            var id = this.value;

            $.each (@json($tempate), function(key, value) {
                if (value.id == id) {
                    $('#message').text(value.message);
                    var chars = $('#message').val().length;
                    messages = Math.ceil(parseInt(chars)/160);
                    remaining = parseInt(messages) * 160 - (parseInt(chars) % (messages * 160) || messages * 160);
                    
                    $('#charUsed').text(chars);
                    $('#charRemaining').text(remaining);
                    $('#smsCount').text(messages);
                }

            });
            if (id == 0) {
                $('#message').text("");
                var chars = $('#message').val().length;
                messages = Math.ceil(parseInt(chars)/160);
                remaining = parseInt(messages) * 160 - (parseInt(chars) % (messages * 160) || messages * 160);
                
                $('#charUsed').text(chars);
                $('#charRemaining').text(remaining);
                $('#smsCount').text(messages);
            }

        });

    </script>


@endpush
