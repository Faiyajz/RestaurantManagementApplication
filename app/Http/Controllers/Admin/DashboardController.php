<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Item;
use App\Reservation;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

        $category_count = Category::count();
        $item_count = Item::count();
        $slider_count = Slider::count();
        $reservations = Reservation::where('status',false)->get();
        $contact_count = Contact::count();
        return view('admin.dashboard',
            compact('category_count','item_count','slider_count','reservations','contact_count'));
    }
}
