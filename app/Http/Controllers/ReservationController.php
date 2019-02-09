<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'date_and_time'=>'required',
        ]);

        $reservation = new Reservation();
        $reservation->name=$request->name;
        $reservation->email=$request->email;
        $reservation->phone=$request->phone;
        $reservation->date_and_time=$request->date_and_time;
        $reservation->message=$request->message;
        $reservation->status=false;

        $reservation->save();

        Toastr::success('Reservation request successfully sent. We will confirm you shortly! Thank You!','Success',["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }
}
