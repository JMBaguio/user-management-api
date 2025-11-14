<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Services\AppointmentService;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcyclers = User::where('role', 1)->where('is_active','1')->get(); // fetch active all upcyclers
        return view('appointments.index', compact('upcyclers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $upcyclerId = $request->query('upcycler_id'); 
        $upcycler = null;

        if($upcyclerId){
            $upcycler = User::where('role', 1)->find($upcyclerId); 
        }

        return view('appointments.create', compact('upcycler'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        // Pass both validated data and image files
        $this->appointmentService->createAppointment($validated, $request->file('images'));

        return redirect()->route('appointments.index')
                        ->with('success', 'Appointment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($appointmentid)
    {
        $appointment = Appointment::with(['apptImages'])->getAppointmentById($appointmentid);
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($appointmentid)
    {
        $appointment = $this->appointmentService->getAppointmentById($appointmentid);
        $upcyclers = User::where('role', 1)->get();
        return view('appointments.edit', compact('appointment', 'upcyclers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, $appointmentid)
    {
        $appointment = $this->appointmentService->getAppointmentById($appointmentid);
        $validated = $request->validated();
        $this->appointmentService->updateAppointment($appointment, $validated);
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($appointmentid)
    {
        $appointment = $this->appointmentService->getAppointmentById($appointmentid);
        $this->appointmentService->deleteAppointment($appointment);
        return redirect()->route('appointments.myAppointments')->with('success', 'Appointment deleted successfully!');
    }
    
    public function myAppointments()
    {
        $appointments = $this->appointmentService->getAppointmentsByUser(Auth::id());
        return view('appointments.myAppointments', compact('appointments'));
    }

    public function cancel($appointmentid)
    {
        $appointment = $this->appointmentService->getAppointmentById($appointmentid);
        $result = $this->appointmentService->cancelAppointment($appointment);
        if(isset($result['error'])){
            return redirect()->route('appointments.myAppointments')->withErrors($result['error']);
        }
        return redirect()->route('appointments.myAppointments')->with('success', $result['success']);
    }
}
