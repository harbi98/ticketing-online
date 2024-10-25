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
    <tbody id="myTable">
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
  <!-- @vite('resources/js/app.js') -->
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script src="https://js.pusher.com/7.0/echo.js"></script>
  <script src="https://unpkg.com/laravel-echo/dist/echo.iife.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>

  <script>
    window.Pusher = Pusher;

    window.Echo = new Echo({
      broadcaster: 'pusher',
      key: 'ce257e8ff96b62b915c8',
      cluster: 'ap1',
      encrypted: true,
    });

    window.Echo.channel('sales')
      .listen('SaleCreated', (event) => {
        const salesTableBody = document.getElementById('myTable');
        const existingRow = Array.from(salesTableBody.rows).find(row => row.cells[0].textContent === event.reference_num);

        const ticketPrice = parseFloat(event.total_price);
        const ticketQuantity = parseInt(event.customer_quantity);

        if (isNaN(ticketPrice) || isNaN(ticketQuantity)) {
          console.error('Invalid price or quantity:', {
            ticketPrice,
            ticketQuantity
          });
          return;
        }

        if (existingRow) {
          const existingQuantityCell = existingRow.cells[2];
          const existingTotalCell = existingRow.cells[1];

          const existingQuantity = parseInt(existingQuantityCell.textContent) + ticketQuantity;
          const newTotalPrice = ticketPrice * existingQuantity;

          existingQuantityCell.textContent = existingQuantity;
          existingTotalCell.textContent = `₱ ${newTotalPrice.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;

        } else {
          const newRow = document.createElement('tr');
          const totalPrice = ticketPrice * ticketQuantity;

          newRow.innerHTML = `
                    <td>${event.reference_num}</td>
                    <td class="count-me">₱ ${totalPrice.toLocaleString(undefined, { minimumFractionDigits: 2 })}</td>
                    <td>${ticketQuantity}</td>
                    <td>${event.customer_name}</td>
                    <td>${event.customer_email}</td>
                    <td>${event.customer_contact}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm d-flex justify-content-center align-items-center edit_sales" data-sale-id="${event.reference_num}" data-bs-toggle="modal" data-bs-target="#editSale">
                            <i class='bx bx-edit-alt'></i>&nbsp;Edit
                        </a>
                    </td>
                `;

          salesTableBody.insertBefore(newRow, salesTableBody.firstChild);
        }
      });
  </script>

  <script>
    const pusher = new Pusher('ce257e8ff96b62b915c8', {
      cluster: 'ap1',
      encrypted: true,
      debug: false
    });

    // Subscribe to channel
    const channel = pusher.subscribe('sales');
  </script>

  {{$list->links()}}
  @if (session('status'))
  <script>
    swal("{{ strpos(session('status'), 'Unable to send email') !== false ? 'Error!' : 'Success!' }}", "{{ strpos(session('status'), 'Unable to send email') !== false ? 'error' : 'success' }}", "{{ strpos(session('status'), 'Unable to send email') !== false ? 'error' : 'success' }}");
  </script>
  @endif