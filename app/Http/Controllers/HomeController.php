<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appiontment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }

    public function appointment(AppointmentRequest $request)
    {
        $appointment = new Appiontment;
        $appointment->user_id = $request->user_id;
        $appointment->doctor_id = $request->doctor;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->save();
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
