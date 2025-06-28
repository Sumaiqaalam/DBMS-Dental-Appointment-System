<!DOCTYPE html>
<html>
<head>
    <title>Add New Dentist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Add New Dentist</h2>

    <form action="/function_add_new_dentist" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="Email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contact No</label>
            <input type="text" name="Contact_No" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Specialization</label>
            <input type="text" name="Specialization" class="form-control" required>
        </div>
<div class="mb-3">
    <label>Username</label>
    <input type="text" name="Username" class="form-control" required>
</div>

<div class="mb-3">
    <label>Password</label>
    <input type="password" name="Password" class="form-control" required>
</div>

        <button type="submit" class="btn btn-success">Save Dentist</button>
       
    </form>
</div>
</body>
</html>
