<div class="modal fade" id="deleteTemp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
         
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Futa Kiolezo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('template.delete')}}" method="post">
                @csrf
          
                <div class="modal-body">
                  <span>Una uhakika unataka kufuta kiolezo chenye kichwa</span> 
                  <font color="red"><span id="message"></span></font>

                  <input type="hidden" id="temp_id" name="id">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </form>

      </div>
        </div>
 </div>
