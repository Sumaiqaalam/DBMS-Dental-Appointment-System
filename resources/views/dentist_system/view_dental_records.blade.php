@extends('dentist_system.layout')

@section('title', 'Dental Records - DentalCare')

@section('content')
<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }

  body {
    background-color: #f9f9f9;
    padding: 20px;
  }

  h2 {
    color: #444444;
    text-align: center;
    margin-bottom: 30px;
  }

  .container {
    max-width: 800px;
    margin: auto;
    color: #444444;
  }

  .card {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .card p {
    margin-bottom: 10px;
    color: #444444;
  }

  .btn,
  button {
    background-color: #3fbbc0;
    color: white;
    padding: 10px 15px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
  }

  .btn:hover,
  button:hover {
    background-color: #379ea3;
  }

  form {
    display: inline;
  }

  .no-records {
    text-align: center;
    color: #555;
    margin-bottom: 20px;
  }
</style>

<div class="container">
  <h2>Dental Records for {{ $patient->Name }}</h2>

  @if ($records->isEmpty())
    <p class="no-records">No dental records found for this patient.</p>
    <a href="{{ route('dental-records.create', ['patient' => $patient->id]) }}" class="btn">Create New Dental Record</a>
  @else
    @foreach ($records as $record)
      <div class="card">
        <p><strong>Treatment:</strong> {{ $record->Treatment_provided }}</p>
        <p><strong>Notes:</strong> {{ $record->Notes }}</p>
        <p><strong>Visited Date:</strong> {{ $record->Visit_Date }}</p>
        <p><strong>Diagnosis:</strong> {{ $record->Diagnosis }}</p>
        <p><strong>Prescribtion:</strong> {{ $record->Prescribtion }}</p>

        <a href="{{ route('dental-records.edit', $record->id) }}" class="btn">Edit Record</a>

        <form action="{{ route('dental-records.destroy', $record->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete Record</button>
        </form>
      </div>
    @endforeach
  @endif
</div>
@endsection
