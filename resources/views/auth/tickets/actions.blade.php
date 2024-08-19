<div class="modal fade" id="viewTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formTicket" action="{{ route('admin.edit.ticket') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Delete Ticket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ticket_id" name="ticket_id" value="" hidden>
                            <input type="text" class="form-control" id="ticket_name" name="ticket_name" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ticket_type" name="ticket_type" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Price (₱)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" id="ticket_price" name="price"
                                value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close_ticket_modal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>