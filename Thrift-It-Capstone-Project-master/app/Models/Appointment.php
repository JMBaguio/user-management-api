<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Correct the spelling of the primary key property
    protected $primaryKey = 'appointmentid';
    public $incrementing = true; 

    protected $fillable = [
        'user_id',
        'upcycler_id',
        'appdetails',
        'contactnumber',
        'apptype',
        'appstatus',
        'appdate',
    ];

    // Relationship with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with the upcycler
    public function upcycler()
    {
        return $this->belongsTo(User::class, 'upcycler_id');
    }

    // Set the route key name to 'appointmentid' instead of the default 'id'
    public function getRouteKeyName()
    {
        return 'appointmentid';
    }

     public function apptImages()
    {
        return $this->hasMany(AppointmentImage::class, 'appointment_id', 'appointmentid');
    }
}
