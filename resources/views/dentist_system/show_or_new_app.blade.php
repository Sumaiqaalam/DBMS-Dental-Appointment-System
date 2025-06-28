@extends('dentist_system.layout')

@section('content')
  <style>
    /* Basic Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    /* Navbar Styles */
   
    /* Main Content */
    .container {
      padding: 40px 20px;
      text-align: center;
      color: #444444;
    }

    h1 {
      margin-bottom: 30px;
      color: #444444;
    }

    p {
      color: #444444;
    }

    /* Buttons */
    .btn {
      background-color: #3fbbc0;
      border: none;
      color: white;
      padding: 15px 30px;
      margin: 20px;
      font-size: 1.1rem;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #329ba0;
    }
  </style>

  <!-- Navbar -->


  <!-- Main Content -->
  <div class="container">
    <h1>{{ $username  }}'s Account</h1>
    
    <p>Please choose an option:</p>
    <button class="btn" onclick="window.location.href='/see_all_appointment'">See All Appointments</button>
    <button class="btn" onclick="window.location.href='/appointment_page'">Add New Appointment</button>
  </div>
@endsection
