<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Futa Kanda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('community.destroy','delete')}}" method="post">
                @csrf
                @method("DELETE")

                <div class="modal-body">
                    <span>Je unataka kufuta Jumuiya?</span> 
                    <font color="red"><span id="message"></span></font>
                    <input type="hidden" name="id" id="id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Hapana</button>
                    <button type="submit" class="btn btn-danger btn-sm">Ndio</button>
                </div>
            </form>

      </div>
    </div>
</div>
