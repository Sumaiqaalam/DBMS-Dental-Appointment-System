@extends('dentist_system.layout')

@section('content')
<div class="container" style="max-width: 500px; margin: auto; padding: 20px;">
    <h2>Admin Sign Up</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signup_store') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div>
            <label>Username:</label>
            <input type="text" name="username" required class="form-control">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
@endsection
