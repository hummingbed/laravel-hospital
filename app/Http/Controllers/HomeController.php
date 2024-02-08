<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    protected $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }
    public function index()
    {
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }

    public function appointment(AppointmentRequest $request)
    {
        try {
            $this->appointment->createAppointment($request);
            return redirect()->back()->with('success', 'Data saved successfully!');
        } catch (QueryException $e) {
            return redirect()->back()->with('errors', 'Failed to save data. Please try again.');
        }
    }

    public function myAppointment()
    {
//        var_dump(Auth::id());
        $appointments = Appointment::where(['user_id' => Auth::id()])->with('doctor')->get();
        if(Auth::id()){
            return view('user.my_appointment', compact('appointments'));
        }else{
            return redirect()->back();
        }

    }

    public function cancelAppointment($id)
    {
        $canceledAppointment = Appointment::find($id);
        $canceledAppointment->delete();
        return redirect()->back()->with('success', 'Appointment canceled successfully.');

    }

    public function redirect()
    {
        $doctors = Doctor::all();
        if(Auth::id()){
            if(Auth::user()->user_type == 0){
                return view('user.home', compact('doctors'));
            }else{
                return view('admin.home');
            }
        }else{
            return redirect()->back();
        }
    }
}
