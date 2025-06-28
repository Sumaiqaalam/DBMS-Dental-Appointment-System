@extends('dentist_system.layout')

@section('title', 'Edit Dental Record')

@section('content')
<style>
  .container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    color: #444444;
  }

  h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #444444;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  label {
    font-weight: bold;
    color: #444444;
  }

  input,
  textarea {
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
    color: #444444;
  }

  .btn {
    background-color: #3fbbc0;
    border: none;
    color: white;
    padding: 12px;
    font-size: 1.1rem;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .btn:hover {
    background-color: #35a5a9;
  }

  .error-list {
    color: red;
    margin-bottom: 20px;
  }

  .error-list ul {
    padding-left: 20px;
  }
</style>

<div class="container">
  <h1>Edit Dental Record</h1>

  @if ($errors->any())
  <div class="error-list">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('dental-records.update', $record->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="Treatment_provided">Treatment Provided</label>
    <input name="Treatment_provided" id="Treatment_provided" value="{{ old('Treatment_provided', $record->Treatment_provided) }}" required>

    <label for="Diagnosis">Diagnosis</label>
    <input name="Diagnosis" id="Diagnosis" value="{{ old('Diagnosis', $record->Diagnosis) }}" required>

    <label for="Visit_Date">Visit Date</label>
    <input type="date" name="Visit_Date" id="Visit_Date" value="{{ old('Visit_Date', $record->Visit_Date) }}" required>

    <label for="Notes">Notes</label>
    <textarea name="Notes" id="Notes" rows="4">{{ old('Notes', $record->Notes) }}</textarea>

    <button type="submit" class="btn">Update Record</button>
  </form>
</div>
@endsection
