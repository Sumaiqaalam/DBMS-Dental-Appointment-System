<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico')}}">
    <title>Medicio - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin_style.css')}}">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
					<img src="{{ asset('assets/img/short_logo.png') }}" alt="Medicio Logo" style="height: 40px; width: auto; margin-right: 10px;"><span>MEDICIO</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
						
						</span>
						<span>Admin</span>
                    </a>
					<div class="dropdown-menu">
						
						<a class="dropdown-item" href="/home_page">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index-2.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
                            <a href="/view_dentist_data"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="/all_patients_page"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="/see_dentist_all_appointments"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="/all_availibilities"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>  
                    </ul>
                </div>
            </div>
        </div>
<div class="page-wrapper">
    <div class="content">
        <div class="row mb-4">
            <div class="col-sm-12">
                <h4 class="page-title" style="font-size: 28px; font-weight: 700;">Dentist Appointments</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h5 class="card-title d-inline-block">Appointment List</h5>
                    <div class="table-responsive mt-3">
                        <table class="table table-hover table-center mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Dentist Name</th>
                                    <th>Specialization</th>
                                    <th>Status</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dentist_appoint_details as $details)
                                <tr>
                                    <td>{{ $details->patient_name }}</td>
                                    <td>{{ $details->dentist_name }}</td>
                                    <td>{{ $details->Specialization }}</td>
                                    <td>
                                        <span class="badge badge-{{ $details->status == 'Confirmed' ? 'success' : 'warning' }}">
                                            {{ $details->status }}
                                        </span>
                                    </td>
                                    <td>{{ $details->Appointment_Date }}</td>
                                    <td>{{ $details->Appointment_Time }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No appointments found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
</body>
</html>
