@extends('dentist_system.layout')

@section('content')
<div class="container" style="max-width: 500px; margin: auto; padding: 20px;">
    <h2>Admin Login</h2>

    @if($errors->any())
        <div style="color:red;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login_submit') }}">
        @csrf
        <div>
        <label>Username:</label>
        <input type="text" name="username" required class="form-control"><br><br>
        </div>
        <div>
        <label>Password:</label>
        <input type="password" name="password" required class="form-control" ><br><br>
</div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
@endsection
