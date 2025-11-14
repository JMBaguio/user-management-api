<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Services\UpcyclerService;
class UpcyclerController extends Controller
{
    protected $upcyclerService;
  
    public function __construct(UpcyclerService $upcyclerService)
    {
        $this->upcyclerService = $upcyclerService;
        
    }
    public function index()
    {
        $appointments = $this->upcyclerService->getAppointmentsForUpcycler(Auth::id());
        return view('upcycler.index', compact('appointments'));    
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::with('apptImages')->findOrFail($id);
        return view('upcycler.show', compact('appointment'));
    }
    public function update(UpdateAppointmentRequest $request, $appointmentid)
        {
            $validated = $request->validated(); // ✅ reuse this
            $this->upcyclerService->updateAppointmentStatus($appointmentid,$validated,Auth::id());

            return redirect()->back()->with('status', 'Appointment status updated.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($appointmentid) : RedirectResponse
    {
        $this->upcyclerService->deleteAppointment($appointmentid,Auth::id());
        return redirect()->route('upcycler.index')->with('success', 'Appointment deleted successfully!');
    }
}
