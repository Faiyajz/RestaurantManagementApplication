<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Carbon\Carbon;
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

    public function create(){

        return view('admin.slider.create');

    }

    public function store(Request $request){
//        return $request->all();  // To check whether the data is inserted or not
        $this->validate($request,[
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image)){
            $current_date = Carbon::now()->toDateString();
            $imagename = $slug .'-'.$current_date.'-'.uniqid().'-'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/slider')){
                mkdir('uploads/slider',0777,true);
            }

            $image->move('uploads/slider',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $slider = new  Slider();

        $slider->title =$request->title;
        $slider->sub_title =$request->sub_title;
        $slider->image =$imagename;
        $slider->save();

        return redirect()->route('slider.index')->with([
            'successMsg'=>'Slider Uploaded Successfully'
        ]);

    }
}
