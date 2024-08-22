<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th class="text-success" scope="col">Ticket Name</th>
      <th scope="col">Type</th>
      <th class="text-success" scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($list as $data)
    <tr>
      <td>{{$data->ticket_name}}</td>
      <td>{{$data->ticket_type}}</td>
      <td>₱ {{$data->price}}</td>
      <td>
      <!-- <a href="#" class="btn btn-warning text-white rounded-5 btn-sm view_ticket" data-bs-toggle="modal" data-bs-target="#viewTicket" data-ticket-id="{{$data->id}}">View</a> -->
      <a href="#" class="btn btn-info text-white btn-sm edit_ticket" data-bs-toggle="modal" data-bs-target="#viewTicket" data-ticket-id="{{$data->id}}">Edit</a>
      <a href="#" class="btn btn-danger text-white btn-sm delete_ticket" data-ticket-id="{{$data->id}}">Delete</a>
      </td>
    </tr>
  @endforeach

  </tbody>
</table>