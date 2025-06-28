@extends('dentist_system.layout')

@section('title', 'My Dental Records')

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
  <h2>My Dental Records</h2>

  <table>
    <thead>
      <tr>
        <th>Dentist</th>
        <th>Prescription</th>
        <th>Treatment Provided</th>
        <th>Diagnosis</th>
        <th>Visit Date</th>
      </tr>
    </thead>
    <tbody>
      @forelse($dentalRecords as $record)
      <tr>
        <td>{{ $record->dentist->Name ?? 'N/A' }}</td>
        <td>{{ $record->Prescribtion }}</td>
        <td>{{ $record->Treatment_provided }}</td>
        <td>{{ $record->Diagnosis }}</td>
        <td>{{ \Carbon\Carbon::parse($record->Visit_Date)->format('d-m-Y') }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="no-records">No dental records found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
