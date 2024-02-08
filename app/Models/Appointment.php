<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'doctor_id',
        'date',
        'message',
    ];

    public function createAppointment($request)
    {
        $getUser = User::where(['name' => $request->user_id])->first();
        $appointment = new Appointment;
        $appointment->user_id = $getUser->id;
        $appointment->doctor_id = $request->doctor;
        $appointment->date = $request->date;
        $appointment->status = "in_progress";
        $appointment->message = $request->message;
        return $appointment->save();
    }
}
