<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTicket">
  Create Sale
</button>


<div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('admin.confirm.ticket') }}">
        <div class="modal-body">
          @csrf
          <!-- <div class="mb-3">
            <label for="staticEmail" class="form-label">Select Tickets</label>
            <select class="form-select" id="ticketSelect" name="ticketSelect" aria-label="Default select example">
              <option selected>Select a Ticket</option>
              @foreach ($tickets as $ticket)
              <option value="{{ $ticket->id }}" data-price="{{ $ticket->price }}">{{ $ticket->ticket_name }}</option>
              @endforeach
            </select>
          </div> -->
          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="staticEmail" class="form-label">Select Tickets</label>
                  <select class="form-select" id="ticketSelect" name="ticketSelect" aria-label="Default select example" required>
                      <option selected>Select a Ticket</option>
                      @foreach ($tickets as $ticket)
                      <option value="{{ $ticket->id }}" data-price="{{ $ticket->price }}">{{ $ticket->ticket_name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-6">
                  <label for="quantity" class="form-label text-left">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="customer_quantity" required>
              </div>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label text-left">Price</label>
            <input type="number" readonly class="form-control" id="price" name="price">
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label text-left">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name">
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label text-left">Customer Email</label>
            <input type="email" class="form-control" id="customer_email" name="customer_email">
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label text-left">Customer Contact</label>
            <input type="tel" class="form-control" id="customer_contact" name="customer_contact">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Continue</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  document.getElementById('ticketSelect').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var price = selectedOption.getAttribute('data-price');
    document.getElementById('price').value = price ? price : '';
  });
</script>