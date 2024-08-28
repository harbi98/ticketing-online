<div class="modal fade" id="editSale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th class="text-success" scope="col">Ticket Number</th>
                    <th scope="col">Reference #</th>
                    <th class="text-success" scope="col">Ticket Name</th>
                    <th scope="col">Ticket Price</th>
                    <th scope="col">Ticket Status</th>
                    <th class="text-success" scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="ticketList">

            </tbody>
            <tfoot>
                <tr>
                    <th class="text-success" scope="col">Total Price</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th colspan="2" scope="col" id="totalPrice"></th>
                    <th scope="col"></th>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editSpecificSale" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Update Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <label>Select Ticket</label>
              <select class="form-select" id="edit_ticket" name="edit_ticket" aria-label="Default select example" required>
                  <option selected>Select a Ticket</option>
                  @foreach ($tickets as $ticket)
                  <option value="{{ $ticket->id }}" data-price="{{ $ticket->price }}" data-name="{{ $ticket->ticket_name }}" data-type="{{ $ticket->ticket_type }}">{{ $ticket->ticket_name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-sm-6">
              <label>Ticket Name</label>
              <input class="form-control" type="text" id="sale_id" name="sale_id" hidden>
              <input class="form-control" type="text" id="ticket_name" name="ticket_name" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label>Ticket Type</label>
              <input class="form-control" type="text" id="ticket_type" name="ticket_type" disabled> 
            </div>
            <div class="col-sm-6">
              <label>Ticket Price</label>
              <input class="form-control" type="text" id="ticket_price" name="ticket_price" disabled>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-target="#editSale" data-bs-toggle="modal">Back</button>
        <button type="button" class="btn btn-success" >Save</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('edit_ticket').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var name = selectedOption.getAttribute('data-name');
    var type = selectedOption.getAttribute('data-type');
    var price = selectedOption.getAttribute('data-price');
    document.getElementById('ticket_name').value = name ? name : '';
    document.getElementById('ticket_type').value = type ? type : '';
    document.getElementById('ticket_price').value = price ? price : '';
  });
</script>