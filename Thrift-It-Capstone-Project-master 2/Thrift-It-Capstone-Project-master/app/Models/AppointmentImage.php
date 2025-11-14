<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'image_path',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'appointmentid');
    }
}