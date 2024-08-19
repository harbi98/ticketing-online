<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">Ticket Number</th>
      <th scope="col">Ticket Id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Customer Contact</th>
      <!-- <th scope="col">Customer Address</th> -->
    </tr>
  </thead>
  <tbody>

    @foreach ($list as $key=>$data)
    <tr>

      <td>{{$data->ticket_num}}</td>
      <td>{{$data->ticket_id}}</td>
      <td>{{$data->customer_name}}</td>
      <td>{{$data->customer_email}}</td>
      <td>{{$data->customer_contact}}</td>
      <!-- <td>{{ $data->customer_address }}</td> -->
    </tr>
    @endforeach


  </tbody>
</table>
{{$list->links()}}