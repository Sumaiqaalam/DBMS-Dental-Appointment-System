<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Book Appointment - DentalCare</title>
  <style>
    /* Basic Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    /* Navbar Styles */
    nav {
      background-color: #0077b6;
      padding: 15px 20px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav .logo {
      font-weight: bold;
      font-size: 1.5rem;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    /* Main Content */
    .container {
      padding: 40px 20px;
      max-width: 600px;
      margin: auto;
    }

    h1 {
      margin-bottom: 30px;
      color: #023e8a;
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    input, select {
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn {
      background-color: #0096c7;
      border: none;
      color: white;
      padding: 15px;
      font-size: 1.1rem;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0077b6;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">DentalCare</div>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Appointments</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <!-- Form Section -->

    <h1>appointment PAGE</h1>
    <table border="1"><tr>
        <th>ID</th>
        <th>PATIENT_ID</th>
        <th>DENTIST_ID</th>
        <th>STATUS</th>
        <th>APPOINTMENT_DATE</th>
        <th>APPOINTMENT_TIME</th>
        <th>PATIENT NAME</th>
        </tr>
        @if(!empty($view_app))
        @foreach ($view_app as $data12 )
        <tr>
         <td>{{$data12->id}}</td>
        <td>{{$data12->patient_id}}</td>
        <td>{{$data12->dentist_id}}</td>
        <td>{{$data12->status}}</td>
        <td>{{$data12->Appointment_Date}}</td>
        <td>{{$data12->Appointment_Time}}</td>
        <td>{{$data12->Name}}</td>
        </tr>  
        @endforeach
        @endif
    </table>


</body>
</html>
