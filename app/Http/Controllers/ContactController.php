<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }
    public function handleForm(Request $request)
    {
        $data = ['fullname' => $request->get('fullname') , 'email' => $request->get('email') , 'phone' => $request->get('phone') , 'message_body' => $request->get('message_body') ];

        Mail::send('email', $data, function ($message) use ($data)
        {
            $message->to('to@example.com', 'JobFinder')
                ->subject('New Message from JobFinder!');
        });

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
