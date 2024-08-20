<table class="table table-fluid table-hover table-striped">
  <thead>
    <tr>
      <th class="text-success" scope="col">Ticket Number</th>
      <th scope="col">Ticket ID</th>
      <th class="text-success" scope="col">Ticket Price</th>
      <th scope="col">Reference Number</th>
      <th class="text-success" scope="col">Ticket Quantities</th>
      <th scope="col">Customer Name</th>
      <th class="text-success" scope="col">Customer Email</th>
      <th scope="col">Customer Contact</th>
      <th scope="col">Action</th>
      <!-- <th scope="col">Customer Address</th> -->
    </tr>
  </thead>
  <tbody>
  @php
  $displayedTicketIds = [];
  $ticketCounts = [];

  // Count the number of tickets for each reference_num
  foreach ($list as $data) {
      if (!isset($ticketCounts[$data['reference_num']])) {
          $ticketCounts[$data['reference_num']] = 0;
      }
      $ticketCounts[$data['reference_num']]++;
  }
  @endphp

  @foreach ($list as $key => $data)
      @if(!in_array($data['reference_num'], $displayedTicketIds))
        <tr>  
          <td>{{$data->ticket_num}}</td>
          <td>{{$data->ticket_id}}</td>
          <td>{{$data->price}}</td>
          <td>{{$data->reference_num}}</td>
          <td>{{ $ticketCounts[$data['reference_num']] }}</td>
          <td>{{$data->customer_name}}</td>
          <td>{{$data->customer_email}}</td>
          <td>{{$data->customer_contact}}</td>
          <td>
            <a href="#" class="btn btn-warning btn-sm d-flex justify-content-center align-items-center">
                <i class='bx bx-edit-alt'></i>&nbsp;View
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
      <!-- <td>{{ $data->customer_address }}</td> -->

  </tbody>
</table>
{{$list->links()}}