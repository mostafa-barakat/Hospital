<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Latest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\SendEmail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\AddDoctorRequest;
use Notification;


class AdminController extends Controller
{
    public function add_doctor()
    {
        return view('admin.add_doctor');
    }
    public function add_doctor_data(AddDoctorRequest $request)
    {
        $path = $request->file('image')->store('uploads', 'custom');
        Doctor::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'phone' => $request->phone,
            'image' => $path,
        ]);
        return redirect()->route('admin.add_doctor')->with('message' , 'Add New Doctro Successfoul')->with('type' , 'success');
    }
    public function all_doctor()
    {
        $doctors = Doctor::all();
        return view('admin.all_doctor' , compact('doctors'));
    }
    public function edit_doctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.edit_doctor', compact('doctor'));
    }
    public function update_doctor(AddDoctorRequest $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $path = $doctor->image;
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'custom');
        }

        $doctor->update([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'phone' => $request->phone,
            'image' => $path,

        ]);

        return redirect()->route('admin.all_doctor')->with('message' , 'Update Doctro Information Successfoul')->with('type' , 'success');
    }
    public function destroy_doctor($id)
    {
        Doctor::destroy($id);

        return redirect()->route('admin.all_doctor')->with('message', 'Delete Doctor Successfully')->with('type', 'success');
    }
    public function trach_doctor()
    {
        $doctors = Doctor::onlyTrashed()->latest('id')->paginate(10);
        return view('admin.trash', compact('doctors'));
    }
    public function forcedelete_doctor($id)
    {
        Doctor::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.all_doctor')->with('message', 'The Doctor Has Been Permanently Deleted')->with('type', 'success');
    }
    public function restore_doctor($id)
    {
        Doctor::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.all_doctor')->with('message', 'The Doctor Has Been Restore')->with('type', 'success');
    }





    public function add_news()
    {
        return view('admin.add_news');
    }
    public function add_news_data(AddNewsRequest $request)
    {
        $path = $request->file('image')->store('uploads', 'custom');

        Latest::create([
            'content' => $request->content,
            'event' => $request->event,
            'publisher' => $request->publisher,
            'image' => $path,
        ]);
        return redirect()->route('admin.add_news')->with('message' , 'Add New News Successfoul')->with('type' , 'success');
    }
    public function all_news()
    {
        $news = Latest::all();
        return view('admin.all_news' , compact('news'));
    }
    public function edit_news($id)
    {
        $news = Latest::findOrFail($id);
        return view('admin.edit_news', compact('news'));
    }
    public function update_news(AddNewsRequest $request, $id)
    {
        $news = Latest::findOrFail($id);

        $path = $news->image;
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads' , 'custom');
        }

        $news->update([
            'content' => $request->content,
            'event' => $request->event,
            'publisher' => $request->publisher,
            'image' => $path,

        ]);

        return redirect()->route('admin.all_news')->with('message' , 'Update News Information Successfoul')->with('type' , 'success');
    }
    public function destroy_news($id)
    {
        Latest::destroy($id);

        return redirect()->route('admin.all_news')->with('message', 'Delete News Successfully')->with('type', 'success');
    }
    public function trach_news()
    {
        $news = Latest::onlyTrashed()->latest('id')->paginate(10);
        return view('admin.trash_news', compact('news'));
    }
    public function forcedelete_news($id)
    {
        Latest::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.all_news')->with('message', 'The Newa Has Been Permanently Deleted')->with('type', 'success');
    }
    public function restore_news($id)
    {
        Latest::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.all_news')->with('message', 'The News Has Been Restore')->with('type', 'success');
    }



    public function all_appointments()
    {
        $appointments = Appointment::all();
        return view('admin.all_appointments' , compact('appointments'));
    }
    public function approved($id)
    {
        $data = Appointment::find($id );
        $approved = $data->status = 'Approved';
        $data->update([
            'status' => $approved,
        ]);

        return redirect()->route('admin.all_appointments')->with('message', 'Appointment accepted successfully')->with('type', 'success');
    }
    public function canceled($id)
    {
        $data = Appointment::find($id );
        $canceled = $data->status = 'canceled';
        $data->update([
            'status' => $canceled,
        ]);

        return redirect()->route('admin.all_appointments')->with('message', 'The appointment has been canceled successfully')->with('type', 'success');
    }
    public function send_email($id)
    {
        $user =  Appointment::find($id);
        $user_email = $user->email;

        return view('admin.send_email' , compact('user_email' , 'user'));
    }


    public function send_email_data(Request $request ,  $id)
    {
        $data = Appointment::find($id);
        $details=[
            'message' => $request->message,
        ];
        // Notification::send($data , new SendEmail($details));
        return redirect()->route('admin.all_appointments')->with('message', 'Send Email Successfully')->with('type', 'success');
    }
}
