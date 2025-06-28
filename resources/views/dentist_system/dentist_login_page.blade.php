@extends('dentist_system.layout')

@section('title', 'Dentist Login')

@section('content')
<div class="container">
    <h1>Dentist Login</h1>

    <form action="{{ url('check_dentist_info') }}" method="POST">
        @csrf

        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />
        </div>

        <button type="submit" class="btn">Login</button>
    </form>
</div>
@endsection
