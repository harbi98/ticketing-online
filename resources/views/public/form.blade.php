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
            width: 100%;
            max-width: 400px;
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
    </style>
</head>

<body>
    <div class="form-container">
        <h5 class="text-center mb-4">Buy a Ticket</h5>
        <form method="POST" action="{{ route('index.confirm.ticket') }}">
            @csrf
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
                <label for="inputPassword" class="form-label text-left">Full Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label text-left">Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label text-left">Contact Number</label>
                <input type="tel" class="form-control" id="customer_contact" name="customer_contact" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Continue</button>
            </div>  
        </form>
    </div>

    <div class="footer-text">
        Powered by MediaOne Software Solutions
    </div>
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'October_Metal_Mayhem_Ticket',
            'ticket_Name': $('#ticketSelect').val(),
            'items': [{
                'ticket_id': $('#ticketSelect').val(),
                'ticket_quantity': $('#quantity').val(),
                'ticket_total_price': int($('#quantity').val) * int($('#price').val()),
                'customer_name': $('#customer_name').val(),
                'customer_email': $('#customer_email').val(),
                'customer_number': $('#customer_contact').val(),
            }]
        });
    </script>
    <script>
        document.getElementById('ticketSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('price').value = price ? price : '';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>