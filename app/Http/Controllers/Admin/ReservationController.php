<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(Request $request){

        $reservations = Reservation::all();

        return view('admin.reservation.index',compact('reservations'));
    }
}
