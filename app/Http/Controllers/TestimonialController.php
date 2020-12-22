<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|min:20',
            'name' => 'required',
            'profession' => 'required',
            'video_id' => 'required'
        ]);

        Testimonial::create([
            'description' => $request->get('description'),
            'name' => $request->get('name'),
            'profession' => $request->get('profession'),
            'video_id' => $request->get('video_id')
        ]);

        return redirect('/testimonial')->with('success','Testimonial created successfully!!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->back()->with('danger','Testimonial Deleted permanently!!');
    }
}
