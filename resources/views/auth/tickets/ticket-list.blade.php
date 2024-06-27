<table class="table">
    <thead>
      <tr>
        <th scope="col">Ticket Name</th>
        <th scope="col">Type</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($list as $data)
            <tr>
                <td>{{$data->ticket_name}}</td>
                <td>{{$data->ticket_type}}</td>
                <td>{{$data->price}}</td>
            </tr>
        @endforeach
   
    </tbody>
  </table>