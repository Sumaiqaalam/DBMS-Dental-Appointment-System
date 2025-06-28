@extends('dentist_system.layout')

@section('content')
<div class="container mt-4">
    <h2>Create Your Availability</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/availaible_data') }}" method="POST">
        @csrf
 <div class="form-group mb-3">
            <label for="date">Specific Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <!-- Day of Week -->
        <div class="form-group mb-3">
            <label for="day_of_week">Day of the Week</label>
            <select name="day_of_week" id="day_of_week" class="form-control" required readonly>
                <option value="">-- Select Day --</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>

        <!-- Start Time -->
        <div class="form-group mb-3">
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>

        <!-- End Time -->
        <div class="form-group mb-3">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>

        <!-- Date -->
       

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit Availability</button>
    </form>
</div>

<!-- JavaScript to auto-fill day -->
<script>
    document.getElementById('date').addEventListener('change', function () {
        const inputDate = new Date(this.value);
        const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const selectedDay = days[inputDate.getDay()];
        
        const daySelect = document.getElementById('day_of_week');
        for (let option of daySelect.options) {
            if (option.value === selectedDay) {
                option.selected = true;
                break;
            }
        }
    });
</script>
@endsection
