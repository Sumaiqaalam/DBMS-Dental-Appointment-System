@extends('dentist_system.layout')

@section('title', 'Patient Registration')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; background-color: #fff; padding: 40px 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); color: #444444;">
    <h1 style="text-align: center; margin-bottom: 30px;">REGISTRATION PAGE</h1>
    
    <form action="{{ url('store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
        @csrf

        <div>
            <label for="name" style="font-weight: bold; margin-bottom: 5px;">Name</label>
            <input type="text" id="name" name="name" required style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div>
            <label for="dob" style="font-weight: bold; margin-bottom: 5px;">Date of Birth</label>
            <input type="date" id="dob" name="dob" required style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div>
            <label for="gender" style="font-weight: bold; margin-bottom: 5px;">Gender</label>
            <select id="gender" name="gender" required style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
                <option value="">--Select--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div>
            <label for="contact" style="font-weight: bold; margin-bottom: 5px;">Contact Number</label>
            <input type="text" id="contact" name="contact_no" required style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div>
            <label for="email" style="font-weight: bold; margin-bottom: 5px;">Email</label>
            <input type="email" id="email" name="email" required style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div>
            <label for="username" style="font-weight: bold; margin-bottom: 5px;">Username</label>
            <input type="text" id="username" name="username" required style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div>
            <label for="password" style="font-weight: bold; margin-bottom: 5px;">Password</label>
            <input type="password" id="password" name="password" required style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <button type="submit" style="background-color: #3fbbc0; color: white; padding: 15px; font-size: 1.1rem; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
    </form>
</div>
@endsection
