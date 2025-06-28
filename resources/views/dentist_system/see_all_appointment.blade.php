@extends('dentist_system.layout')

@section('title', 'Appointments - DentalCare')

@section('content')
<style>
  .container {
    padding: 40px 20px;
    max-width: 900px;
    margin: auto;
    color: #444444;
  }

  h1 {
    margin-bottom: 30px;
    color: #444444;
    text-align: center;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    padding: 12px;
    border: 1px solid #ccc;
    text-align: left;
    color: #444444;
  }

  th {
    background-color: #3fbbc0;
    color: white;
  }

  .no-appointments {
    text-align: center;
    margin-top: 40px;
    color: #888;
    font-size: 1.1rem;
  }

  .btn {
    background-color: #3fbbc0;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.3s ease;
  }

  .btn:hover {
    background-color: #36a6a9;
  }

  .status-free {
    color: green;
  }

  .status-booked {
    color: red;
  }

  .status-break {
    color: orange;
  }
</style>

<div class="container">
 


  @if($appoint_details->isEmpty())
    <p class="no-appointments">No appointments found.</p>
  @else
    <table>
      <thead>
        <tr>
          <th>Patient</th>
          <th>Time</th>
          <th>Status</th>
          <th>Payment</th>
          <th>Dental Record</th>
          <th>edit</th>
          <th> delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($appoint_details as $appointment)

<tr>
    <td>{{ $appointment->patient->Name ?? 'N/A' }}</td>
   
   
    <td>{{ \Carbon\Carbon::parse($appointment->Appointment_Time)->format('h:i A') }}</td>
    <td>{{ ucfirst($appointment->status) }}</td>
    <td>
    @if($appointment->billing)
    {{ $appointment->billing->status }} {{-- Shows "Paid" or "Unpaid" --}}
@else
    Unpaid {{-- If no billing record exists --}}
@endif
</td>
            <td><a href="{{ route('dental-records.index', $appointment->patient_id) }}" class="btn">View</a></td>
             {{-- Edit button --}}
          <td><a href="{{ route('edit_patient_appointment', $appointment->id) }}" class="btn btn-warning">Edit</a></td>

          {{-- Delete button --}}
          <td><form action="{{ route('destroy_patient_appointment', $appointment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection

