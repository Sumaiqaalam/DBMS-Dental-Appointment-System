<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Billing Record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
</head>

<body>
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <a href="/home_page" class="logo">
                    <img src="{{ asset('assets/img/short_logo.png') }}" alt="Medicio Logo" style="height: 40px;"><span>MEDICIO</span>
                </a>
            </div>
            <a id="toggle_btn" href="#"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/home_page">Logout</a>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li><a href="/admin_dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li><a href="/view_dentist_data"><i class="fa fa-user-md"></i> <span>Doctors</span></a></li>
                        <li><a href="/all_patients_page"><i class="fa fa-wheelchair"></i> <span>Patients</span></a></li>
                        <li><a href="/see_dentist_all_appointments"><i class="fa fa-calendar"></i> <span>Appointments</span></a></li>
                        <li><a href="/all_availibilities"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h4 class="page-title">Edit Billing Record</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card-box">
                            <form action="{{ route('billing.update', $billing->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Appointment ID (readonly) -->
                                <div class="form-group">
                                    <label>Appointment ID</label>
                                    <input type="text" class="form-control" value="{{ $billing->appointment_id }}" readonly>
                                </div>

                                <!-- Payment Method -->
                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <input type="text" name="payment_method" class="form-control" value="{{ $billing->payment_method }}" required>
                                </div>

                                <!-- Amount -->
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" name="amount" step="0.01" class="form-control" value="{{ $billing->amount }}" required>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="Paid" {{ $billing->status === 'Paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="Unpaid" {{ $billing->status === 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                    </select>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Update Billing</button>
                                    <a href="{{ route('billing.show', $billing->id) }}" class="btn btn-secondary ml-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
