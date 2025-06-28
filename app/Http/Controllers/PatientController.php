<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\patientmodel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\Availability;
use App\Models\DentalRecord;
use App\Models\Userr;
use App\Models\Billing;
use Carbon\Carbon;
class PatientController extends Controller
{

public function store(Request $request){
    $data = new patientmodel;
    $data->Name=$request->input('name');
    $data->Date_Of_Birth=$request->input('dob');
    $data->Gender=$request->input('gender');
    $data->Contact_No=$request->input('contact_no');
    $data->Email=$request->input('email');
    $data->Username=$request->input('username');
    $data->Password=Hash::make($request->input('password'));
    $data->save();
    return redirect()->route('loginpage');

}
public function store_appointment_data(Request $request){
    $app_data = new Appointment;
    $app_data->status=$request->input('status');
    $app_data->Appointment_Date=$request->input('appointment_date');
    $app_data->Appointment_Time=$request->input('appointment_time');
    $app_data->dentist_id=$request->input('dentist_id');
    $app_data->patient_id = Auth::user()->id;
    $app_data->save();
    return redirect()->route('after_appointment_page');

}

public function hello(){
    $data_d=Dentist::all();
    return view('dentist_system.appointment_page',compact('data_d'));
}

public function showdata(){
    $data1=DB::table('appointments')
    ->leftJoin('patient', 'patient.id', '=', 'appointments.patient_id')
    ->select('appointments.*', 'patient.Name')
    ->get();
    return view('dentist_system.view_app', ['view_app' => $data1]);

}
public function check_info(Request $request){
    $request->validate([
    'username' => 'required|string',
    'password' => 'required|string',
    ]);
    $user = patientmodel::where('Username', $request->input('username'))->first();
    if($user && Hash::check($request->input('password'), $user->Password)){
    Auth::login($user);
    $username=Auth::user()->Username;
    return view('dentist_system.show_or_new_app',['username'=> $username]);
    } 
    else{
    return view('dentist_system.login_page')->withErrors([
    'login' => 'Invalid username or password.',
    ]);
    }
}

//SHOW
public function show_dentist(){
    $dentist_data=Dentist::all();
    return view('dentist_system.view_dentist_data', compact('dentist_data'));
}

//TO_SEE_APPOINTMENT
public function see()
{
    $patientId = Auth::user()->id;

    // Use Eloquent with relationships
    $appointment_details = Appointment::with(['dentist', 'patient'])
        ->where('patient_id', $patientId)
        ->latest()
        ->get();

    // Extract date and day from the first appointment if it exists
    $date = null;
    $day = null;

    if ($appointment_details->isNotEmpty()) {
        $dateTime = \Carbon\Carbon::parse($appointment_details->first()->Appointment_Time);
        $date = $dateTime->format('Y-m-d');
        $day = $dateTime->format('l');
    }

    return view('dentist_system.see_all_appointment', [
        'appoint_details' => $appointment_details,
        'day' => $day,
        'date' => $date
    ]);
}


//CHECK_DENTIST_INFO
public function check_dentist_info(Request $request){
    $request->validate([
    'username' => 'required|string',
    'password' => 'required|string',
    ]);

    $dentist_user = Dentist::where('Username', $request->input('username'))->first();
    if($dentist_user && Hash::check($request->input('password'), $dentist_user->Password)) {
    // Log in using the 'dentist' guard explicitly
    Auth::guard('dentist')->login($dentist_user);
    // Use the same guard to get the logged-in user
    $username = Auth::guard('dentist')->user()->Username;
    //return view('dentist_system.dentist_mainpage', ['username' => $username]);
    return redirect()->route('dentist.dashboard');
    } 
    else{
    return view('dentist_system.dentist_login_page')->withErrors([
    'login' => 'Invalid username or password.',
    ]);
    }
}


//AVAILAIBLE_DATA
public function availaible_data(Request $request){
    //dd(Auth::guard('dentist')->id());
    $dentist_availaible_data=new Availability;
    $dentist_availaible_data->dentist_id = Auth::guard('dentist')->id();
    $dentist_availaible_data->day_of_week=$request->input('day_of_week');
    $dentist_availaible_data->start_time=$request->input('start_time');
    $dentist_availaible_data->end_time=$request->input('end_time');
    $dentist_availaible_data->Date=$request->input('date');
    $dentist_availaible_data->save();
    //return view('dentist_system.dentist_mainpage');
    return redirect()->route('dentist.dashboard');

}

//DENTIST_APPOINTMENT
public function dentist_appointment(){
    
    $dentist_appointment_details = DB::table('appointments')
    ->leftJoin('dentists', 'dentists.id', '=', 'appointments.dentist_id')
    ->leftJoin('patient', 'patient.id', '=', 'appointments.patient_id')
    ->select(
    'appointments.*',
    'dentists.Name as dentist_name',
    'patient.Name as patient_name',
    'dentists.Specialization')
    ->get();
    return view('dentist_system.see_dentist_all_appointments', ['dentist_appoint_details' => $dentist_appointment_details]);
}

//DENTSIST DASBOARD
public function dentist_dashboard(){
    $dentistId = Auth::guard('dentist')->user()->id;
    $dentist_weekly_details = DB::table('availabilities')
    ->where('dentist_id', $dentistId)
    ->orderByRaw("FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')")
    ->get();
    //dd($dentist_weekly_details);
    return view('dentist_system.dentist_mainpage', ['dentist_weekly_detail' => $dentist_weekly_details]);
}
//ALL DETAILS OF APPOINTMENT ON SPECIFIC DAY
public function showByDate($date, $day)
{
    // Assuming the dentist is logged in
    $dentistId = Auth::guard('dentist')->user()->id;
    $appoint_details = Appointment::where('dentist_id', $dentistId)
    ->whereDate('appointment_date', $date)
    ->get();
    return view('dentist_system.see_all_appointment', compact('appoint_details', 'date', 'day'));
}
public function index($patientId)
{
    $patient = patientmodel::findOrFail($patientId);
    $records = DentalRecord::where('patient_id', $patientId)
    ->where('dentist_id',Auth::guard('dentist')->id() ) // security: only show dentist's records
    ->get();
    return view('dentist_system.view_dental_records', compact('records', 'patient'));
}
public function edit($id)
{
    $record = DentalRecord::findOrFail($id);
//return redirect()->route('dental-records.edit', compact('record'));
return view('dentist_system.edit_delete_new_dental_record', compact('record'));
}
public function update(Request $request, $id)
{
    $record = DentalRecord::findOrFail($id);

    $validated = $request->validate([
        'Treatment_provided' => 'required|string',
        'Notes' => 'nullable|string',
        'Diagnosis' => 'required|string',
        'Visit_Date' => 'required|date',
    ]);

    $record->update($validated);

   // return redirect()->route('dental-records.index', $record->patient_id)
     //                ->with('success', 'Dental record updated successfully!');
return redirect()->route('dental-records.index', ['patient' => $record->patient_id])
                 ->with('success', 'Dental record updated successfully!');
    }
public function destroy($id)
{
    $record = DentalRecord::findOrFail($id);
    $patientId = $record->patient_id;

    $record->delete();

    return redirect()->route('dental-records.index', ['patient' => $patientId])
                     ->with('success', 'Dental record deleted successfully!');
}
public function create($patientId)
{
    $patient = patientmodel::findOrFail($patientId);
    return view('dentist_system.create_dental_record_form', compact('patient'));
}
public function store_dental_record(Request $request, $patientId)
{
    $validated = $request->validate([
        'Treatment_provided' => 'required|string',
        'Notes' => 'nullable|string',
        'Diagnosis' => 'required|string',
        'Visit_Date' => 'required|date',
        'Prescribtion'=>'nullable|string'
    ]);

    $validated['patient_id'] = $patientId;
    $validated['dentist_id'] = Auth::guard('dentist')->id(); // secure: associate to current dentist

    DentalRecord::create($validated);

    return redirect()->route('dental-records.index', ['patient' => $patientId])
                     ->with('success', 'Dental record created successfully!');
}
public function edit_patient_appointment($id)
{
    $appointment = Appointment::findOrFail($id);
    return view('dentist_system.edit_patient_appointment_page', compact('appointment'));
}
public function update_patient_appointment(Request $request, $id)
{
    $request->validate([
        'Appointment_Time' => 'required|date_format:H:i',
        'status' => 'required|string',
    ]);

    $appointment = Appointment::findOrFail($id);

    $appointment->Appointment_Time = $request->input('Appointment_Time');
    $appointment->status = $request->input('status');
    $appointment->save();
 // $appoint_detail = Appointment::latest()->get();
 $appoint_detail = Appointment::with('patient')->latest()->get();
    return view('dentist_system.see_all_appointment',['appoint_details' => $appoint_detail]);
}
public function destroy_patient_appointment($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();

    return view('dentist_system.see_all_appointment');
}


public function store_availaible_data(Request $request)
{
    $request->validate([
        'dentist_id' => 'required|exists:dentists,id',
        'Date' => 'required|date',
        'day_of_week' => 'required|string',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
    ]);

    Availability::create([
        'dentist_id' => $request->dentist_id,
        'Date' => $request->Date,
        'day_of_week' => $request->day_of_week,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return redirect()->back()->with('success', 'Availability created successfully!');
}


public function patient_dental_record(){
  $patient = Auth::user(); // Gets the logged-in patient

    // Load all dental records with related dentist
    $dentalRecords = $patient->dentalRecords()->with('dentist')->get();

    return view('dentist_system.patient_dental_record', compact('dentalRecords'));
}
public function allPatients()
{
    $patients = patientmodel::all(); // Fetch all patient records
    return view('dentist_system.all_patients_page', compact('patients'));
}

public function showAllAvailability()
{
    // Eager load dentist to reduce queries
    $availabilities = Availability::with('dentist')->get();

    return view('dentist_system.all_availibilities', compact('availabilities'));
}


public function adminDashboard()
{
    $upcomingAppointments = Appointment::with(['patient', 'dentist'])
        ->where('Appointment_Date', '>=', now())
        ->orderBy('Appointment_Date', 'asc')
        ->limit(5) // show top 5 upcoming
        ->get();
$recentDentists = Dentist::orderBy('created_at', 'desc')->take(5)->get();

    $recentPatients = patientmodel::orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    return view('dentist_system.admin_dashboard', compact('upcomingAppointments','recentDentists','recentPatients'));
}
// dentist_record_create_function
 
    public function add_new_dentist(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            'Contact_No' => 'required',
            'Specialization' => 'required',
            'Username' => 'required|unique:dentists,username',
            'Password' => 'required|min:6',
           
        ]);

        //Dentist::create($request->all());
        Dentist::create([
        'Name' => $request->Name,
        'Email' => $request->Email,
        'Contact_No' => $request->Contact_No,
        'Specialization' => $request->Specialization,
        'Username' => $request->Username,
        'Password' => Hash::make($request->Password), // Securely hash password
    ]);

        return redirect('/view_dentist_data')->with('success', 'Dentist added successfully!');
    }
    public function billing_store(Request $request ){
 
    $request->validate([
        'appointment_id' => 'required|exists:appointments,id',
        'payment_method' => 'required|string',
        'amount' => 'required|numeric',
        'status' => 'required|in:Paid,Unpaid',
    ]);

    Billing::create($request->all());

    $upcomingAppointments = Appointment::with(['patient', 'dentist'])
        ->where('Appointment_Date', '>=', now())
        ->orderBy('Appointment_Date', 'asc')
        ->limit(5) // show top 5 upcoming
        ->get();
$recentDentists = Dentist::orderBy('created_at', 'desc')->take(5)->get();

    $recentPatients = patientmodel::orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    return view('dentist_system.admin_dashboard', compact('upcomingAppointments','recentDentists','recentPatients'));
}
public function billing_show($id)
{
    $billing = Billing::findOrFail($id);
    return view('dentist_system.billing_record', compact('billing'));
}
public function billing_edit($id)
{
    $billing = Billing::findOrFail($id);
    return view('dentist_system.billing_edit_page', compact('billing'));
}
public function billing_update(Request $request, $id)
{
    $billing = Billing::findOrFail($id);

    $billing->update($request->validate([
        'payment_method' => 'required|string',
        'amount' => 'required|numeric',
        'status' => 'required|in:Paid,Unpaid',
    ]));

     return view('dentist_system.billing_record', compact('billing'));
}
public function billing_destroy($id)
{
    $billing = Billing::findOrFail($id);
    $billing->delete();
      
    // Redirect to the admin dashboard route
    return redirect()->route('admin.dashboard');
}








}