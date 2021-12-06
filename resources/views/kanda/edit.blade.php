<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kanda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('kanda.update','delete')}}" method="POST">
                @csrf
                @method('put')

                <div class="card-body">
           
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Parokia <font color="red">*</font></label>
                    <div class="col-sm-8">
                      <select class="form-control select2" id="kigango_id2" name ="kigango_id" required>
                        @foreach ($vigango as $p)
                            <option value={{ $p->id }}>{{ $p->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jina la Kanda<font color="red">*</font></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  name="name"  id="ename"  value="{{old('name')}}"  required>
                    </div>
                  </div>
      
                <input type="text" name="id" id="eid" hidden>
         
                </div>
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Funga</button>
                    <button type="submit" class="btn btn-primary btn-sm">Hifadhi</button>
                </div>
              </form>

      </div>
    </div>
</div>
