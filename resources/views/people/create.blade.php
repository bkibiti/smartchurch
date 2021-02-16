@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">{{ __('members.memberinfo') }}</h1>
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
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('people.store') }}" method="POST">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('members.personalinfo') }}</h3>
                        </div>
                        <!-- /.card-header -->

                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jina la Muumini<font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Jina">
                                </div>
                                <label class="col-sm-2 col-form-label">Jinsi (Me/Ke) <font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="gender" name="gender" required>
                                        <option value="">--{{ __('members.select') }}--</option>
                                        <option value="Me" {{ old('gender') == 'Me' ? 'selected' : '' }}>Mwanaume</option>
                                        <option value="Ke" {{ old('gender') == 'Ke' ? 'selected' : '' }}>Mwanamke</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tarehe ya Kuzaliwa</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('dob') }}" id="dob" , name="dob" data-target="#datetimepicker1" />
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Mahali Alipozaliwa</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="birth_place" id="birth_place">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hali ya Ndoa</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="marriage_status" name="marriage_status_id">
                                        <option value="">--{{ __('members.select') }}--</option>

                                        @foreach ($marriageStatus as $e)
                                            <option value={{ $e->id }} {{ old('marriage_status_id') == $e->id ? 'selected' : '' }}> {{ $e->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <label class="col-sm-2 col-form-label">Tarehe ya Ndoa</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('date_marriage') }}" id="date_marriage" , name="date_marriage"
                                            data-target="#datetimepicker2" />
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jina la Mwenzi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('partner_name') }}" name="partner_name" id="partner_name">
                                </div>
                                <label class="col-sm-2 col-form-label">Ndoa Ilipofungiwa</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('marriage_place') }}" name="marriage_place" id="marriage_place">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Namba ya Zaka</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('tithe_no') }}" name="tithe_no" id="tithe_no">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        {{-- Mawasiliano --}}
                        <div class="card-header">
                            <h3 class="card-title">Mawasiliano na Makazi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Namba ya Simu</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('mobile_phone') }}" name="mobile_phone" id="mobile_phone">
                                </div>
                                <label class="col-sm-2 col-form-label">Namba ya Mwenzi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('partner_phone') }}" name="partner_phone" id="partner_phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sanduku la Barua</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('address') }}" name="address" id="address">
                                </div>
                                <label class="col-sm-2 col-form-label">Namba ya Nyumba</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('house_no') }}" name="house_no" id="house_no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Baruapepe</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email">
                                </div>
                            </div>




                        </div>
                        {{-- Huduma za kiroho --}}
                        <div class="card-header">
                            <h3 class="card-title">Huduma za Kiroho</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ubatizo</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="baptised" name="baptised">
                                        <option value="">--{{ __('members.select') }}--</option>
                                        <option value="Hapana" {{ old('baptised') == 'Hapana' ? 'selected' : '' }}> Ndiyo
                                        </option>
                                        <option value="Ndiyo" {{ old('baptised') == 'Ndiyo' ? 'selected' : '' }}>Hapana
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Tarehe ya Ubatizo</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('date_baptism') }}" id="date_baptism" name="date_baptism"
                                            data-target="#datetimepicker3" />
                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Komunio</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="communion" name="communion">
                                        <option value="">--{{ __('members.select') }}--</option>
                                        <option value="Hapana" {{ old('communion') == 'Hapana' ? 'selected' : '' }}> Ndiyo
                                        </option>
                                        <option value="Ndiyo" {{ old('communion') == 'Ndiyo' ? 'selected' : '' }}>Hapana
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Tarehe ya Komunio</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('date_communion') }}" id="date_communion" name="date_communion"
                                            data-target="#datetimepicker5" />
                                        <div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kipaimara</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="confirmation" name="confirmation">
                                        <option value="">--{{ __('members.select') }}--</option>
                                        <option value="Hapana" {{ old('confirmation') == 'Hapana' ? 'selected' : '' }}>Ndiyo
                                        </option>
                                        <option value="Ndiyo" {{ old('confirmation') == 'Ndiyo' ? 'selected' : '' }}>Hapana
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Tarehe ya Kipaimara</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('date_confirmation') }}" id="date_confirmation" name="date_confirmation"
                                            data-target="#datetimepicker4" />
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label">Jina la Jumuiya</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="community_id" name="community_id">
                                        <option value="">--{{ __('members.select') }}--</option>
                                        @foreach ($Community as $e)
                                            <option value={{ $e->id }} {{ old('community_id') == $e->id ? 'selected' : '' }}> {{ $e->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>


                        </div>


                        {{-- Elimu Fani kazi --}}
                        <div class="card-header">
                            <h3 class="card-title">Elimu, Fani na Kazi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kazi/Shughuli</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('occupation') }}" name="occupation" id="occupation">
                                </div>
                                <label class="col-sm-2 col-form-label">Elimu</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('education') }}" id="education" name="education">
                                </div>
                            </div>


                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label">Ujuzi/Fani</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('profession') }}" id="profession" name="profession">
                                </div>
                            </div>

                        </div>





                        <div class="card-footer">

                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <a href="{{ route('people.index') }}">
                                        <button type="button" class="btn btn-danger btn-block">{{ __('members.back') }}</button>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success float-right btn-block">{{ __('members.save') }}</button>
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
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            $(function() {
                $('#datetimepicker1').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker2').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker3').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker4').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker5').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });

        });




        var members_table = $('#dependants').DataTable({
            searching: false,
            bPaginate: false,
            ordering: false,
            bInfo: false,
            scrollY: "300px",
            scrollCollapse: true,
            columns: [{
                    title: "Jina"
                },
                {
                    title: "Jinsia"
                },
                {
                    title: "Uhusiano"
                },
                {
                    title: "Ondoa",
                    defaultContent: '<button type="button" id="delete_btn" class="btn btn-icon btn-rounded btn-sm btn-danger"> <i class="fas fa-trash"></i></button>'
                },

            ]
        });

        var dependants_list = []; //hold data displayed in members table
        var dependants_ids = []; //hold dependants ids for saving in db
        var relations = []; //hold dependants relations

        //add dependat to list of dependants on click of modal form
        $('#addItemForm').submit(function(event) {
            event.preventDefault();

            var values = {};
            $.each($(this).serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            var data = []; //hold selected dependant values
            var member_id = values.member_id;
            var people = @json($members);

            $.each(people, function(index, value) {
                if (value.id == member_id) {
                    data.push(value.name);
                    data.push(value.gender);
                    data.push($("#relation_id option:selected").text());
                    dependants_ids.push(value.id);
                    relations.push(parseInt(values.relation_id));

                }
            });


            dependants_list.push(data);
            members_table.clear();
            members_table.rows.add(dependants_list).draw();
            $('#dependant_ids').val(JSON.stringify(dependants_ids));
            $('#relation_ids').val(JSON.stringify(relations));

            $('#addMember').modal('hide');

        });

        $('#dependants tbody').on('click', '#delete_btn', function() {
            var index = members_table.row($(this).parents('tr')).index();
            dependants_list.splice(index, 1);
            dependants_ids.splice(index, 1);
            relations.splice(index, 1);
            members_table.clear();
            members_table.rows.add(dependants_list);
            members_table.draw();
            $('#dependant_ids').val(JSON.stringify(dependants_ids));
            $('#relation_ids').val(JSON.stringify(relations));
        });

    </script>


@endpush
