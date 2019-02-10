<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(Request $request){

        $reservations = Reservation::all();

        return view('admin.reservation.index',compact('reservations'));
    }

    public function status($id){
            $reservation = Reservation::find($id);

            $reservation->status=true;
            $reservation->save();

            Toastr::success('Reservation Confirmed!','Success',["positionClass"=>"toast-top-right"]);
                return redirect()->back();
    }

    public function destroy($id){
        $reservation = Reservation::find($id);

        $reservation->delete();

        Toastr::success('Reservation Deleted!','Success',["positionClass"=>"toast-top-right"]);

        return redirect()->back();
    }

}
