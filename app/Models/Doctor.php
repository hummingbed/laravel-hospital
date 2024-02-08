<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'room',
        'image',
        'speciality',
    ];

    public function formatDoctorImage($request)
    {
        $image = $request->file;
        $imageName = time().'.'.$image->getClientoriginalExtension();
        return $request->file->move('doctorImage', $imageName);
    }

    public function saveDoctorData($request)
    {
        $doctor = new Doctor;
        $doctor->image = $this->formatDoctorImage($request);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        $doctor->save();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
