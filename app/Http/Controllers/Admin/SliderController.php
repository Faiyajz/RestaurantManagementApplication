<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(){

        $sliders= Slider::all();

        return view('admin.slider.index')->with([
            'sliders' =>$sliders
        ]);
    }
}
