<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDoctorRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\QueryException;


class AdminController extends Controller
{
    protected $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }
    public function addView()
    {
        return view('admin.add_doctor');
    }

    public function saveDoctor(SaveDoctorRequest $request)
    {
//        var_dump($request); exit();
        try {
            $this->doctor->saveDoctorData($request);
            return redirect()->back()->with('success', 'Data saved successfully!');
        } catch (QueryException $e) {
            // If an exception occurs, redirect back with an error message
            return redirect()->back()->with('errors', 'Failed to save data. Please try again.');
        }
    }

    public function showAppointment()
    {
        $appointments = Appointment::all();
        return view('admin.show_appointment', compact('appointments'));
    }

    public function approveRequest($id)
    {
        $appointments = Appointment::where(['id' => $id]);
        $appointments->update(['status' => 'approved']);
        return redirect()->back();
    }
    public function cancelRequest($id)
    {
        $appointments = Appointment::where(['id' => $id]);
        $appointments->update(['status' => 'cancel']);
        return redirect()->back();
    }
}
