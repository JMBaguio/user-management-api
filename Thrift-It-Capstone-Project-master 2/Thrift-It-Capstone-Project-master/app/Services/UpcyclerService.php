<?php

namespace App\Services;

use App\Repositories\UpcyclerRepository;
use App\Repositories\AppointmentRepository;
use App\Models\User;
use App\Mail\UpcycleBookingApproved;
use App\Mail\UpcycleBookingCompleted;
use Illuminate\Support\Facades\Mail;

class UpcyclerService
{
    protected $upcyclerRepository;
    protected $appointmentRepository;

    public function __construct(UpcyclerRepository $upcyclerRepository, AppointmentRepository $appointmentRepository)
    {
        $this->upcyclerRepository = $upcyclerRepository;
        $this->appointmentRepository = $appointmentRepository;
    }

    public function getAllUpcyclers()
    {
        return $this->upcyclerRepository->all();
    }

    public function getUpcyclerById($id)
    {
        return $this->upcyclerRepository->find($id);
    }

    public function createUpcycler(array $data)
    {
        // Add business logic or mailing here if needed
        return $this->upcyclerRepository->create($data);
    }

    public function updateUpcycler(User $user, array $data)
    {
        // Add business logic or mailing here if needed
        return $this->upcyclerRepository->update($user, $data);
    }

    public function deleteUpcycler(User $user)
    {
        return $this->upcyclerRepository->delete($user);
    }

    public function getAppointmentsForUpcycler($upcyclerId)
    {
        return $this->appointmentRepository->getByUpcycler($upcyclerId);
    }

    public function getAppointmentById($appointmentId)
    {
        return $this->appointmentRepository->find($appointmentId);
    }

    public function updateAppointmentStatus($appointmentId, array $data, $currentUpcyclerId)
    {
        $appointment = $this->appointmentRepository->find($appointmentId);
        if ($appointment->upcycler_id !== $currentUpcyclerId) {
            abort(403, 'Unauthorized action.');
        }
        $previousStatus = $appointment->getOriginal('appstatus');
        $updatedAppointment = $this->appointmentRepository->update($appointment, $data);
        // Send approval email
        if ($previousStatus !== 'approved' && $updatedAppointment->appstatus === 'approved') {
            Mail::to($updatedAppointment->user->email)->send(new UpcycleBookingApproved($updatedAppointment));
        }
        // Send completed email
        if ($previousStatus !== 'completed' && $updatedAppointment->appstatus === 'completed') {
            Mail::to($updatedAppointment->user->email)->send(new UpcycleBookingCompleted($updatedAppointment));
        }
        return $updatedAppointment;
    }

    public function deleteAppointment($appointmentId, $currentUpcyclerId)
    {
        $appointment = $this->appointmentRepository->find($appointmentId);
        if ($appointment->upcycler_id !== $currentUpcyclerId) {
            abort(403, 'Unauthorized action.');
        }
        return $this->appointmentRepository->delete($appointment);
    }
} 