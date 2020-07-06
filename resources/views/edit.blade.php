<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="/update_row" method="post" >
            <div class="modal-header">
                <h5 class="modal-title" id="edit_modal_label">Edit Row</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                @csrf
                <div class="col-md-12 m-t-10">
                    <input type="hidden" name="id" value="{{$row[0]['id']}}">
                    <label>Name</label>
                    <input class="form-control m-b-10" name="name" value="{{$row[0]['name']}}">
                    <label>Description</label>
                    <input class="form-control"  name="description"  value="{{$row[0]['description']}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>