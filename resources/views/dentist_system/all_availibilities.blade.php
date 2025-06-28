@extends('dentist_system.layout')

@section('title', 'All Availability Records')

@section('content')
<style>
  .container {
    padding: 40px 20px;
    max-width: 900px;
    margin: auto;
  }

  h2 {
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

  .no-records {
    text-align: center;
    color: #888;
    font-style: italic;
  }
</style>

<div class="container">
    <h2>All Availability Records</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Dentist Name</th>
                <th>Date</th>
                <th>Day of Week</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse($availabilities as $availability)
                <tr>
                    <td>{{ $availability->id }}</td>
                    <td>{{ $availability->dentist->Name ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($availability->Date)->format('d-m-Y') }}</td>
                    <td>{{ $availability->day_of_week }}</td>
                    <td>{{ \Carbon\Carbon::parse($availability->start_time)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($availability->end_time)->format('h:i A') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="no-records">No availability records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
