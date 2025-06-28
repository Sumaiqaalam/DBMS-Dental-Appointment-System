@extends('dentist_system.layout')

@section('content')
<div class="container">
  <h2>Edit Appointment</h2>

  <form action="{{ route('update_patient_appointment', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="Appointment_Time">Time:</label>
      <input type="time" name="Appointment_Time" id="Appointment_Time"  value="{{ $appointment->Appointment_Time }}" required class="form-control">
    </div>

    <div class="form-group">
      <label for="status">Status:</label>
      <select name="status" id="status" class="form-control" required>
        <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
