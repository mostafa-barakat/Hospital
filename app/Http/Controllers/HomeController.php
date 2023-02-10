<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Latest;
use App\Models\Appointment;
use Illuminate\Http\Request;
// use App\Http\Requests\AddNewsRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AppointmentRequest;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                $doctors = Doctor::all();
                $news = Latest::all();
                return view('home.index' , compact('doctors' , 'news'));
            }
            else{
                $total_doctors= Doctor::all()->count();
                $total_news = Latest::all()->count();
                $total_appointments = Appointment::all()->count();
                $total_users = User::all()->count();

                return view('admin.home' , compact('total_doctors' , 'total_news' , 'total_appointments' , 'total_users'  ));
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index()
    {
        $doctors = Doctor::all();
        $news = Latest::all();
        return view('home.index' , compact('doctors' , 'news'));
    }


    public function news($id)
    {
        $news = Latest::findOrFail($id);
        return view('home.news' , compact('news'));
    }
    public function all_news()
    {
        $news = Latest::all();
        return view('home.all_news' , compact('news'));
    }




    public function appointment_data(AppointmentRequest $request)
    {

        if(Auth::id()){
            $userid = Auth::user()->id;
        }
        else{
            return redirect()->route('login');
        }

        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'doctor' => $request->doctor,
            'phone' => $request->phone,
            'message' => $request->message,
            'status' => 'In progress',
            'user_id' => $userid
        ]);

        return redirect()->back()->with('message' , 'The appointment has been booked successfully')->with('type' , 'success');
    }

    public function my_appointment($id)
    {
        $id = Auth::user()->id;
        $appointments = Appointment::latest('id')->where('user_id' , '=' , $id)->get();
        return view('home.my_appointment' , compact('appointments'));
    }
    public function edit_appointment($id)
    {
        $doctors = Doctor::all();
        $appointments = Appointment::findOrFail($id);
        return view('home.edit_appointments', compact('appointments' , 'doctors'));
    }
    public function update_appointment(AppointmentRequest $request, $id)
    {
        $appointments = Appointment::findOrFail($id);
        $appointments->update([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'doctor' => $request->doctor,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->route('home.index')->with('message' , 'Update Appointment Successfoul')->with('type' , 'success');
    }
    public function forcedelete_appointment($id)
    {
        Appointment::find($id)->forcedelete();
        return redirect()->back()->with('message', 'The Appointment Deleted Successfoul')->with('type', 'success');
    }
}
