<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Purchase Ticket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RDTX74RGJJ"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-RDTX74RGJJ');
  </script>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5DL27PN9');
  </script>
  <!-- End Google Tag Manager -->

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

<body onload="onloadGTM()">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DL27PN9"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="form-container">
    <h5 class="text-center mb-4">Confirm Ticket</h5>
    <table class="table">
      <tr>
        <td>Ticket Name:</td>
        <td>
          <p>{{ $tickets['ticket_name'] }}</p>
        </td>
      </tr>
      <tr>
        <td>Price:</td>
        <td>₱ {{ $tickets['price'] }}</td>
      </tr>
      <tr>
        <td>Customer Name:</td>
        <td>{{ $sales[0]['customer_name'] }}</td>
      </tr>
      <tr>
        <td>Ticket Quantities:</td>
        <td>x {{ $sales[0]['customer_quantity'] }}</td>
      </tr>
      <tr>
        <td>Customer Email:</td>
        <td>{{$sales[0]['customer_email']}}</td>
      </tr>
      <tr>
        <td>Customer Contact:</td>
        <td>{{$sales[0]['customer_contact']}}</td>
      </tr>
    </table>
    <form method="POST" class="d-flex justify-content-center" action="{{ route('purchased.ticket') }}">
      @csrf
      <input type="text" name="reference_num" value={{$sales[0]['reference_num']}} hidden>
      <input type="number" name="ticket_id" id="tix_id" value={{$tickets['id']}} hidden>
      <input type="text" name="customer_name" id="cus_name" value={{$sales[0]['customer_name']}} hidden>
      <input type="number" name="customer_quantity" id="tix_quantity" value={{$sales[0]['customer_quantity']}} hidden>
      <input type="text" name="ticket_price" id="tix_price" value={{$tickets['price']}} hidden>
      <input type="text" name="customer_email" id="cus_email" value={{$sales[0]['customer_email']}} hidden>
      <input type="text" name="customer_contact" id="cus_contact" value={{$sales[0]['customer_contact']}} hidden>
      <button class="btn btn-primary">Continue</button>
    </form>
  </div>
  
  <div class="footer-text">
    Powered by MediaOne Software Solutions
  </div>
  <script>
      function onloadGTM() {
          var response = <?= json_encode($sales)?>;
          var total_price = 0;
          const data = [];

          $.each(response, function(key, value) {
              // console.log(value);
              total_price += parseInt(value.ticket_price);
              data.push({
                  'ticket_num': value.ticket_num,
                  'ticket_name': value.ticket_name,
                  'ticket_type': value.ticket_type,
                  'ticket_price': value.ticket_price
              });
          });

          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
              'event': 'form_submit_ticket',
              'ticket_ref_num': response[0].reference_num,
              'total_purchase': total_price,
              'total_quantity': response.length,
              // 'sales_date': response[0].sales_date,
              'items': data,
          });
      }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
