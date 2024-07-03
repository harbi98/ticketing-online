<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>{{ config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="color-scheme" content="light">
  <meta name="supported-color-schemes" content="light">

  <style>
    * {
      padding: 0;
      margin: 0;
    }

    body {
      margin: auto;
      min-width: fit-content;
      max-width: 450px;
    }

    .wrapper {
      font-family: Helvetica, sans-serif;
      background-color: #48a7c5;
      padding: 2em;
      width: 400px;
      height: 700px;


      border-radius: 10px;
    }

    .body {
      float: center;
      background-color: white;
      padding: 1em;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      width: 95%;
      border-radius: 5px;

      overflow: visible;
      height: 95%;
    }

    .header {
      font-size: 20px;
      font-weight: bold;
      padding: 0;
    }

    .loc-and-age-details {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1em;
      font-size: 15px;
    }

    .loc {
      color: gray;
    }

    .age {
      color: rgb(5, 179, 48);
    }



    #left-circle {
      background-color: #48a7c5;
      padding: 20px;
      margin-top: 0;
    }

    #right-circle {
      background-color: #48a7c5;
      padding: 20px;
      margin-top: 0;
    }

    .image {

      margin: 0 auto;

      padding: 0.5em;
      padding-bottom: 2em;
      border-bottom: 1px solid #eeecec;
      margin-bottom: 1em;
    }

    .image img {
      margin-left: 15%;
      width: 250px;
      height: 250px;

    }

    hr {
      color: #eeecec;
    }





    .details {
      display: inline-block;
      width: 100%;
      margin: 1em 0;
      ;
    }

    .details div:first-of-type {
      float: left;
    }

    .details div:last-of-type {
      float: right;
    }

    .detail>* {}

    .title {
      color: gray;
    }

    .value {
      font-weight: bold;
    }
  </style>
</head>

<body>

  <div class="wrapper">
    <div class="body">
      <h1 class="header">WACKEN EMTAL BATTLE PHILIPPINES 2024 GRAND FINALS</h1>
      <div class="loc-and-age-details">
        <p class="loc">Location: SM City North EDSA Skydome</p>
        <p class="age">Age: 18+</p>
      </div>
      <hr>
      <div class="image">
        <img src="https://via.placeholder.com/150" alt="Image">
      </div>
      <div class="details">
        <div class="detail">
          <p class="title">Entrance code</p>
          <p class="value">R9R-6GP-CCR</p>
        </div>
        <div class="detail">
          <p class="title">Order Detail</p>
          <p class="value">D9DD319</p>
        </div>
      </div>
      <hr>
      <div class="details">
        <div class="detail">
          <p class="title">Ticket Type</p>
          <p class="value">GEN AD</p>
        </div>
        <div class="detail">
          <p class="title">Price (PHP)</p>
          <p class="value">D9DD319</p>
        </div>
      </div>
      <div class="detail">
        <p class="title">Event Time</p>
        <li class="value">Sun, June 16, 2024 13:00

        </li>
      </div>

    </div>
  </div>
</body>

</html>