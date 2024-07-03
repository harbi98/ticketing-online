<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Purchase Ticket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
      flex-direction: column;
    }

    .form-container {
      width: 80%;
      max-width: 500px;
      background: #fff;
      padding: 2rem;

      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

    }

    .form-label {
      text-align: left;
    }

    .footer-text {
      margin-top: 20px;
      color: #6c757d;
    }

    .custom-select {
      width: 100%;
      max-width: 400px;
      padding: 0.5rem;
      font-size: 1rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-select:focus {
      border-color: #80bdff;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    p {
      margin-bottom: 0;
    }

    td {
      border-bottom: none;

      text-wrap: break-word;
      max-width: 240px;
    }

    td:first-child {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h5 class="text-center mb-4">Confirm Ticket</h5>

    <table class="table">
      <tr>
        <td>Ticket Name:</td>
        <td>
          <p>{{ $ticket->ticket_name }}</p>
        </td>
      </tr>
      <tr>
        <td>Price:</td>
        <td>₱ {{ $ticket->price}}</td>
      </tr>
      <tr>
        <td>Customer Name:</td>
        <td>{{$sale->customer_name}}</td>

      </tr>

      <tr>
        <td>Customer Address:</td>
        <td>{{ $sale->customer_address }}</td>
      </tr>
      <tr>
        <td>Customer Email:</td>
        <td>{{$sale->customer_email}}</td>
      </tr>
      <tr>
        <td>Customer Contact:</td>
        <td>{{$sale->customer_contact}}</td>
      </tr>
    </table>
    <form method="POST" class="d-flex justify-content-center" action="{{ route('purchased.ticket') }}">
      @csrf
      <input type="number" name="ticket_id" value={{$ticket->id}} hidden>
      <input type="text" name="customer_name" value={{$sale->customer_name}} hidden>
      <input type="text" name="customer_address" value={{$sale->customer_address}} hidden>
      <input type="text" name="customer_email" value={{$sale->customer_email}} hidden>
      <input type="text" name="customer_contact" value={{$sale->customer_contact}} hidden>
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="footer-text">
    Powered by MediaOne Software Solutions
  </div>
  <script>

  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<!-- <div class="mb-3 d-flex justify-content-between">
        <label for="staticEmail" class="form-label">Ticket Name:</label>
        <p>{{$ticket->ticket_name}}</p>
      </div>
      <div class="mb-3 d-flex justify-content-between">
        <label for="price" class="form-label text-left">Price:</label>
        <p> {{$ticket->price }}</p>
      </div>
      <div class="mb-3 d-flex justify-content-between">
        <label for="inputPassword" class="form-label text-left">Customer Name:</label>
        <p>{{ $sale->customer_name }}</p>
      </div>
      <div class="mb-3 d-flex justify-content-between">
        <label for="inputPassword" class="form-label text-left">Customer Address: </label>
        <p>{{$sale->customer_address}}</p>
      </div>
      <div class="mb-3 d-flex justify-content-between">
        <label for="inputPassword" class="form-label text-left">Customer Email:</label>
        <p>{{ $sale->customer_email }}</p>
      </div>
      <div class="mb-3 d-flex justify-content-between">
        <label for="inputPassword" class="form-label text-left">Customer Contact: </label>
        <p>{{ $sale->customer_contact}}</p>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>  -->