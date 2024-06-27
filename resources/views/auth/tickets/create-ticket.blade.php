<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTicket">
    Create Ticket
  </button>
  

  <div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Ticket</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.create.ticket')}}" method="POST">
            <div class="modal-body">
            
                @csrf
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="staticEmail" name="ticket_name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="staticEmail" name="ticket_type">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" id="price" name="price">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>