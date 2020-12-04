<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class UserprofileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker', 'verified']);
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'address' => 'required',
            'bio' => 'required|min:10',
            'experience' => 'required|min:10',
            'phone_number' => 'required|min:11'
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => Request('address'),
            'experience' => Request('experience'),
            'bio' => Request('bio'),
            'phone_number' => Request('phone_number')
        ]);
        return redirect()->back()->with('success', 'Profile successfully updated!!');
    }

    public function coverLetter(Request $request)
    {
        $this->validate($request,[
            'cover_letter' => 'required|mimes:pdf,doc,docx'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover
        ]);
        return redirect()->back()->with('success', 'Cover-Letter successfully updated!!');
    }

    public function resume(Request $request)
    {
        $this->validate($request,[
            'resume' => 'required|mimes:pdf,doc,docx'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume
        ]);
        return redirect()->back()->with('success', 'Resume successfully updated!!');
    }

    public function avatar(Request $request)
    {
        $this->validate($request,[
            'avatar' => 'required|mimes:png,jpg,jpeg'
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);
            return redirect()->back()->with('success', 'Profile Picture successfully updated!!');
        }
    }
}
