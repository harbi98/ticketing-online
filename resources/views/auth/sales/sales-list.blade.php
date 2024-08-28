@include('auth.sales.edit-sale')
<table class="table table-fluid table-hover table-striped">
  <thead>
    <tr>
      <th class="text-success" scope="col">Reference Number</th>
      <!-- <th scope="col">Ticket ID</th> -->
      <th scope="col">Total Price</th>
      <th class="text-success" scope="col">Ticket Quantities</th>
      <th scope="col">Customer Name</th>
      <th class="text-success" scope="col">Customer Email</th>
      <th scope="col">Customer Contact</th>
      <!-- <th class="text-success" scope="col">Status</th> -->
      <th scope="col">Action</th>
      <!-- <th scope="col">Customer Address</th> -->
    </tr>
  </thead>
  <tbody>
  @php
  $displayedTicketIds = [];
  $ticketCounts = [];
  $totalPrices = [];

  // Count the number of tickets for each reference_num
  foreach ($list as $data) {
      if (!isset($ticketCounts[$data['reference_num']])) {
          $ticketCounts[$data['reference_num']] = 0;
          $totalPrices[$data['reference_num']] = 0;
      }
      $ticketCounts[$data['reference_num']]++;
      $totalPrices[$data['reference_num']] += $data['price'];
  }
  @endphp

  @foreach ($list as $key => $data)
      @if(!in_array($data['reference_num'], $displayedTicketIds))
        <tr>  
          <td>{{$data->reference_num}}</td>
          <!-- <td>{{$data->ticket_id}}</td> -->
          <td>₱ {{number_format($totalPrices[$data['reference_num']], 2)}}</td>
          <td>{{$ticketCounts[$data['reference_num']] }}</td>
          <td>{{$data->customer_name}}</td>
          <td>{{$data->customer_email}}</td>
          <td>{{$data->customer_contact}}</td>
          <!-- <td><span class="badge bg-{{$data->customer_email ? 'warning' : 'success'}}">{{$data->customer_email ? 'Not Yet Scanned' : 'Scanned'}}</span></td> -->
          <td>
            <a href="#" class="btn btn-warning btn-sm d-flex justify-content-center align-items-center edit_sales" data-sale-id="{{$data->reference_num}}" data-bs-toggle="modal" data-bs-target="#editSale">
                <i class='bx bx-edit-alt'></i>&nbsp;Edit
            </a>
          </td>
        </tr>
        @php
          $displayedTicketIds[] = $data['reference_num'];
        @endphp
      @endif
  @endforeach

    <!-- @foreach ($list as $key=>$data)
    <tr>  
      <td>{{$data->ticket_num}}</td>
      <td>{{$data->ticket_id}}</td>
      <td>{{$data->price}}</td>
      <td>{{$data->reference_num}}</td>
      <td>{{$data->customer_quantity}}</td>
      <td>{{$data->customer_name}}</td>
      <td>{{$data->customer_email}}</td>
      <td>{{$data->customer_contact}}</td>
    </tr>
    @endforeach -->

  </tbody>
</table>
{{$list->links()}}
@if (session('status'))
<script>
  swal("{{ strpos(session('status'), 'Unable to send email') !== false ? 'Error!' : 'Success!' }}", "{{ strpos(session('status'), 'Unable to send email') !== false ? 'error' : 'success' }}", "{{ strpos(session('status'), 'Unable to send email') !== false ? 'error' : 'success' }}");
</script>
@endif