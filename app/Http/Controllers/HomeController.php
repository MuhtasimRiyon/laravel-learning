<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data['pagintion'] = Brand::paginate(3);

        $data['brands'] = Brand::all();

        return view('homepage',$data);
    }

    public function homeSlider()
    {
        $slider = slider::paginate(3);
        return view('admin.slider.index',compact('slider'));
    }

    public function storeSlider(Request $request)
    {
        $validated = $request->validate(
            [   'title' => 'required|unique:sliders|max:255|min:4',
                'description' => 'required|unique:sliders|max:255|min:4',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'title.required' => '*Please input title',
                'title.unique' => '*Please insert unique title',
            ]
        );

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(780,480)->save('image/slider/'.$name_gen);

        $last_img = 'image/slider/'.$name_gen;

        slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$last_img,
            'created_at'=> Carbon::now()
        ]);

        return Redirect()->back()->with('success','slider inserted successfully');
    }

}
