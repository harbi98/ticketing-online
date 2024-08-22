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
                    <th class="text-success" scope="col">Ticket ID</th>
                    <th scope="col">Ticket Price</th>
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
                    <th scope="col" id="totalPrice"></th>
                    <th scope="col"></th>
                </tr>
            </tfoot>
        </table>
      </div>
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