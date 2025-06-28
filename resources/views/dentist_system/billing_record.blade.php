<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>Medicio - Billing Record</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin_style.css') }}">
</head>

<body>
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <a href="/home_page" class="logo">
                    <img src="{{ asset('assets/img/short_logo.png') }}" alt="Medicio Logo" style="height: 40px; width: auto; margin-right: 10px;"><span>MEDICIO</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
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

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h4 class="page-title" style="font-size: 28px; font-weight: 700;">Billing Record</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="card-title d-inline-block">Details</h5>
                            <div class="table-responsive mt-3">
                                <table class="table table-hover table-bordered text-center">
                                    <thead >
                                        <tr>
                                            <th class="px-4 py-2">Appointment ID</th>
                                            <th class="px-4 py-2">Payment Method</th>
                                            <th class="px-4 py-2">Amount (Rs.)</th>
                                            <th class="px-4 py-2">Status</th>
                                            <th class="px-4 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-3 py-2">{{ $billing->appointment_id }}</td>
                                            <td class="px-3 py-2">{{ $billing->payment_method }}</td>
                                            <td class="px-3 py-2">{{ $billing->amount }}</td>
                                            <td class="px-3 py-2">{{ $billing->status }}</td>
                                            <td class="px-3 py-2">
                                               <a href="{{route('billing.edit',$billing->id)}}">Edit </a>
                                                <form action="{{ route('billing.destroy', $billing->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this billing record?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger ms-2">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.content -->
        </div> <!-- /.page-wrapper -->
    </div> <!-- /.main-wrapper -->
</body>
</html>

