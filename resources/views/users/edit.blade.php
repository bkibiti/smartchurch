<div class="modal fade" id="editUser" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" >Update User </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="{{route('users.update') }}" >

                        @csrf

                        <div class="form-group row">
                            <label for="name1" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <font color="red">*</font></label>

                            <div class="col-md-8">
                                <input id="name1" type="text" class="form-control" name="name1" value="{{ old('name') }}" required autofocus>

                                <span class="text-danger">
                                    <strong id="name-error1"></strong>
                                </span>
                            </div>
                        </div>
                   

                        <div class="form-group row">
                            <label for="email1" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}<font color="red">*</font> </label>

                            <div class="col-md-8">
                                <input id="email1" type="email" class="form-control" name="email1" value="{{ old('email1') }}" required>

                                <span class="text-danger">
                                     <strong id="email-error1"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="mobile1" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-8">
                                    <input id="mobile1" type="text" class="form-control{{ $errors->has('mobile1') ? ' is-invalid' : '' }}" name="mobile1" value="{{ old('mobile1') }}" data-inputmask='"mask": "0999-999-9999"' data-mask>

                                    <span class="text-danger">
                                         <strong id="mobile-error1"></strong>
                                    </span>
                                </div>
                        </div>
          

                        <div class="form-group row">
                                <label for="role1" class="col-md-4 col-form-label text-md-right">{{ __('User Role') }} <font color="red">*</font></label>
                                <div class="col-md-8">
                                        <select class="form-control select2"  class="form-control" id="role1" name="role1[]"  data-placeholder="Select Role" required data-width="100%">
                                            @foreach(getRoles() as $role)
                                                <option value="{{$role->id}}" {{ ($role->id == old('role1') ? "selected":"") }}>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">
                                    <strong id="role-error1"></strong>
                                </span>
                                </div>
                                <input id="UserID" name="UserID" type="hidden">
                        </div>



                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>

        
            


          </div><!-- /.modal-content -->
    </div><!--/.modal-dialog -->
</div><!--/.modal -->
