@extends('dentist_system.layout')

@section('title', 'Dental Appointment')

@section('content')
<style>
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
    margin-bottom: 20px;
    font-size: 1.1rem;
  }

  .btn {
    background-color: #3fbbc0;
    border: none;
    color: white;
    padding: 15px 30px;
    margin: 10px;
    font-size: 1.1rem;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .btn:hover {
    background-color: #37aab0;
  }
</style>

<div class="container">
  <h1>Welcome to MEDICIO Appointment</h1>
  <p>Please select your patient status:</p>
  <button class="btn" onclick="window.location.href='/new_patient_form'">New Patient</button>
  <button class="btn" onclick="window.location.href='/login_page'">Existing Patient</button>
</div>
@endsection
