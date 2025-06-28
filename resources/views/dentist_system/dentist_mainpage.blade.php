
@extends('dentist_system.layout')

@section('title', 'Dentist Login')

@section('content')
<style>
  .container {
    padding: 40px 20px;
    max-width: 900px;
    margin: auto;
  }

  .btn-container {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
  }

  .btn {
    background-color: #3fbbc0;
    border: none;
    color: white;
    padding: 12px 25px;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    text-decoration: none;
  }

  .btn:hover {
    background-color: #3fbbc0;
  }

  h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #444444;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
  }

  th, td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: center;
  }

  th {
    background-color: #3fbbc0;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .no-availability {
    text-align: center;
    color: #888;
    font-style: italic;
  }
</style>

<div class="container">
  <div class="btn-container">
    <a href="/create_availaible_table" class="btn">Create Availability Timetable</a>
  </div>

  <h1>This Week's Schedule</h1>

  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Day</th>
        <th>Working Hours</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($dentist_weekly_detail as $day)
      <tr>
        <td>{{ \Carbon\Carbon::parse($day->Date)->format('d-m-Y') }}</td>
        <td>{{ $day->day_of_week }}</td>
        <td>
          {{ \Carbon\Carbon::parse($day->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($day->end_time)->format('h:i A') }}
        </td>
        <td>
          <a href="{{ route('appointments.byDate', ['date' => $day->Date, 'day' => $day->day_of_week]) }}" class="btn">View Details</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="no-availability">You have not set any availability yet.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection

