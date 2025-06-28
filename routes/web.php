<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\dentist;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\AdminController;
use App\Models\Appointment;

/*Route::get('/', function () {
    return view('welcome');
});*/
use App\Http\Controllers\AppointmentController;
Route::get('/appointment_page', [PatientController::class, 'hello']);// to fetch details of all dentists
 
Route::get('/index',function(){
    return view('dentist_system.index');
});

Route::get('/home_page',function(){
  return view('dentist_system.home_page');
});
Route::get('/', function () {
    return view('dentist_system.home_page');
});
Route::get('/patient_status', function () {
    return view('dentist_system.patient_status');// to select whether the patient is ne wo existing
});
Route::get('/new_patient_form', function () {
    return view('dentist_system.new_patient_form'); // to get into patient registration form
});
Route::post('store',[PatientController::class,'store']); // to store registeration data of user
Route::post('store_appointment_data',[PatientController::class,'store_appointment_data']); // to store apointment data
Route::get('/login_page', function () {
    return view('dentist_system.login_page'); // to get into patient registration form
})->name('loginpage');

Route::get('/see_all_appointment', [PatientController::class, 'see']);

Route::get('/after_appointment_page', function () {
   return view('dentist_system.after_appointment_page'); // to get into patient registration form
})->name('after_appointment_page'); // to get into sucessfully submitted page
Route::post('/show_or_new_app', [PatientController::class, 'show_or_new_app'])->name('show_or_new_app');


Route::get('/view_app', [PatientController::class,'showdata']);

Route::post('/check_info', [PatientController::class, 'check_info']);


Route::get('/view_dentist_data',[PatientController::class,'show_dentist']);


                              // to get into dentist login page
Route::get('/dentist_login_page',function(){
    return view('dentist_system.dentist_login_page');
});
Route::post('/check_dentist_info',[PatientController::class,'check_dentist_info']);
Route::get('/create_availaible_table',function(){
    return view('dentist_system.create_availaible_table');
});

//Route::post('/create_availaible_table', [PatientController::class, 'store_availaible_data'])->name('store');
//Route::get('/dentist_mainpage',[PatientController::class,'dentist_dashboard']);

Route::get('/dentist_mainpage', [PatientController::class, 'dentist_dashboard'])->name('dentist.dashboard');
Route::post('/availaible_data',[PatientController::class,'availaible_data']);
Route::get('/see_dentist_all_appointments',[PatientController::class,'dentist_appointment']);
Route::get('/appointments/{date}/{day}', [PatientController::class, 'showByDate'])->name('appointments.byDate');

Route::get('/view_dental_records/{patient}',[PatientController::class, 'index'])->name('dental-records.index');
Route::get('/edit_delete_new_dental_record/{record}', [PatientController::class, 'edit'])->name('dental-records.edit');
Route::put('/edit_delete_new_dental_record/{record}', [PatientController::class, 'update'])->name('dental-records.update');
Route::delete('/delete_dental_record/{record}', [PatientController::class, 'destroy'])->name('dental-records.destroy');
// Create form
Route::get('/create_dental_record_form/{patient}', [PatientController::class, 'create'])->name('dental-records.create');
// Store dental record for a patient
Route::post('/create_dental_record_form/{patient}', [PatientController::class, 'store_dental_record'])->name('dental-records.store');

// Edit appointment (show form)
Route::get('/edit_patient_appointment/{appointment}', [PatientController::class, 'edit_patient_appointment'])->name('edit_patient_appointment');

// Update appointment (handle form submission)
Route::put('/Update_patient_appointment/{appointment}', [PatientController::class, 'Update_patient_appointment'])->name('update_patient_appointment');

// Delete appointment
Route::delete('/delete_patient_appointment/{appointment}', [PatientController::class, 'destroy_patient_appointment'])->name('destroy_patient_appointment');
Route::get('/patient_dental_record',[PatientController::class, 'patient_dental_record']);
Route::get('/admin_signup_page',[AdminController::class, 'admin_signup'])->name('signup.form');
Route::get('/admin_login_page',[AdminController::class, 'showLoginForm']);
Route::post('/admin_login_page', [AdminController::class, 'login'])->name('login_submit');
Route::post('/admin_signup_page',[AdminController::class, 'signup_store'])->name('signup_store');
Route::get('/admin_dashboard',[PatientController::class, 'adminDashboard'])->name('admin.dashboard');

//function(){
  //  return view('dentist_system.admin_dashboard');

//}
//);
Route::get('/view_dentist_data',[PatientController::class, 'show_dentist']);
Route::get('/all_patients_page',[PatientController::class, 'allPatients']);
Route::get('/all_availibilities',[PatientController::class, 'showAllAvailability']);
Route:: get('/add_new_dentist',function(){

return view('dentist_system.add_new_dentist');
});
Route::post('/function_add_new_dentist',[PatientController::class, 'add_new_dentist']);

Route::get('/billingpage/{id}', function ($id) {
    $appointment = Appointment::findOrFail($id);
    return view('dentist_system.billingpage', compact('appointment'));
})->name('billing.create');

Route::post('/billingpage',[PatientController::class, 'billing_store'])->name('billing.store');
Route::get('/billing/{id}', [PatientController::class, 'billing_show'])->name('billing.show');
// Edit billing
Route::get('/billing/{id}/edit', [PatientController::class, 'billing_edit'])->name('billing.edit');

// Update billing
Route::put('/billing/{id}', [PatientController::class, 'billing_update'])->name('billing.update');

// Delete billing
Route::delete('/billing/{id}', [PatientController::class, 'billing_destroy'])->name('billing.destroy');

/*function(){
    return view('dentist_system.view_dentist_data');
}
);*/
//Route::get('/edit_delete_new_dental_record',function(){
  //  return view('dentist_system.edit_delete_new_dental_record');
//});



//[PatientController::class, 'edit'])->name('dental-records.edit');
